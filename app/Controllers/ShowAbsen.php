<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class ShowAbsen extends ResourceController
{
	protected $modelName = 'App\Models\ShowAbsenModel';
    protected $format = 'json';
 
    public function index(){
        return "invalid";
    }

    public function showAbsen() {
        if ($this->request)
        {
            //get request from Vue Js
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $post = $this->model->showDataAbsen($json->id_absen); 
                return $this->respond($post);
            } else {
                // //get request from PostMan and more 
                $post = $this->model->showDataAbsen($this->request->getPost('id_user'));
                return $this->respond($post);
                // return $this->respond($this->request->getPost('id_user'));
            }
        } else {
            return $this->respond("invalid");
        }
    }
	//--------------------------------------------------------------------

}