<?php 

require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('LogRecordRequest.class.php');
require_once('LogRecordContext.class.php');
require_once('LogRecordResponse.class.php');

class LogRecord implements Operation {
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
		return new LogRecordRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new LogRecordContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new LogRecordResponse();
	}
}

?>