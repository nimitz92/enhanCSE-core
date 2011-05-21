<?php 

require_once(SBINTERFACES);

class UtilUploadTransform implements TransformService {

	// TransformService interface
	public function transform($model){
		$filekey = $model['filekey'];
		$maxsize = $model['maxsize'];
		$savepath = $model['savepath'];
		
		$file = $_FILES[$filekey];
		$model['filename'] = basename($file['name']);
		
		$filename = ((isset($model['rename']) ? $model['rename'] : $model['filename']));
		
		if( $file['size'] > $maxsize ){
			$model['error'] = true;
			$model['errormsg'] = "File is larger than maximum allowed.";
			return $model;
		}

		switch($file['error']){
			case UPLOAD_ERR_OK: 
				break;
			case UPLOAD_ERR_INI_SIZE: 
				$model['error'] = true;
				$model['errormsg'] = "File is larger than maximum possible to be uploaded.";
				return $model;
			default: 
				$model['error'] = true;
				$model['errormsg'] = "Internal error";
				return $model;
		}
		
		if( !move_uploaded_file($file['tmp_name'], ECROOT.$savepath.$filename) ){
			$model['error'] = true;
			$model['errormsg'] = "Internal unexpected error";
			return $model;
		}
		
		$model['error'] = false;
		return $model;
	}
}

?>
