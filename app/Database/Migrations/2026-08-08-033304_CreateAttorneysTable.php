<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttorneysTable extends Migration
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

            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 180,
                'unique' => true,
            ],

            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],

            'specialization' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'bio' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],

            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'linkedin' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],

            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
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

        $this->forge->createTable('attorneys');
    }

    public function down()
    {
        $this->forge->dropTable('attorneys');
    }
}