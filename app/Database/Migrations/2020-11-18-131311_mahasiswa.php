<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration {
	public function up() {
		$this->forge->addField([
			'id_mahasiswa'          => [
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
			'nim' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'angkatan'     => [
				'type'           => 'INT',
				'constraint'     => 10
			]
		]);
		$this->forge->addKey('id_mahasiswa', true);
		$this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
		$this->forge->createTable('mahasiswa');
	}

	public function down() {
		$this->forge->dropTable('mahasiswa');
	}
}
