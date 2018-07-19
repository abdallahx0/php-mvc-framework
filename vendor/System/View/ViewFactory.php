<?php

/**
 * Description of ViewFactory
 * 
 * this class is responsible to generate view objects
 * which are basically will handle hrml files for view
 *
 * @author abdallah
 */

namespace System\View;

use System\Application;

class ViewFactory 
{
    
    /**
     * Application Object
     * 
     * @var \System\Application
     */
    private $app;
    
    
    
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
     * Render the given view path with the passed variables and generate full path
     * 
     * @param string $viewPath
     * @param array $data 
     * @return \System\View\ViewInterface
     */
    public function render($viewPath , array $data = [])
    {
        return new View($this->app->file, $viewPath , $data);
    }
    
    
}
