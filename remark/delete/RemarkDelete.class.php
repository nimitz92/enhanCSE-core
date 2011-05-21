<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('RemarkDeleteRequest.class.php');
require_once('RemarkDeleteContext.class.php');
require_once('RemarkDeleteResponse.class.php');

class RemarkDelete implements Operation {
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
		return new RemarkDeleteRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new RemarkDeleteContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new RemarkDeleteResponse();
	}
}

?>