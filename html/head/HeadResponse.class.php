<?php 
require_once(SBINTERFACES);

class HeadResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){
		if(isset($model['title'])) 
			$title = $model['title'];
		if(isset($model['styles'])) 
			$styles = $model['styles'];
	
		$view = <<<HEAD
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>$title</title>
HEAD;
		
		if($styles != null)
			foreach($styles as $style)
				$view .= '<link rel="stylesheet" type="text/css" href="'.$style.'" />';
			
		$view .= "</head>";
		
		return $view;
	}
}

?>
