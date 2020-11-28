<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class AbsenModel extends Model
{
    protected $table = "absen";
    protected $primaryKey = 'id_absen';
    protected $allowedFields = [
        'id_absen',
        'id_jadwal',
        'id_user',
        'waktu'
    ];
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}