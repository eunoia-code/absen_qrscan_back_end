<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ShowdaftarmkModel extends Model
{
    protected $table = "daftarmk";
    protected $primaryKey = 'id_daftarmk';
    protected $allowedFields = [
        'id_daftarmk',
        'id_jadwal',
        'id_user'
    ];
    
    public function showDataMk($id){
        return $this->db->table('daftarmk')
            ->join('jadwalkuliah', 'daftarmk.id_jadwal = jadwalkuliah.id_jadwal')
            ->join('matakuliah', 'jadwalkuliah.id_mk = matakuliah.id_mk')
            ->join('dosen', 'dosen.id_user = jadwalkuliah.id_user')
            ->getWhere(['daftarmk.id_user'=>$id])->getResultArray();
        // return $id;
    }
}