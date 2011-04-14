<?php 
require_once(SBINTERFACES);

class AuthenticateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		return array();
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
