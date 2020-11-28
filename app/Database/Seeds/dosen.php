<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dosen extends Seeder
{
	public function run()
	{
		$data = [
				'id_dosen'	=> uniqid(),
				'id_user' => '5fc11c10ddf2',
				'nama'    => 'amboako',
				'alamat'	=> 'besulutu'
		];

		// Using Query Builder
		$this->db->table('dosen')->insert($data);
	}
}
