<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class LoginModel extends Model
{
    protected $table = "user";
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'id_user',
        'username',
        'password',
        'level'
    ];
 
    public function checkLogin1($username, $password) {
        $query = $this->db->table('user')->getWhere(['username' => $username, 'password' => $password]);
        // $query = $this->db->query("SELECT * FROM user WHERE username=`$username` AND password=`$password`");
        // return $query->countAllResults();
        return $query->getResult();
        // return $password;
    }

    public function getDataUser(){
        return $this->db->table('user')
            ->getWhere(['username' => $username, 'password' => $password])->getResultArray();
    }
}