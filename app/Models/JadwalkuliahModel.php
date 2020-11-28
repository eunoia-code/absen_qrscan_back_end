<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class JadwalkuliahModel extends Model
{
    protected $table = "jadwalkuliah";
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = [
        'id_jadwal',
        'id_mk',
        'id_user',
        'tgl_jadwal',
        'waktu_jadwal'
    ];
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}