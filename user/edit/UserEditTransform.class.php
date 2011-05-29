<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	UserEditTransform class
 *
 *	@service enhancse-core.user.authenticate
 *	@service enhancse-core.user.available
 *
**/

class UserEditTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.authenticate", ECROOT);
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("user.available", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>
