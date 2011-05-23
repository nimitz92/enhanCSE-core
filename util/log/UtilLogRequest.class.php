<?php 
require_once(SBINTERFACES);

class UtilLogRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		if(!isset($_POST['address']) || !isset($_POST['message'])){
			$model['valid'] = false;
			$model['msg'] = "Invalid Request";
			return $model;
		}
		
		$model['valid'] = true;
		$model['address'] = $_POST['address'];
		$model['message'] = $_POST['message'];
		
		return $model;
	}
}

?>
