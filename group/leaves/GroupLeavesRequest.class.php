<?php 
require_once(SBINTERFACES);

class GroupLeavesRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'gid' => $_POST['gid']
		);
		
		return $model;
	}
}

?>
