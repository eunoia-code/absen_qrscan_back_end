<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class MatakuliahModel extends Model
{
    protected $table = "matakuliah";
    protected $primaryKey = 'id_mk';
    protected $allowedFields = [
        'id_mk',
        'nama_mk'
    ];
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}