<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class MatakuliahModel extends Model
{
    protected $table = "matakuliah";
    protected $primaryKey = 'id_mk';
    protected $allowedFields = [
        'id_mk',
        'nama_mk'
    ];
}