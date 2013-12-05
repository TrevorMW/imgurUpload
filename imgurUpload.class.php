<?php 
/*
* Simple OO PHP wrapper for anonymous Imgur uploads
* Author: Trevor Wagner
* License: MIT
* 
*/

class imgurUpload {
	
	public $imgurKey;
	public $imageObj;
	public $imgurError;
	public $allowableMimes;

	public function __construct( $fileArray = array() ){ 
		$file = $fileArray['images']; // Bind images array to new variable
		$obj = (object) $file; // Cast array to a new object
		$this->imageObj = $obj; // Bind to public variable
	}
	
	function set_key( $key ){
		$this->imgurKey = $key; // Set Imgur API Key (Basic Access)
	}
	
	function set_MIME_types( $mimeTypes = array() ){
		//Check array to see if therre are any
		if( !empty( $mimeTypes ) && is_array( $mimeTypes ) ){
		  $this->allowableMimes = $mimeTypes; // Set allowed file types array to public variable
		  return $this->allowableMimes;		
		} else {
		  return false;	
		}
	}
	
	function check_MIME_types( $allowableMimes = array() ){
		$imageMime = $this->imageObj; // Get class object
		$imageMime = str_replace( 'image/','',$imageMime->type ); // Get image mime type extension
		if( in_array( $imageMime, $allowableMimes ) ){ // Check for MIME type extension in array of allowed file types
			return true; // if file extension is allowed, proceed
		} else {
			return false; // if file extension is not allowed, stop		
		}
	}
	
	function set_curl_options(){
		
		
	}
	
	function initiate_request(){
		
		
		
	}



}





$imageArray = array( 'images' => 
					  array( 'name' => 'test.jpg',
						     'type' => 'image/jpeg',
						     'tmp_name' => '/tmp/nsl54Gs',
						     'error' => 0,
						     'size' => 1715 )
				   );
									   
$upload = new imgurUpload($imageArray);
$upload->set_key('9c616d70834d15a');
$args = array('png','jpeg','jpg','gif');
$mimes = $upload->set_MIME_types($args);
$upload->check_MIME_types($mimes);

//var_dump($mimes);


?>
