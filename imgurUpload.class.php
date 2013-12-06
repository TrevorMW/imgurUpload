<?php 
/*
* Simple OO PHP wrapper for anonymous Imgur uploads
* Author: Trevor Wagner
* License: MIT
* 
*/

class imgurUpload {
	
	public $clientKey;
	public $imageObj;
	public $imgurError;
	public $allowableMimes;

	public function __construct( $fileArray = array() ){ 
		$file = $fileArray['images']; // Bind images array to new variable
		$obj = (object) $file; // Cast array to a new object
		$this->imageObj = $obj; // Bind to public variable
	}
	
	function set_key( $key ){
		$this->clientKey = $key; // Set Imgur API Key (Basic Access)
	}
	
	function set_MIME_types( $mimeTypes = array() ){
		
		if( !empty( $mimeTypes ) && is_array( $mimeTypes ) ){ //make sure array is present and it has at least one value
			
		  $this->allowableMimes = $mimeTypes; // Set allowed file types array to public variable
		  
		  return $this->allowableMimes;	
		  	
		} else {
			
		  return false;	
		  
		}
		
	}
	
	function check_MIME_type( $allowableMimes = array() ){
		
		$imageMime = $this->imageObj; // Get class object
		
		$imageMime = str_replace( 'image/','',$imageMime->type ); // Get image mime type extension
		
		if( in_array( $imageMime, $allowableMimes ) ){ // Check for MIME type extension in array of allowed file types
		
			return true; // if file extension is allowed, proceed
			
		} else {
			
			return false; // if file extension is not allowed, stop	
				
		}
		
	}
	
	function encode_image_data($image){ 
		
		//return base64_encode(file_get_contents($image));
		
	}
	
	function set_curl_options( $curlHandle, $options = array() ){
		
		if( !empty( $options ) && is_array( $options )){
		
			foreach($options as $k => $option){
								
				curl_setopt( $curlHandle, $k, $option);
				 
			}
			
		} else {
			
			return false;
		
		}
	}

}




?>
