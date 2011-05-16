<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('UtilMailRequest.class.php');
require_once('UtilMailContext.class.php');
require_once('UtilMailResponse.class.php');

class UtilMail implements Operation {
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
		return new UtilMailRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new UtilMailContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new UtilMailResponse();
	}
}

?>