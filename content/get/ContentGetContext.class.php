<?php 
require_once(SBINTERFACES);

/**
 *	ContentGetContext class
 *
 *	@param cntid 		 		long int			Content ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return cnttype			integer			Content type 1=Simple 2=List 3=Table 4=Image
 *	@return content			string			Content
 *	@return styleclass			string			Style classes
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class ContentGetContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$cntid = $model['cntid'];
		
		$result = $conn->getResult("select cnttype, styleclass, content from contents where cntid=$cntid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/content.get';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Content ID';
			return $model;
		}
		
		$model['valid'] = true;
		$model['cnttype'] = $result[0][0];
		$model['styleclass'] = $result[0][1];
		$model['content'] = $result[0][2];
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
