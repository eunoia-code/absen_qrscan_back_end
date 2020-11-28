<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class MahasiswaModel extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = [
        'id_mahasiswa',
        'id_user',
        'nama',
        'nim',
        'alamat',
        'angkatan'
    ];
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}