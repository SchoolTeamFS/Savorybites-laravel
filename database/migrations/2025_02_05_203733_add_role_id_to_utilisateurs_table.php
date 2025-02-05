<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToUtilisateursTable extends Migration
{
    public function up()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade')->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
}
