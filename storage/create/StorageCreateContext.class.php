<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');
require_once(SBROOT. 'lib/util/Random.class.php');

/**
 *	StorageCreateContext class
 *
 *	@param stgname			string			Storage name
 *	@param filename			string			File full path from STORAGEROOT
 *	@param mime				string			MIME type
 *	@param owner				long int			Owner user
 *	@param access				integer			Access status 0=owner 1=group-read 2=group-read/write
 *															3=public-read 4=public-read/write
 *	@param	group				long int			Group ID 0=public
 * 	@param dirid					string			Directory ID empty if file is at root of storage
 *	@param conn 				resource 		Database connection
 *	
 *	@return stgid		 		string			Storage ID generated
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
		$filename = $conn->escape($model['filename']);
		$mime = $conn->escape($model['mime']);
		$owner = $model['owner'];
		$access = $model['access'];
		$group = $model['group'];
		$dirid = $conn->escape($model['dirid']);
		
		$stgid = Random::getString(128); 
		$ts = Time::getTime();
		
		$query = "insert into storages (stgid, stgname, filename, mime, owner, access, group, ctime, atime, mtime, dirid) values ('$stgid', '$stgname', '$filename', '$mime', $owner, $access, $group, $ts, $ts, $ts, '$dirid')";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/storage.create';
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
