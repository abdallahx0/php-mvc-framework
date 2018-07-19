<?php 

namespace System;

abstract class Model
{

    /**
	 * Application Object
	 *
	 * @var \System\Application
	 */
	protected $app;
        
        
    /**
     * Table Name
     * 
     * @var string
     */
    protected $table;


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
     * Get All Models Records
     * 
     * @return array
     */
    public function all()
    {
        return $this->fetchAll($this->table);
    }
        
        
    /**
     * Get Record by id
     * 
     * @param int $id
     * @return \stdClass | null
     */
    public function get($id)
    {
        return $this->where('id = ?' , $id)->fetch($this->table);
    }
        
        

    /**
	 * Call shared application objects dynamically
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->app->get($key);
	}
        
        
    /**
     * Call Database Metheds dynamically
     * 
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args) {
        return call_user_func_array ([$this->app->db, $method], $args);
    }
        

}