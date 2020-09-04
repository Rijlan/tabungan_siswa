<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabungans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis')->unsigned()->index();
            $table->integer('setor');
            $table->integer('tarik');
            $table->date('tanggal');
            $table->string('transaksi');
            $table->string('petugas');
        });

        DB::statement("ALTER TABLE tabungans MODIFY COLUMN transaksi ENUM('S', 'T')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabungans');
    }
}
