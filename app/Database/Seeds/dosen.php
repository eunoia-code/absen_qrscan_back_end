<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dosen extends Seeder
{
	public function run()
	{
		$data = [
				'id_dosen'	=> uniqid(),
				'id_user' => '1c2oi3nucoie',
				'nama'    => 'Super Admin',
				'alamat'	=> 'Super Admin'
		];

		// Using Query Builder
		$this->db->table('dosen')->insert($data);
	}
}
