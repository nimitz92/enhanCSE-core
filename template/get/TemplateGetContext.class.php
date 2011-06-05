<?php 
require_once(SBINTERFACES);

/**
 *	TemplateGetContext class
 *
 *	@param tplid 		 		long int			Template ID
 *	@param conn 				resource 		Database connection
 *
 *	@return template			string			Template
 *	@return tplname			string			Template name
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
		$tplid = $model['tplid'];
		
		$result = $conn->getResult("select tplname, template from templates where tplid=$tplid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/template.get';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Template ID';
			return $model;
		}
		
		$model['valid'] = true;
		$model['tplname'] = $result[0][1];
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
