<?php 
require_once(SBINTERFACES);

/**
 *	PageDeleteContext class
 *
 *	@param pgid					long int			Page ID
 *	@param owner				long int			Owner User ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class PageDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$pgid = $model['pgid'];
		$owner = $model['owner'];
		
		$result = $conn->getResult("delete from pages where pgid=$pgid and owner=$owner;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/page.delete';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Page ID / Not Permitted';
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
