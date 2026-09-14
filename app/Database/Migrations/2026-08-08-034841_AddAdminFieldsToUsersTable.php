<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdminFieldsToUsersTable extends Migration
{
    public function up()
    {
        // Admin fields already exist in the users table.
        // No additional columns are required.
    }

    public function down()
    {
        // Nothing to remove.
    }
}