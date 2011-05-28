<?php 
require_once(SBINTERFACES);

class LogSearchRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		if(!isset($_POST['address']) || !isset($_POST['message']) || !isset($_POST['fromtime']) || !isset($_POST['totime'])){
			$model['valid'] = false;
			$model['msg'] = "Invalid Request";
			return $model;
		}
		
		$model['valid'] = true;
		$model['address'] = $_POST['address'];
		$model['message'] = $_POST['message'];
		$model['fromtime'] = $_POST['fromtime'];
		$model['totime'] = $_POST['totime'];
		
		return $model;
	}
}

?>
