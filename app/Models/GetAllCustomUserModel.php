<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class GetAllCustomUserModel extends Model
{ 
    public function getDataDosen(){
        return $this->db->table('user')
            ->join('dosen', 'user.id_user = dosen.id_user')
            ->get()->getResultArray();
    }
}