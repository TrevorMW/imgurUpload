imgurUpload
===========

#####Object Oriented PHP wrapper for anonymous and simple uploading of images to Imgur

###### Must Haves: 

imgurUpload can be used by anyone running a modern PHP server. The requirements are listed below. 
* PHP 5.3 +
* cURL
* Imgur Client ID (you can get one from [Imgur's Application tab](http://imgur.com/account/settings/apps))

###### What is the goal of imgurUpload?
imgurUpload is a lightweight solution for cURL-based anonymous uploads to imgur's image API 
endpoint. The goal of this PHP class is to provide an easy set of methods to 
allow users to upload images, and receive a imgur URL in a properly formatted JSON response. 
This class can be used wth an ajax post call or a regular PHP $_POST script. 

#### Methods
After creating a new class instance, you can call these methods from the class object.

##### set_client_key( 'imgur client ID' )
Call this method from the class instance, and pass it your client ID to set that value

##### set_image_attributes( 'array of image data from $_FILES['image'] variable' )
Call this method and pass the multipart form data directly to the method. Could be looped for more than one image. This method returns the image object. Bind it to a variable to use in <code>encode_image()</code> method.

##### set_allowed_mime_types( 'array of MIME types' )
Call this method and pass it an array of MIME types you wish to allow in your script

##### check_mime_types( 'MIME type of each individual upload' )
Call this method and pass it a file MIME type. If the type is allowed, the method returns a boolean value that can be used to validate files

##### set_max_file_size( 'int in Kilobytes' )
Call this method and pass it an integer of the largest file size (in kilobytes) that you wish to allow in your script

##### check_image_file_size( 'file size of each image' )
call this method and pass it a file size (in kilobytes) for each individual file processed. This method will return a boolean that can be used as a validation method

##### encode_image( 'image object' )
Call this method and pass it the image object that was returned from the <code>set_image_attributes()</code> to base64 encode image data for transfer across cURL request. This method returns base64 encoded data to be passed to <code>set_curl_options()</code> method.

##### set_curl_options( 'curl handle', 'image data' )
Before calling this method, initiate a cURL handle using <code>curl_init()</code>, and bind that to a variable. Then pass the cURL handle and image data returned from <code>encode_image()</code> method. This will set five cURL options needed to return JSON reponse data from imgur. After setting these options, run a <code>curl_exec()</code> method and bind the response to a variable.

##### handle_curl_response( 'cURL reponse handle', 'type of data you wish to return' )
Call this method and pass it a <code>curl_exec()</code> handle, as well as string of either 'json' or 'object'. A string of 'json' echoes a JSON response from the PHP script for AJAX calls, and the 'object' returns a object decoded from imgur's JSON response.


