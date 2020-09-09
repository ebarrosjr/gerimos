<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
        $this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'cpf' => [
				'type' => 'VARCHAR',
				'constraint' => '13',
				'null' => false,
			],
			'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '120',
				'null' => false,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true,
			],
			'last_login' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('cpf', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');	
	}
}
