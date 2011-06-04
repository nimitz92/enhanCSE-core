<?php 
require_once(SBINTERFACES);

/**
 *	PageCollateContext class
 *
 *	@param owner 				long int			Owner User ID
 *	@param pgid					long int			Page ID
 *	@param key					string			Collation key
 *	@param cntid				long int			Content ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class PageCollateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$owner = $model['owner'];
		$pgid = $model['pgid'];
		$key = $conn->escape($model['key']);
		$cntid = $model['cntid'];
		
		$result = $conn->getResult("select pgid from pages where pgid=$pgid and owner=$owner;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/page.collate#1';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Page ID / Not Permitted';
			return $model;
		}
		
		$result = $conn->getResult("insert into collations (pgid, key, cntid) values ($pgid, '$key', $cntid);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/page.collate#2';
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
