<?php 
require_once(SBINTERFACES);
require_once('SMTPClient.class.php');

class UtilMailContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$to = $model['to'];
		$from = $model['from'];
		$sub = $model['sub'];
		$msg = $model['msg'];
		$smtpuser = $model['smtpuser'];
		$smtppass = $model['smtppass'];
		
		$mail = new SMTPClient ($smtpuser, $smtppass, $from, $to, $sub, $msg);
		$model['result'] = $mail->SendMail();
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
