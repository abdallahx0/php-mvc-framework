<?php 


namespace App\Controllers;

use System\Controller;

class NotFoundController extends Controller
{
    /**
     * 404 page
     * 
     * @return mixed
     */
    public function index()
    {
        return $this->view->render('errors/404');
    }
      
}