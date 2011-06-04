<?php 
require_once(SBINTERFACES);

/**
 *	ContentCreateContext class
 *
 *	@param cnttype			integer			Content type 1=Simple 2=List 3=Table 4=Image
 *	@param content			string			Content
 *	@param styleclass			string			Style classes
 *	@param conn 				resource 		Database connection
 *	
 *	@return cntid 		 		long int			Content ID generated
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class ContentCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$cnttype = $model['cnttype'];
		$content = $conn->escape($model['content']);
		$styleclass = $conn->escape($model['styleclass']);
		
		$result = $conn->getResult("insert into contents (cnttype, styleclass, content) values ($cnttype, '$styleclass', '$content');", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/content.create';
			return $model;
		}
		
		$cntid = $conn->getAutoId();
		
		$model['valid'] = true;
		$model['cntid'] = $cntid;
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
