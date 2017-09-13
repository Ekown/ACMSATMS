<?php 

//manages the URI requests from the user
class Request
{	
	//the requested trimmed and parsed URI of the user
	public static function uri()
	{	
		
	return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');
	}

	//the request method of the user
	public static function method()
	{
		return $_SERVER['REQUEST_METHOD'];	
	}
	
}