<?php

namespace System\Http;

use System\Application;

class Response 
{
    
    /**
     * Application Object
     *
     * @var \System\Application
     */
    private $app;
    
    
    /**
     * Header container that will be sent to the browser
     * 
     * @var array
     */
    private $headers = [];
    
    
    /**
     * the content that will be sent to the browser
     * 
     * @var string
     */
    private $content = '';
    
    
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
     * Set the response output content
     * 
     * @param string $content
     * @return void
     */
    public function setOutput($content)
    {
        $this->content = $content;
    }
    
    
    /**
     * Set the response Header
     * 
     * @param string $header
     * @param mixed value
     * @return void
     */
    public function setHeader($header , $value)
    {
        $this->headers[$header] = $value;
    }
    
    
    /**
     * Send the response header and content
     * 
     * @return void
     */
    public function send()
    {
        $this->sendHeaders();
        
        $this->sendOutput();
    }
    
    
    
    /**
     * Send the response Headers
     * 
     * @return void
     */
    public function sendHeaders()
    {
        foreach ($this->headers as $header => $value){
            header($header . ':' . $value);
        }
    }
    
    
    /**
     * Send the response output content
     *
     * @return void
     */
    public function sendOutput()
    {
        echo $this->content;
    }
}
