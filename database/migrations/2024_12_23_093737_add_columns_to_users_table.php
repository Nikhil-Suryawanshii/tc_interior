<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('username')->nullable()->after('email');
            $table->string('photo')->nullable()->after('remember_token');
            $table->string('phone')->nullable()->after('photo');
            $table->string('address')->nullable()->after('phone');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('address');
  
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
            $table->dropColumn(['username', 'photo', 'phone','address','status']);
        });
    }
}
