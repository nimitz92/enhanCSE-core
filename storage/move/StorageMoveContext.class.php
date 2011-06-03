<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');

/**
 *	StorageMoveContext class
 *
 *	@param stgid		 			string			Storage ID
 *	@param uid					long int			User ID
 *	@param dirid					string			Storage ID directory
 *	@param conn 				resource 		Database connection
 *
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StorageMoveContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$stgid = $conn->escape($model['stgid']);
		$dirid = $conn->escape($model['dirid']);
		$uid = $model['uid'];
		
		$query = "select stgid from storages where stgid='$dirid';";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/storage.move';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Storage ID Directory / Not Permitted';
			return $model;
		}
		
		$ts = Time::getTime();
		
		$query = "update storages set dirid='$dirid', mtime=$ts where stgid='$stgid' and owner=$uid))";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/storage.move';
			return $model;
		}
		
		if($result != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Storage ID / Not Permitted';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		return $model;
	}
}

?>
