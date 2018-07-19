<?php 

namespace System;

class Route
{
	 /**
	 * Application Object
	 *
	 * @var \System\Application
	 */
	private $app;


	 /**
	 * Routes Container
	 *
	 * @var \System\Application
	 */
	private $routes = [];


	 /**
	 * Not Found Url
	 *
	 * @var string
	 */
	private $notFound;

	 /**
	 * Constructor
	 *
	 * @param \System\Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}


	 /**
	 * Add new Route
	 *
	 * @param String $url
	 * @param String $action
	 * @param String $requestMethod
	 * @return void 
	 */
	public function add($url , $action , $requestMethod = 'GET')
	{
		$route = [
			'url'     => $url,
			'pattern' => $this->generatePattern($url),
			'action'  => $this->getAction($action),
			'method'  => strtoupper($requestMethod),
		];

		$this->routes[] = $route;
	}


	 /**
	 * Set Not Found Url
	 *
	 * @param string $url
	 * @return void
	 */
	public function notFound($url)
	{
		$this->notFound = $url;
	}


	 /**
	 * Get Proper Route
	 *
	 * @return array
	 */
	public function getProperRoute()
	{
		foreach ($this->routes as $route) {
			if($this->isMatching($route['pattern'])){
				//echo $route['pattern'];
				$arguments = $this->getArgumentsFrom($route['pattern']);

				// controller@method
				list($controller , $method) = explode('@', $route['action']);

				return [$controller , $method , $arguments];
			}
		}

		return $this->app->url->redirectTo('/404');
	}


	 /**
	 * Determine if the given pattern matches the current request url
	 *
	 * @param string $pattern
	 * @return bool
	 */
	public function isMatching($pattern)
	{
		return preg_match($pattern , $this->app->request->url());
	}


	 /**
	 * Get Arguments from the current request request url based on the given pattern
	 *
	 * @param string $pattern
	 * @return array
	 */
	public function getArgumentsFrom($pattern)
	{
		preg_match($pattern, $this->app->request->url() , $matches);

		// remove first index
		array_shift($matches);
		
		return $matches;
	}


	 /**
	 * Generate regex pattern for the given url 
	 *
	 * @param String $url
	 * @return string 
	 */
	public function generatePattern($url)
	{
		$pattern = '#^';

		// :text ([a-zA-Z0-9-]+)
		// :id   (\d+) any dicimal number
		$pattern .= str_replace([':text' , ':id'] , ['([a-zA-Z0-9-]+)' , '(\d+)' ] , $url);

		$pattern .= '$#';
		
		return $pattern;

	}


	 /**
	 * Get the Proper Action 
	 *
	 * @param String $action
	 * @return string 
	 */
	private function getAction($action)
	{
		
		$action = str_replace('/' , '\\' , $action);
		
		// if method not exist => return index method by default
		return strpos($action , '@') !== false ? $action : $action . '@index';
	}

}