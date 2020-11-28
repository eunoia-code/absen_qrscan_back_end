<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
class Jadwalkuliah extends ResourceController
{
	protected $modelName = 'App\Models\JadwalkuliahModel';
    protected $format = 'json';
 
    public function index(){
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('id_jadwal', 'DESC')->findAll()
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
					'id_jadwal'		=> uniqid(),
					'id_mk'			=> $json->id_mk,
					'id_user'		=> $json->id_user,
					'tgl_jadwal'	=> $json->tgl_jadwal,
					'waktu_jadwal'	=> $json->waktu_jadwal
                ]);
 
            } else {
 
                //get request from PostMan and more 
                $post = $this->model->insert([
					'id_jadwal'		=> uniqid(),
					'id_mk'			=> $this->request->getPost('id_mk'),
					'id_user'		=> $this->request->getPost('id_user'),
					'tgl_jadwal'	=> $this->request->getPost('tgl_jadwal'),
					'waktu_jadwal'	=> $this->request->getPost('waktu_jadwal')
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