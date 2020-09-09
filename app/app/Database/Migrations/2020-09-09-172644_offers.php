<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Offers extends Migration
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
			'property_id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			'agency_id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			'corretor_optante' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			/*
			* CASO DB for mysql ou maria, usar essa regra
			* 'tipo_negocio'      => [
            *     'type'           => 'ENUM',
            *     'constraint'     => ['V', 'A', 'R', 'T', 'C'],
			* 	'default'        => 'V',
			* ],
			*/
			'tipo_negocio'      => [
                'type'           => 'negocios',
				'default'        => 'V',
        	],
			'valor' => [
				'type' => 'NUMERIC',
				'constraint' => '15,2',
			],
			'entrada_minima' => [
				'type' => 'NUMERIC',
				'constraint' => '15,2',
			],
			'situacao' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default'=> '1',
			],
			'destaque' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default'=> '0',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('offers');
	}

	public function down()
	{
		$this->forge->dropTable('offers');	
	}
}

