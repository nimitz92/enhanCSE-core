<?php 
require_once(SBINTERFACES);

class RemarkDeleteRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'rkid' => $_POST['rkid']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
