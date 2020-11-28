<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matakuliah extends Migration
{
	public function up() {
		$this->forge->addField([
			'id_mk'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 12
			],
			'nama_mk'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			]
		]);
		$this->forge->addKey('id_mk', true);
		$this->forge->createTable('matakuliah');
	}

	public function down() {
		$this->forge->dropTable('matakuliah');
	}
}
