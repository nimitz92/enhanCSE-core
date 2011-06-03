<?php 

require_once(SBINTERFACES);

/**
 *	StorageUploadTransform class
 *
 *	@param filekey	 			string			File key
 *	@param maxsize			integer			File maximum size
 *	@param savepath			string 			File save path
 *	@param rename				string			File rename
 *
 *	@return filename			string			File received name
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StorageUploadTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$filekey = $model['filekey'];
		$maxsize = $model['maxsize'];
		$savepath = $model['savepath'];
		
		$file = $_FILES[$filekey];
		$model['filename'] = basename($file['name']);
		
		$filename = ((isset($model['rename']) ? $model['rename'] : $model['filename']));
		
		if( $file['size'] > $maxsize ){
			$model['valid'] = false;
			$model['msg'] = "File is larger than maximum allowed.";
			return $model;
		}

		switch($file['error']){
			case UPLOAD_ERR_OK: 
				break;
			case UPLOAD_ERR_INI_SIZE: 
				$model['valid'] = false;
				$model['msg'] = "File is larger than maximum possible to be uploaded.";
				return $model;
			default: 
				$model['valid'] = false;
				$model['msg'] = "Internal error";
				return $model;
		}
		
		if( !move_uploaded_file($file['tmp_name'], $savepath.$filename) ){
			$model['valid'] = false;
			$model['msg'] = "Internal unexpected error";
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
