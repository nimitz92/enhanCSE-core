<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');

/**
 *	StorageListContext class
 *
 *	@param stgid		 			string			Storage ID
 *	@param uid					long int			User ID
 *	@param conn 				resource 		Database connection
 *
 *	@return storage			array			Storage information
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StorageListContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$stgid = $conn->escape($model['stgid']);
		$uid = $model['uid'];
		
		$query = "select s.stgid, s.stgname, s.filename, s.mime, s.owner, s.access, s.group, s.ctime, s.atime, s.mtime, s.dirid from storages s where s.dirid='$stgid' and (s.owner=$uid or s.access>2 or (s.access>0 and s.group in (select m.gid from members m where m.member=$uid)))";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/storage.list';
			return $model;
		}
		
		if(count($result) == 0){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Storage ID / Not Permitted';
			return $model;
		}
		
		$model['valid'] = true;
		$model['storage'] = $result;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$stgid = $conn->escape($model['stgid']);
		
		$ts = Time::getTime();
		
		$query = "update storages set atime=$ts where stgid='$stgid';";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/storage.list';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>