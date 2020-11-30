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
 
    public function getDataJadwal(){
        return $this->db->table('jadwalkuliah')
            ->join('matakuliah', 'jadwalkuliah.id_mk = matakuliah.id_mk')
            ->join('dosen', 'jadwalkuliah.id_user = dosen.id_user')
            ->get()->getResultArray();
    }
}