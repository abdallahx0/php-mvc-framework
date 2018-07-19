<?php 


namespace System\Http;

class Request
{
	
	 /**
	 * Url
	 *
	 * @var string
	 */
	private $url;

	 /**
	 * BaseUrl
	 *
	 * @var string
	 */
	private $baseUrl;


	 /**
	 * Prepare Url
	 *
	 * @return void
	 */
	public function prepareUrl()
	{
		// get folder name
		$script = dirname($this->server('SCRIPT_NAME'));

		// get current url without domain name
		$requestUri = $this->server('REQUEST_URI');
		
		// check if url contain get value or not 
		if(strpos($requestUri, '?') !== false){
			list($requestUri , $queryString) = explode('?' , $requestUri);
		}	

		// remove root folder name from url (framework/name/..  ==> /name/...)
		$this->url = preg_replace('#^'.$script.'#' , '' , $requestUri);

		if(! $this->url()){
			$this->url = '/';
		}
		
		// get site url
		$this->baseUrl = $this->server('REQUEST_SCHEME') . '://' . $this->server('HTTP_HOST') . $script . '/';
		
	}


	 /**
	 * Get value from _GET by the given key
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function get($key , $default = null)
	{
		return array_get($_GET, $key, $default);
	}


	 /**
	 * Get value from _POST by the given key
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function post($key , $default = null)
	{
		return array_get($_POST, $key, $default);
	}


	 /**
	 * Get value from _SERVER by the given key
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function server($key , $default = null)
	{
		return array_get($_SERVER, $key, $default);
	}



	 /**
	 * Get current request method
	 *
	 * @return string
	 */
	public function method()
	{
		return $this->server('REQUEST_METHOD');
	}


	 /**
	 * Get full url of script
	 *
	 * @return string
	 */
	public function baseUrl()
	{
		return $this->baseUrl;
	}


	 /**
	 * Get only relative url (clean url)
	 *
	 * @return string
	 */
	public function url()
	{
		return $this->url;
	}
}

