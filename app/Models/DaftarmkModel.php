<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class DaftarmkModel extends Model
{
    protected $table = "daftarmk";
    protected $primaryKey = 'id_daftarmk';
    protected $allowedFields = [
        'id_daftarmk',
        'id_jadwal',
        'id_user'
    ];
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}