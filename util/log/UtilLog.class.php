<?php 

require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('UtilLogRequest.class.php');
require_once('UtilLogContext.class.php');
require_once('UtilLogResponse.class.php');

class UtilLog implements Operation {
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
		return new UtilLogRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new UtilLogContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new UtilLogResponse();
	}
}

?>