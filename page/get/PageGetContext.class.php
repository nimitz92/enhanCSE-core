<?php 
require_once(SBINTERFACES);

/**
 *	PageGetContext class
 *
 *	@param pgid 		 		long int			Page ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return owner				long int			Owner User ID
 *	@return template			string			Template
 *	@return style				string			Style sheet
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class PageGetContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$pgid = $model['pgid'];
		
		$result = $conn->getResult("select owner, style, template from pages where pgid=$pgid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/page.get';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Page ID';
			return $model;
		}
		
		$model['valid'] = true;
		$model['owner'] = $result[0][0];
		$model['style'] = $result[0][1];
		$model['template'] = $result[0][2];
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
