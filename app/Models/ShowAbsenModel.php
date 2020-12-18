<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ShowAbsenModel extends Model
{
    protected $table = "absen";
    protected $primaryKey = 'id_absen';
    protected $allowedFields = [
        'id_absen',
        'id_jadwal',
        'id_user',
        'waktu'
    ];
    
    public function showDataAbsen($id){
        return $this->db->table('absen')
            ->join('mahasiswa', 'mahasiswa.id_user = absen.id_user')
            ->join('jadwalkuliah', 'absen.id_jadwal = jadwalkuliah.id_jadwal')
            ->join('matakuliah', 'jadwalkuliah.id_mk = matakuliah.id_mk')
            ->getWhere(['absen.id_user'=>$id])->getResultArray();
        // return $id;
    }
}