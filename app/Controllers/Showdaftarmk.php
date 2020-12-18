<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class Showdaftarmk extends ResourceController
{
	protected $modelName = 'App\Models\ShowdaftarmkModel';
    protected $format = 'json';
 
    public function index(){
        return "invalid";
    }

    public function showMk() {
        if ($this->request)
        {
            //get request from Vue Js
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $post = $this->model->showDataMk($json->id_user); 
                return $this->respond($post);
            } else {
                // //get request from PostMan and more 
                $post = $this->model->showDataMk($this->request->getPost('id_user'));
                return $this->respond($post);
                // return $this->respond($this->request->getPost('id_user'));
            }
        } else {
            return $this->respond("invalid");
        }
    }
	//--------------------------------------------------------------------

}