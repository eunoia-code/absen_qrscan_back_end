<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class DosenModel extends Model
{
    protected $table = "dosen";
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = [
        'id_dosen',
        'id_user',
        'nama',
        'alamat'
    ];
    
    public function getDataDosen(){
        return $this->db->table('user')
            ->join('dosen', 'user.id_user = dosen.id_user')
            ->getWhere('level!=0')->getResultArray();
        // return "invalid";
    }

    public function showDataDosen($id){
        return $this->db->table('user')
            ->join('dosen', 'user.id_user = dosen.id_user')->getWhere(['user.id_user' => $id])->getResult();
    }
}