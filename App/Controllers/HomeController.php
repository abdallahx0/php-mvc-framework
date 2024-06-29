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
        $message = '<h1>Welcome to home page</h1>';

        return $this->view->render('home', ['message' => $message]);
    }
      
}