<?php 


namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    /**
     * home page
     * 
     * @return string
     */
    public function index()
    {
        echo '<h1>Welcome</h1>';
    }
      
}