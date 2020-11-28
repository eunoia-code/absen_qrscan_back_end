<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class Matakuliah extends ResourceController
{
	protected $modelName = 'App\Models\MatakuliahModel';
    protected $format = 'json';
 
    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_mk', 'DESC')->findAll()
        ], 200);
    }
 
    public function show($id = null)
    {
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->find($id)
        ], 200);
    }
 
    public function create()
    {
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {
 
                $json = $this->request->getJSON();

                $post = $this->model->insert([
					'id_mk'		=> uniqid(),
					'nama_mk'	=> $json->nama_mk
                ]);
 
            } else {
 
                //get request from PostMan and more 
                $post = $this->model->insert([
					'id_mk'		=> uniqid(),
					'nama_mk'	=> $this->request->getPost('nama_mk')
                ]);
 
            }
 
            return $this->respond([
                'statusCode' => 201,
                'message'    => 'Data Berhasil Disimpan!'
            ], 201);
        }
    }
 
    public function update($id = null)
    {
        //model
        $post = $this->model;
 
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {
            
                $json = $this->request->getJSON();
                
                $post->update($json->id, [
                    'title'     => $json->title,
                    'content'   => $json->content
                ]);
 
            } else {
 
                //get request from PostMan and more
                $data = $this->request->getRawInput();
                $post->update($id, $data);
 
            }
 
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Diupdate!',
            ], 200);
        }
    }
 
    public function delete($id = null)
    {
        $post = $this->model->find($id);
 
        if($post) {
 
            $this->model->delete($id);
 
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK'
            ], 200);
 
        }
    }
 
    public function checkLogin(){
        if ($this->request)
        {
            //get request from Vue Js
            if($this->request->getJSON()) {
 
                $json = $this->request->getJSON();
                $username = $json->username;
                $password = sha1(md5(base64_encode($json->password)));
 
                $data= $this->model->checkLogin($username, $password);
                
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => 'OK',
                    'status'      => $data
                ], 200);
            } else {
 
                //get request from PostMan and more
                $username = $this->request->getPost('username');
                $password = sha1(md5(base64_encode($this->request->getPost('password'))));
 
                $data = $this->model->checkLogin($username, $password);
 
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => 'OK',
                    'status'      => $data
                ], 200);
            }
        }
    }

	//--------------------------------------------------------------------

}