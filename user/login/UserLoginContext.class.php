<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);
require_once(SBMYSQL);

class UserLoginContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.authenticate", ECROOT);
		$model = $kernel->run($op, $model);
		
		if(!$model['valid']){
			return $model;
		}
		
		$op = $cl->load("session.create", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
