<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConsultationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],

            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'case_type' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],

            'preferred_date' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'preferred_time' => [
                'type' => 'TIME',
                'null' => true,
            ],

            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'pending',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('consultations');
    }

    public function down()
    {
        $this->forge->dropTable('consultations');
    }
}