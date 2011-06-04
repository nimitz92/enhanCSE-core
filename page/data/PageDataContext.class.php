<?php 
require_once(SBINTERFACES);

/**
 *	PageDataContext class
 *
 *	@param pgid 		 		long int			Page ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return data					array			Data array( key, cnttype, styleclass, content)
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class PageDataContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$pgid = $model['pgid'];
		
		$result = $conn->getResult("select cl.key, ct.cnttype, ct.styleclass, ct.content from collations cl, contents ct where cl.pgid=$pgid; and cl.cntid=ct.cntid", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/page.data';
			return $model;
		}
		
		if(count($result) == 0){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Page ID';
			return $model;
		}
		
		$model['valid'] = true;
		$model['data'] = $result;
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
