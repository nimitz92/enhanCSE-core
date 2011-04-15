<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once(dirname(__FILE__).'/GetTransform.class.php');
require_once(dirname(__FILE__).'/GetResponse.class.php');

class Get implements Operation {
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
		return $this->adapter->getRequestService();
	}
	
	// Operation interface
	public function getContextService(){
		return $this->adapter->getContextService();
	}
	
	// Operation interface
	public function getTransformService(){
		return new GetTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GetResponse();
	}
}

?>