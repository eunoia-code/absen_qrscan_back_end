<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class ShowMahasiswa extends ResourceController
{
	protected $modelName = 'App\Models\ShowMahasiswaModel';
    protected $format = 'json';
 
    public function index(){
        return "invalid";
    }

    public function showMahasiswa() {
        if ($this->request)
        {
            //get request from Vue Js
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $post = $this->model->showDataMahasiswa($json->id_user); 
                return $this->respond($post);
            } else {
                // //get request from PostMan and more 
                $post = $this->model->showDataMahasiswa($this->request->getPost('id_user'));
                return $this->respond($post);
                // return $this->respond($this->request->getPost('id_user'));
            }
        } else {
            return $this->respond("invalid");
        }
    }
	//--------------------------------------------------------------------

}