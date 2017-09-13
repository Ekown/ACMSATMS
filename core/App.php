<?php

//dependency injection container
class App
{
	protected static $registry = []; 

	//binds the passed key to a specific require value
	public static function bind($key, $value)
	{
		static::$registry[$key] = $value;
	}

	//gets the require value from the $registry using the key and then returns it
	public static function get($key)
	{
		if(!array_key_exists($key, static::$registry))
			throw new Exception("No {$key} is bound in the container.");

		return static::$registry[$key];
	}
	
}