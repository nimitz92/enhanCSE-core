<?php 
require_once(SBINTERFACES);

class MailSmtpRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		if(!isset($_POST['to']) || !isset($_POST['from']) || !isset($_POST['sub']) || !isset($_POST['msg']) || !isset($_POST['smtpuser']) || !isset($_POST['smtppass'])){
			$model['valid'] = false;
			$model['msg'] = "Invalid Request";
			return $model;
		}
		
		$model['valid'] = true;
		$model['to'] = $_POST['to'];
		$model['from'] = $_POST['from'];
		$model['sub'] = $_POST['sub'];
		$model['msg'] = $_POST['msg'];
		$model['smtpuser'] = $_POST['smtpuser'];
		$model['smtppass'] = $_POST['smtppass'];
		
		return $model;
	}
}

?>
