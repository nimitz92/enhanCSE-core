<?php 
require_once(SBINTERFACES);

class GroupClearRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'flag' => $_POST['flag'],
			'gid' => $_POST['gid'],
			'member' => $_POST['member']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
