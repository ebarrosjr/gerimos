<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgencyUsers extends Migration
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
			'user_id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			'agency_id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			/*
			* CASO DB for mysql ou maria, usar essa regra
			* 'role'      => [
            *     'type'           => 'ENUM',
            *     'constraint'     => ['D', 'G', 'S', 'C', 'A', 'R', 'V'],
			* 	'default'        => 'C',
			* ],
			*/
			'role'      => [
                'type'           => 'rules',
				'default'        => 'C',
        	],
			'situacao' => [
				'type' => 'TINYINT',
				'constraint' => '1',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('agency_users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('agency_users');	
	}
}
