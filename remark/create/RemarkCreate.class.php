<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('RemarkCreateRequest.class.php');
require_once('RemarkCreateContext.class.php');
require_once('RemarkCreateResponse.class.php');

class RemarkCreate implements Operation {
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
		return new RemarkCreateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new RemarkCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new RemarkCreateResponse();
	}
}

?>