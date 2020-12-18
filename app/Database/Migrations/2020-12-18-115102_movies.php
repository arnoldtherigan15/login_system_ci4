<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Movies extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'genre'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'year'       => [
				'type'           => 'INT',
			],
			'rating'       => [
				'type'           => 'INT',
			],
			'poster'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'description'       => [
				'type'           => 'TEXT'
			],
			'created_at'       => [
				'type'           => 'DATETIME',
				'null'     => false,
			],
			'updated_at'       => [
				'type'           => 'DATETIME',
				'null'     => false,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('movies');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('movies');
	}
}
