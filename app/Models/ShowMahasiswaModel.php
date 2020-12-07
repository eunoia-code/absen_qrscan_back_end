<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ShowMahasiswaModel extends Model
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
    
    public function showDataMahasiswa($id){
        return $this->db->table('user')
            ->join('mahasiswa', 'user.id_user = mahasiswa.id_user')->getWhere(['user.id_user'=>$id])->getResult();
        // return $id;
    }
}