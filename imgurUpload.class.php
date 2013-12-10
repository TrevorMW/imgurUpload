<?php 
/*
* Simple OO PHP wrapper for anonymous Imgur uploads
* Author: Trevor Wagner
* License: MIT
* 
*/

class imgurUpload {
	
	public $client_id;
	public static $imgur_endpoint = 'https://api.imgur.com/3/upload.json';
	public $image_attr;
	public $allowed_mime_types;
	public $max_image_size;


	public function __construct(){ 
		
	}
	
	
	/**
	 * Imgur Client ID 
	 * 
	 * Calling this method sets Imgur Client Id for basic request
	 *  
	 * @param str $id
	 *    client id received from registering an application with imgur
	 *
	 * @throws
	 */
	public function set_client_key( $id ){
		$matchId = preg_match( '/^[A-Za-z0-9]*$/', $id ); 
		if( !empty( $id ) && $matchId >= 1 ){ 
			$this->client_id = $id;
		} else {
			throw new Exception("client id contains a non-alphanumeric character");	
		}
	}
	
	
	/**
	 * Image attributes array
	 * 
	 * Passing this method an array of image attributes will set all properties to an object
	 *  
	 * @param array $imgattr
	 *    This can be an array from a multipart form, or an array built from a form that accepts a URL and image details
	 */
	public function set_image_attributes( $imgattr = array() ){
	
		$this->image_attr = (object) $imgattr;
				
	}
	
	
	/**
	 * MIME Types allowed in upload form
	 * 
	 * Passing this method an array of image attributes will set all properties to an object
	 *  
	 * @param array $mimeTypes
	 *    An array of mime types in the format 'image/*' allowed by your application's script
	 */
	 public function set_allowed_mime_types( $mimeTypes ){
		 
		 $this->allowed_mime_types = $mimeTypes;
	
	 }
	 
	 
	 /**
	 * Check MIME type of a specific image
	 * 
	 * Pass this method any mime type string in the format image/* to check if it is allowed
	 *  
	 * @param str $type
	 *    A string defining a mime type
	 *
	 * @return boolean 
	 *	  Returns true if mime type is allowed, False if not allowed
	 */
	 public function check_mime_types( $type ){
		
		$mimes = $this->allowed_mime_types;
		
		foreach($mimes as $mime){
		
			if($mime == $type){
			
				return true;
				
			} else {
					
				return false;
				
			}
		}
	 
	 }
	 
	 
	  /**
	 * Set the maximum file size for uploads
	 * 
	 * Pass this method a int of maximum file size in kilobytes
	 *  
	 * @param int $args
	 *    An int of filesize in kilobytes
	 */
	 public function set_max_file_size( $args ){
	 
	 	$this->max_image_size = $args;
	 
	 }
	 
	 
	  /**
	 * Check file upload for compliance for max file size
	 * 
	 * Pass this method a int of file size of an image to check it against the file size allowed
	 *  
	 * @param int $filesize
	 *    An int of filesize in kilobytes
	 *
	 * @return boolean true
	 *	  Returns true if image is less than allowed file size
	 *
	 */
	 public function check_image_file_size( $filesize ){
		 
	 	if( $filesize <= $this->max_image_size ){
			
			return true;
			
		} else {
		
			return false;
			
		}
	 
	 }
	 
	 
	 /**
	 * Get image file contents, then base64 encode file stream
	 *
	 * @param object $image
	 *	  Pass this method an image object defined in imgurUpload class
	 *
	 */
	 public function encode_image( $image ){
		 
		if( is_object( $image ) && $image->tmp_name == '' ){
	 		
			$image = base64_encode(file_get_contents($image->image_attr->tmp_name));
			 
		} else {
		
			throw new Exception('Image data is not an object');	
			
		}
	 
	 }
	 
	 
	  /**
	 * Start cURL request
	 *
	 * @return object $cURL handle
	 *	  Returns true if image is less than allowed file size
	 *
	 */
	 public function start_curl_request(){
		 
		 
		 
	 }
	 
	
} // END IMGUR UPLOAD CLASS




?>
