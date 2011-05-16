<?php 

	class SMTPClient {

		public function __construct ($SmtpUser, $SmtpPass, $from, $to, $subject, $body){
			require_once('SMTPConfig.php');
			$this->SmtpServer = $smtphost;
			$this->PortSMTP = $smtpport;
			$this->SmtpUser = base64_encode ($SmtpUser);
			$this->SmtpPass = base64_encode ($SmtpPass);
			$this->from = $from;
			$this->to = $to;
			$this->subject = $subject;
			$this->body = $body;
		}

		
		public function SendMail (){
			if ($SMTPIN = fsockopen ($this->SmtpServer, $this->PortSMTP)) {
				$talk["http"] = "Http_Host ".$_SERVER['HTTP_HOST'];
				$talk["hello"] = fgets ( $SMTPIN, 1024); 

				fputs ($SMTPIN, "HELO ".$_SERVER['HTTP_HOST']."\r\n");  
				$talk["hello1"] = fgets ( $SMTPIN, 1024); 
						   
				fputs($SMTPIN, "AUTH LOGIN\r\n");
				$talk["res"]=fgets($SMTPIN,1024);
				
				fputs($SMTPIN, $this->SmtpUser."\r\n");
				$talk["user"]=fgets($SMTPIN,1024);
					
				fputs($SMTPIN, $this->SmtpPass."\r\n");
				$talk["pass"]=fgets($SMTPIN,256);
							
				fputs ($SMTPIN, "MAIL FROM: <".$this->from.">\r\n");  
				$talk["From"] = fgets ( $SMTPIN, 1024 );  
				
				fputs ($SMTPIN, "RCPT TO: <".$this->to.">\r\n");  
				$talk["To"] = fgets ($SMTPIN, 1024); 
				   
				fputs($SMTPIN, "DATA\r\n");
				$talk["data"]=fgets( $SMTPIN,1024 );
				   
					
				fputs($SMTPIN, "To: <".$this->to.">\r\nFrom: <".$this->from.">\r\nSubject:".$this->subject."\r\n\r\n\r\n".$this->body."\r\n.\r\n");
				$talk["send"]=fgets($SMTPIN, 1024);
				   
				//CLOSE CONNECTION AND EXIT ... 
				   
				fputs ($SMTPIN, "QUIT\r\n");  
				$talk["quit"]=fgets($SMTPIN, 1024);
				fclose($SMTPIN); 
			}
			return $talk;
		} 
	}


?>
