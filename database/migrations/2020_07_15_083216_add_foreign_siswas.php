<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignSiswas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign('siswas_kelas_id_foreign');
            $table->dropIndex('siswas_kelas_id_index');
        });
    }
}
