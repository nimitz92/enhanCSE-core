<?php 
require_once(SBINTERFACES);

class GroupInfoRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'gid' => $_POST['gid']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
