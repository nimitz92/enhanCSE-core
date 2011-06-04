<?php 
require_once(SBINTERFACES);

/**
 *	ContentEditContext class
 *
 *	@param cntid 		 		long int			Content ID
 *	@param content			string			Content
 *	@param styleclass			string			Style classes
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class ContentEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$cntid = $model['cntid'];
		
		if(isset($model['content'])){
			$content = $conn->escape($model['content']);
			$result = $conn->getResult("update contents set content='$content' where cntid=$cntid;", true);
		
			if($result === false){
				$model['valid'] = false;
				$model['msg'] = 'Error in Database @getContext/content.edit#1';
				return $model;
			}
			
			if(count($result) != 1){
				$model['valid'] = false;
				$model['msg'] = 'Invalid Content ID';
				return $model;
			}
		}
		
		if(isset($model['styleclass'])){
			$styleclass = $conn->escape($model['styleclass']);
			$result = $conn->getResult("update contents set styleclass='$styleclass' where cntid=$cntid;", true);
		
			if($result === false){
				$model['valid'] = false;
				$model['msg'] = 'Error in Database @getContext/content.edit#2';
				return $model;
			}
			
			if(count($result) != 1){
				$model['valid'] = false;
				$model['msg'] = 'Invalid Content ID';
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
