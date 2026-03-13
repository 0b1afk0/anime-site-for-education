<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Просто назначаем админа
        DB::table('users')
            ->where('id', 4)
            ->update(['is_admin' => true]);
    }

    public function down()
    {
    }
};
