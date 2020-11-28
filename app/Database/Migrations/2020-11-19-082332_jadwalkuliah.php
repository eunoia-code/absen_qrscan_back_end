<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwalkuliah extends Migration
{
	public function up() {
		$this->forge->addField([
			'id_jadwal'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'id_mk'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'id_user'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'tgl_jadwal'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'waktu_jadwal'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			]
		]);
		$this->forge->addKey('id_jadwal', true);
		$this->forge->addForeignKey('id_mk', 'matakuliah', 'id_mk', 'CASCADE', 'CASCADE');
		$this->forge->createTable('jadwalkuliah');
	}

	public function down() {
		$this->forge->dropTable('jadwalkuliah');
	}
}
