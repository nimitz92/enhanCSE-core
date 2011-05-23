<?php 
require_once(SBINTERFACES);

class GroupCreateRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'gname' => $_POST['gname'],
			'level' => $_POST['level'],
			'ctid' => $_POST['ctid']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
