<?php 
require_once(SBINTERFACES);

/**
 *	TemplateCreateContext class
 *
 *	@param tplname			string			Template name
 *	@param template			string			Template
 *	@param conn 				resource 		Database connection
 *	
 *	@return tplid 		 		long int			Template ID generated
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class TemplateCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$template = $conn->escape($model['template']);
		$tplname = $conn->escape($model['tplname']);
		
		$result = $conn->getResult("insert into templates (tplname, template) values ('$tplname', '$template');", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/template.create';
			return $model;
		}
		
		$tplid = $conn->getAutoId();
		
		$model['valid'] = true;
		$model['tplid'] = $tplid;
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
