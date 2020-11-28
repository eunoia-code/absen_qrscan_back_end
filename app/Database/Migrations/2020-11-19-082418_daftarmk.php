<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftarmk extends Migration
{
	public function up() {
		$this->forge->addField([
			'id_daftarmk'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'id_jadwal'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'id_user'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			]
		]);
		$this->forge->addKey('id_daftarmk', true);
		$this->forge->addForeignKey('id_jadwal', 'jadwalkuliah', 'id_jadwal', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
		$this->forge->createTable('daftarmk');
	}

	public function down() {
		$this->forge->dropTable('daftarmk');
	}
}
