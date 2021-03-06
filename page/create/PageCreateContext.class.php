<?php 
require_once(SBINTERFACES);

/**
 *	PageCreateContext class
 *
 *	@param owner				long int			Owner user ID
 *	@param tplid					long int			Template ID
 *	@param style					string			Style sheet
 *	@param conn 				resource 		Database connection
 *	
 *	@return pgid 		 		long int			Page ID generated
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class PageCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$owner = $model['owner'];
		$tplid = $model['tplid'];
		$style = $conn->escape($model['style']);
		
		$result = $conn->getResult("insert into pages (owner, style, tplid) values ($owner, '$style', $tplid);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/page.create';
			return $model;
		}
		
		$pgid = $conn->getAutoId();
		
		$model['valid'] = true;
		$model['pgid'] = $pgid;
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
