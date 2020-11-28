<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
	public function run()
	{
		$data = [
				'id_user'	=> uniqid(),
				'username' => 'dosen',
				'password'    => sha1(md5('admin123')),
				'level'		=> 1
		];

		// Using Query Builder
		$this->db->table('user')->insert($data);
	}
}
