<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration {
	public function up() {
		$this->forge->addField([
			'id_user'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'level' => [
				'type'           => 'INT',
				'constraint'     => 1
			]
		]);
		$this->forge->addKey('id_user', true);
		$this->forge->createTable('user');
	}

	public function down() {
		$this->forge->dropTable('user');
	}
}
