<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'id_user',
        'username',
        'password',
        'level'
    ];
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }

    public function getDataUser(){
        return $this->db->table('user')
            ->getWhere()->getResultArray();
    }
}