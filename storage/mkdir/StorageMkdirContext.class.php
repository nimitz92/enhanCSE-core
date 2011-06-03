<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');
require_once(SBROOT. 'lib/util/Random.class.php');

/**
 *	StorageMkdirContext class
 *
 *	@param stgname			string			Storage directory name
 *	@param owner				long int			Owner user
 *	@param access				integer			Access status 0=owner 1=read 2=read/write
 *	@param	group				long int			Group ID 0=public
 *	@param conn 				resource 		Database connection
 *	
 *	@return stgid		 		string			Storage ID generated for directory
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StorageCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$stgname = $conn->escape($model['stgname']);
		$owner = $model['owner'];
		$access = $model['access'];
		$group = $model['group'];
		
		$stgid = Random::getString(128); 
		$ts = Time::getTime();
		
		$query = "insert into storages (stgid, stgname, filename, mime, owner, access, group, ctime, atime, mtime, dirid) values ('$stgid', '$stgname', '$stgname', '', $owner, $access, $group, $ts, $ts, $ts, null)";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/storage.mkdir';
			return $model;
		}
		
		$model['valid'] = true;
		$model['stgid'] = $stgid;
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
