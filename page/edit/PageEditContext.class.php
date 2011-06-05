<?php 
require_once(SBINTERFACES);

/**
 *	PageEditContext class
 *
 *	@param pgid 		 		long int			Page ID
 *	@param owner				long int			Owner ID
 *	@param tplid					long int			Template ID
 *	@param style					string			Style sheet
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class PageEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$pgid = $model['pgid'];
		$owner = $model['owner'];
		
		if(isset($model['tplid'])){
			$tplid = $model['tplid'];
			$result = $conn->getResult("update pages set tplid=$tplid where pgid=$pgid and owner=$owner;", true);
		
			if($result === false){
				$model['valid'] = false;
				$model['msg'] = 'Error in Database @getContext/page.edit#1';
				return $model;
			}
			
			if(count($result) != 1){
				$model['valid'] = false;
				$model['msg'] = 'Invalid Page ID / Not Permitted';
				return $model;
			}
		}
		
		if(isset($model['style'])){
			$style = $conn->escape($model['style']);
			$result = $conn->getResult("update pages set styles='$style' where pgid=$pgid and owner=$owner;", true);
		
			if($result === false){
				$model['valid'] = false;
				$model['msg'] = 'Error in Database @getContext/page.edit#2';
				return $model;
			}
			
			if(count($result) != 1){
				$model['valid'] = false;
				$model['msg'] = 'Invalid Page ID / Not Permitted';
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
