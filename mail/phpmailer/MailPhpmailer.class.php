<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('MailPhpmailerRequest.class.php');
require_once('MailPhpmailerTransform.class.php');
require_once('MailPhpmailerResponse.class.php');

class MailPhpmailer implements Operation {
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
		return new MailPhpmailerRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return $this->adapter->getContextService();
	}
	
	// Operation interface
	public function getTransformService(){
		return new MailPhpmailerTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return new MailPhpmailerResponse();
	}
}

?>