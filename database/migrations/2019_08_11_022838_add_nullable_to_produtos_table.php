<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('descricao');
            $table->dropColumn('preco');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('descricao');
            $table->dropColumn('preco');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
        });
    }
}
