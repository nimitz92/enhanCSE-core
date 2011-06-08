<?php 
require_once(SBINTERFACES);
require_once(PHPMAILER);

class MailPhpmailerTransform implements TransformService {

	// TransformService interface
	public function transform($model){
		$to = $model['to'];
		$from = $model['from'];
		$sub = $model['sub'];
		$msg = $model['msg'];
		$smtpuser = $model['smtpuser'];
		$smtppass = $model['smtppass'];
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure =  PMSMTPSECURE;
		$mail->Host = PMHOST;
		$mail->Port = PMPORT;

		$mail->Username = $smtpuser;
		$mail->Password = $smtppass;

		$mail->AddReplyTo($smtpuser, $from);
		$mail->From = $smtpuser;
		$mail->FromName = $from;

		$mail->Subject    = $sub;
		$mail->WordWrap   = 50;
		$mail->MsgHTML($msg);
		
		$rcpts = explode(',', $to);
		foreach($rcpts as $rcpt){
			$mail->AddAddress($rcpt, "");
		}

		//$mail->AddAttachment("images/phpmailer.gif");             // attachment

		$mail->IsHTML(true); // send as HTML

		if(!$mail->Send()) {
			$model['result'] = false;
			$model['mailerror'] = $mail->ErrorInfo;
		} else {
			$model['result'] = true;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
