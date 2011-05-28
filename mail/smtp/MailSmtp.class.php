<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('MailSmtpRequest.class.php');
require_once('MailSmtpTransform.class.php');
require_once('MailSmtpResponse.class.php');

class MailSmtp implements Operation {
	protected 
		// adapter
		$adapter;
		
	// Constructor
	public function __construct(){
		$cl = new ComponentLoader();
		$this->adapter = $cl->load("base.adapter", SBROOT);
	}

	// Operation interface
	public function getRequestService(){
		return new MailSmtpRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return $this->adapter->getContextService();
	}
	
	// Operation interface
	public function getTransformService(){
		return new MailSmtpTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return new MailSmtpResponse();
	}
}

?>