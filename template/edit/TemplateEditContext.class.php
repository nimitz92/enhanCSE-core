<?php 
require_once(SBINTERFACES);

/**
 *	TemplateContext class
 *
 *	@param tplid 		 		long int			Template ID
 *	@param tplname			string			Template name
 *	@param template			string			Template
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class TemplateEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$tplid = $model['tplid'];
		
		if(isset($model['template'])){
			$template = $conn->escape($model['template']);
			$result = $conn->getResult("update templates set template='$template' where tplid=$tplid;", true);
		
			if($result === false){
				$model['valid'] = false;
				$model['msg'] = 'Error in Database @getContext/template.edit#1';
				return $model;
			}
			
			if(count($result) != 1){
				$model['valid'] = false;
				$model['msg'] = 'Invalid Template ID / Not Permitted';
				return $model;
			}
		}
		
		if(isset($model['tplname'])){
			$tplname = $conn->escape($model['tplname']);
			$result = $conn->getResult("update templates set tplname='$tplname' where tplid=$tplid;", true);
		
			if($result === false){
				$model['valid'] = false;
				$model['msg'] = 'Error in Database @getContext/template.edit#2';
				return $model;
			}
			
			if(count($result) != 1){
				$model['valid'] = false;
				$model['msg'] = 'Invalid Template ID / Not Permitted';
				return $model;
			}
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
