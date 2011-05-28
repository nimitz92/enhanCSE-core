<?php 

require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('LogSearchRequest.class.php');
require_once('LogSearchContext.class.php');
require_once('LogSearchResponse.class.php');

class LogSearch implements Operation {
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
		return new LogSearchRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new LogSearchContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new LogSearchResponse();
	}
}

?>