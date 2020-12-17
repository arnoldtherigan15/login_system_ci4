<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
			'first_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'last_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'first_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'role'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
			],
			'photo'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
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
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
