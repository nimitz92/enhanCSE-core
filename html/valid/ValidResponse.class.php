<?php 
require_once(SBINTERFACES);

class ValidResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){	
		$view = <<<VALID
		<ul id="validation">
			<li>
				<a href="http://validator.w3.org/check?uri=referer">
					<img src="/resources/images/validation/valid-xhtml10-blue.png" alt="Valid XHTML 1.0!" height="31" width="88" />
				</a>
			</li>
			<li>
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
					<img src="/resources/images/validation/valid-css-blue.png" alt="Valid CSS!" height="31" width="88" />
				</a>
			</li>
		</ul>
VALID;
		
		return $view;
	}
}

?>
