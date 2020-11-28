<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration {
	public function up() {
		$this->forge->addField([
			'id_dosen'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'id_user'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			]
		]);
		$this->forge->addKey('id_dosen', true);
		$this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
		$this->forge->createTable('dosen');
	}

	public function down() {
		$this->forge->dropTable('dosen');
	}
}
