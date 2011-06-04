<?php 
require_once(SBINTERFACES);

/**
 *	ContentDeleteContext class
 *
 *	@param cntid				long int			Content ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class ContentDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$cntid = $model['cntid'];
		
		$result = $conn->getResult("delete from contents where cntid=$cntid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/content.delete';
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
