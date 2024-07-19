<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('books', 'cover_path')) {
            Schema::table('books', function (Blueprint $table) {
                $table->string('cover_path')->nullable();
            });
        }
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('cover_path');
        });
    }
};