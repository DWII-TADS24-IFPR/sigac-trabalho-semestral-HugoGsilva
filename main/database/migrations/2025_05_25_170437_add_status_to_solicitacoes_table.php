<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->string('status')
                  ->default('pendente')
                  ->after('arquivo');
        });
    }

    public function down()
    {
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
