<?php 
require_once(SBINTERFACES);

class AuthenticateTransform implements TransformService {

	// TransformService interface
	public function transform($context, $model){
		$model['login'] = ($model['username'] == 'vibhaj' && $model['password'] == 'hari');
		
		return array($context, $model);
	}
}

?>
