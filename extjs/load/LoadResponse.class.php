<?php 
require_once(SBINTERFACES);

class LoadResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){	
		if(isset($model['status'])) 
			$status = $model['status'];
		else
			$status = 'status';
			
		$view = <<<VALID
	<script type="text/javascript">
		document.getElementById('$status').innerHTML = 'Ext JS Loading Core API...';
	</script>
	<script type="text/javascript" src="/libraries/extjs/adapter/ext/ext-base.js"></script>
	
	<script type="text/javascript">
		document.getElementById('$status').innerHTML = 'Ext JS Loading UI Components...';
	</script>
    <script type="text/javascript" src="/libraries/extjs/ext-all-debug.js"></script>
	
    <script type="text/javascript">
		Ext.onReady(function(){
			Ext.BLANK_IMAGE_URL = '/libraries/extjs/resources/images/default/s.gif';
		});
		var load_el = Ext.get('$status');
		load_el.dom.innerHTML = 'Ext JS Loading QuickTips Component ...';
		Ext.QuickTips.init();
		load_el.dom.innerHTML = 'Ext JS Done';
		load_el.fadeOut({ 
			duration: 5,
			easing: 'easeBoth'
		});
	</script>
VALID;
		
		return $view;
	}
}

?>
