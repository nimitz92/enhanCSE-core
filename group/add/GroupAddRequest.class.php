<?php 
require_once(SBINTERFACES);

class GroupAddRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'gid' => $_POST['gid'],
			'member' => $_POST['member']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
