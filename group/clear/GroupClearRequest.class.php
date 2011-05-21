<?php 
require_once(SBINTERFACES);

class GroupClearRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'ctid' => $_POST['ctid']
		);
		
		return $model;
	}
}

?>
