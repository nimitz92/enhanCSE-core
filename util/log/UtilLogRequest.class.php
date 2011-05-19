<?php 
require_once(SBINTERFACES);

class UtilLogRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		if(!isset($_POST['address']) || !isset($_POST['message'])){
			$model['error'] = true;
			$model['errmsg'] = "Invalid Request";
			return $model;
		}
		
		$model['error'] = false;
		$model['address'] = $_POST['address'];
		$model['message'] = $_POST['message'];
		
		return $model;
	}
}

?>
