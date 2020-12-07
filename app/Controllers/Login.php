<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
	protected $modelName = 'App\Models\LoginModel';
    protected $format = 'json';
 
    public function index(){
        return "Invalid";
    }

    // public function create()
    // {
    //     if ($this->request)
    //     {
    //         //get request from Vue Js
    //         if($this->request->getJSON()) {
 
    //             $json = $this->request->getJSON();
    //             $password = sha1(md5(base64_encode($json->password)));

    //             $post = $this->db->table('user')
    //                     ->getWhere(['username' => $json->username, 'password' => $password])->getResultArray(); 
    //         } else {
                
    //             $username = $this->request->getPost('username');
    //             $password = sha1(md5(base64_encode($this->request->getPost('password'))));

    //             //get request from PostMan and more 
    //             $post = $this->db->table('user')
    //                     ->getWhere(['username' => $username, 'password' => $password])->getResultArray();
 
    //         }
 
    //         // return $this->respond([
    //         //     'statusCode' => 201,
    //         //     'message'    => 'Data Berhasil Disimpan!',
    //         //     'data'       => $post
    //         // ], 201);
    //         return $this->respond("invalid 1");
    //     } else {
    //         return $this->respond("invalid 2");
    //     }
    // }

    public function checkLogin() {
        if ($this->request)
        {
            //get request from Vue Js
            if ($this->request->getJSON()) {
 
                $json = $this->request->getJSON();
                $password = sha1(md5($json->password));

                $post = $this->db->table('user')
                        ->where(['username' => $json->username, 'password' => $password])->countAllResults(); 
            } else {
                
                $username = $this->request->getPost('username');
                // // $password = $this->request->getPost('password');
                $password = sha1(md5($this->request->getPost('password')));

                // //get request from PostMan and more 
                $post = $this->model->checkLogin1($username, $password);
                // $post = $this->db->table('user')
                //         ->where(['username' => $username, 'password' => $password])->countAllResults();
                return $this->respond($post);
            }
 
            // return $this->respond([
            //     'statusCode' => 201,
            //     'message'    => 'Data Berhasil Disimpan!',
            //     'data'       => $post
            // ], 201);
            // return $this->respond("invalid 1");
        } else {
            return $this->respond("invalid");
        }
    }

    // public function create()
    // {
    //     if ($this->request)
    //     {
    //         //get request from Vue Js
    //         if($this->request->getJSON()) {
 
    //             $json = $this->request->getJSON();
    //             $password = sha1(md5(base64_encode($json->password)));

    //             $post = $this->db->table('user')
    //                     ->getWhere(['username' => $json->username, 'password' => $password])->getResultArray(); 
    //         } else {
                
    //             $username = $this->request->getPost('username');
    //             $password = sha1(md5(base64_encode($this->request->getPost('password'))));

    //             //get request from PostMan and more 
    //             $post = $this->db->table('user')
    //                     ->getWhere(['username' => $username, 'password' => $password])->getResultArray();
 
    //         }
 
    //         return $this->respond([
    //             'statusCode' => 201,
    //             'message'    => 'Data Berhasil Disimpan!',
    //             'data'       => $post
    //         ], 201);
    //     }
    // }
 
	//--------------------------------------------------------------------

}