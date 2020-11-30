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
 
    public function getDataMahasiswa(){
        return $this->db->table('user')
            ->join('mahasiswa', 'user.id_user = mahasiswa.id_user')
            ->get()->getResultArray();
    }
}