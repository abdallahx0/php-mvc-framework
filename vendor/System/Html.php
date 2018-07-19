<?php 

namespace System;

class Html
{

	 /**
	 * Application Object
	 *
	 * @var \System\Application
	 */
	protected $app;
        
        
    /**
     * Html title
     * 
     * @var string
     */
    private $title;
    
    
    /**
     * Html description
     * 
     * @var string
     */
    private $description;
    
    
    /**
     * Html keywords
     * 
     * @var string
     */
    private $keywords;


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
     * Set title
     * 
     * @var string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    
    /**
     * Get title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    
    /**
     * Set description
     * 
     * @var string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    
    /**
     * Get description
     * 
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    
    
    /**
     * Set Keywords
     * 
     * @var string $keywords
     * @return void
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }
    
    
    /**
     * Get Keywords
     * 
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

}