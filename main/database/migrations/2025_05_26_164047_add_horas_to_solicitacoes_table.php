<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::table('solicitacoes', function (Blueprint $table) {
            // integer não assinável, padrão 0, colocada logo após `status`
            $table->integer('horas')
                  ->default(0)
                  ->after('status');
        });
    }

   
    public function down(): void
    {
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->dropColumn('horas');
        });
    }
};
