<?php
// This migration was created with Terminal command:
// php artisan make:migration add_username_to_users_table
// after making changes we need to run
// php artisan migrate
// to make changes to the DB, we have to set up the up and down in the code bellow
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // creates a new column on the table
            $table->string('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // drops de column form teh table
            $table->dropColumn('username');
        });
    }
}
