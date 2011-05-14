<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('InvalidateRequest.class.php');
require_once('InvalidateContext.class.php');
require_once('InvalidateResponse.class.php');

class Invalidate implements Operation {
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
		return new InvalidateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new InvalidateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new InvalidateResponse();
	}
}

?>