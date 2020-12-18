<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class RC4 extends ResourceController
{
	protected $modelName = 'App\Models\RC4Model';
    protected $format = 'json';
 
    public function index(){
        return "invalid";
    }

    public function start() {
        if ($this->request)
        {
            //get request from Vue Js
            if ($this->request->getJSON()) {
                $json = $this->request->getJSON();
                $post = $this->model->rc4(utf8_decode($json->key), utf8_decode($json->string)); 
                return $this->respond(utf8_encode($post));
            } else {
                // //get request from PostMan and more 
                $post = $this->model->rc4(utf8_decode($this->request->getPost('key')), utf8_decode($this->request->getPost('string')));
                return $this->respond(utf8_encode($post));
                // return "invalid";
                // return $this->respond($this->request->getPost('id_user'));
            }
        } else {
            return $this->respond("invalid");
        }
    }
	//--------------------------------------------------------------------

}