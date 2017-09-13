<?php

class Router
{	

	public $routes = [
		'GET' => [],
		'POST' => []
	];

	//loads all the routers
	public static function load($file)
	{
		$router = new static;

		require $file;

		return $router;
	} 
	
	//controller assignment for get method
	public function get($uri, $controller)
	{
		$this->routes['GET'][$uri] = $controller;
	}
	
	//controller assignment for post method
	public function post($uri, $controller)
	{
		$this->routes['POST'][$uri] = $controller;
	}

	//directs the user to the requested URI
	public function direct($uri, $requestType)
	{	

		if(array_key_exists($uri, $this->routes[$requestType]))
		{

			return $this->callAction(
					/* we used the splat operator (...) to turn the objects of the array
					  into function parameters */
					...explode('@', $this->routes[$requestType][$uri])
				);
		}

		return Helper::view("not_found");
		
	}

	public function callAction($controller, $action)
	{
		$controller = new $controller;	

		if(! method_exists($controller, $action))
		{
			throw new Exception(
				"{$controller} does not respond to the {action} action!"
			);
			
		}

		return $controller->$action();
	}
	
	
}