<?php 

require_once(SBINTERFACES);

/**
 *	StorageDownloadResponse class
 *
 *	@param file				string			File (full path)
 *	@param asname			string			Download filename
 *	@param mime			string			MIME type for the file	application/force-download
 *	
 *	@return valid 			boolean		Processed without errors
 *
**/
class StorageDownloadResponse implements ResponseService {
	
	/**
	 *	@interface ResponseService
	**/
	public function processResponse($model){
		set_time_limit(0);
		$filename = $model['file'];
		$asname = $model['asname'];
		$mtype = $model['mime'];
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Type: $mtype");
		header("Content-Disposition: attachment; filename=\"$asname\"");
		header("Content-Transfer-Encoding: binary");
		
		$file = @fopen($filename,"rb");
		if ($file) {
			while(!feof($file)) {
				print(fread($file, 1024*8));
				flush();
				if (connection_status()!=0) {
					@fclose($file);
					die();
				}
			}
		@fclose($file);
		}
		
		$model['valid'] = true;
		return json_encode($model);
	}
}

?>
