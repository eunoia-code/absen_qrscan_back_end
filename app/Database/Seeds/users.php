<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
	public function run()
	{
		$data = [
				'id_user'	=> '1c2oi3nucoie',
				'username' => 'admin',
				'password'    => sha1(md5('admin')),
				'level'		=> 1
		];

		// Using Query Builder
		$this->db->table('user')->insert($data);
	}
}
