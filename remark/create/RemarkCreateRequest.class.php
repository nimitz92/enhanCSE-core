<?php 
require_once(SBINTERFACES);

class RemarkCreateRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'comment' => $_POST['ccomment'],
			'rating' => $_POST['rating']
		);
		
		return $model;
	}
}

?>
