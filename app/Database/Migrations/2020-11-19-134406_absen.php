<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absen extends Migration 
{
	public function up() {
		$this->forge->addField([
			'id_absen'          => [
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
			],
			'waktu'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			]
		]);
		$this->forge->addKey('id_absen', true);
		$this->forge->addForeignKey('id_jadwal', 'jadwalkuliah', 'id_jadwal', 'CASCADE', 'CASCADE');
		$this->forge->createTable('absen');
	}

	public function down() {
		$this->forge->dropTable('absen');
	}
}
