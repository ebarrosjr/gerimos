<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Properties extends Migration
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
			'codigo' => [
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => true,
			],
			'titulo' => [
				'type' => 'VARCHAR',
				'constraint' => '120',
				'null' => false,
			],
			'descricao' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'created' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('properties');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('properties');	
	}
}
