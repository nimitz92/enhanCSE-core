<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupRemoveRequest.class.php');
require_once('GroupRemoveContext.class.php');
require_once('GroupRemoveResponse.class.php');

class GroupRemove implements Operation {
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
		return new GroupRemoveRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupRemoveContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupRemoveResponse();
	}
}

?>