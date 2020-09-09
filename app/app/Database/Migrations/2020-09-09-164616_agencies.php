<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agencies extends Migration
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
			'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => true,
			],
			'cnpj' => [
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => false,
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => '13',
				'null' => true,
			],
			'creci_j' => [
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => false,
			],
			'token_pagamento' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'telefone' => [
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => true,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('cnpj', true);
		$this->forge->createTable('agencies');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('agencies');	
	}
}
