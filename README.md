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

