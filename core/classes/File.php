<?php 

namespace core\classes;

class File 
{
	/**
	 * [$upload_dir description]
	 * @var [string]
	 */
	public static $upload_dir = '/uploads/';

	/**
	 * [upload description]
	 * @param  [array] $file_array [description]
	 * @return [bolean]             [description]
	 */
	public static function upload($file_array)
	{
		$files = array();
		
		if(count($file_array) > 0) {
			foreach ($file_array as $file) {
				if(!$file['error']) {
					if(is_uploaded_file($file['tmp_name'])) {
						if(move_uploaded_file($file['tmp_name'], ROOT . self::$upload_dir . $file['name'])){
							array_push($files, self::$upload_dir . $file['name']);
						}
					}
				}
			}
			return $files;
		}
	}
}

?>