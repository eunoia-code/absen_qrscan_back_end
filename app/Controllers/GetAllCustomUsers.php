<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\GetAllCustomUserModel;

class GetAllCustomUsers extends ResourceController
{
	protected $modelName = 'App\Models\GetAllCustomUserModel';
    protected $format = 'json';
 
    public function index(){
        return "just for APi";
    }


    public function getDataDosen(){
        $this->modelName = new GetAllCustomUserModel();

        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->modelName->getDataDosen()
        ], 200);
    }
}