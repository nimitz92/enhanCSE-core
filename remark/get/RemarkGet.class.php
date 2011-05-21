<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('RemarkGetRequest.class.php');
require_once('RemarkGetContext.class.php');
require_once('RemarkGetResponse.class.php');

class RemarkGet implements Operation {
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
		return new RemarkGetRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new RemarkGetContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new RemarkGetResponse();
	}
}

?>