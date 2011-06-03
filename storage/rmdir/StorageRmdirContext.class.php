<?php 
require_once(SBINTERFACES);

/**
 *	StorageDeleteContext class
 *
 *	@param stgid		 			string			Storage ID
 *	@param uid					long int			User ID
 *	@param conn 				resource 		Database connection
 *
 *	@return storage			array			Storage information deleted
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StorageDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$stgid = $conn->escape($model['stgid']);
		$uid = $model['uid'];
		
		$query = "select stgid, stgname, filename, mime, owner, access, group, ctime, atime, mtime, dirid from storages where (stgid='$stgid' and owner=$uid) or dirid='$stgid'";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/storage.rmdir';
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
		
		$query = "delete from storages where stgid='$stgid' or dirid='$stgid';";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/storage.rmdir';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
