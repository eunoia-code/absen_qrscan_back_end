<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ShowDosenModel extends Model
{
    protected $table = "dosen";
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = [
        'id_dosen',
        'id_user',
        'nama',
        'alamat'
    ];
    
    public function showDataDosen($id){
        return $this->db->table('user')
            ->join('dosen', 'user.id_user = dosen.id_user')->getWhere(['user.id_user'=>$id])->getResult();
        // return $id;
    }
}