<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('nis');
            $table->string('nama_siswa');
            $table->string('jenis_kelamin');
            $table->bigInteger('kelas_id')->unsigned()->index();
            $table->string('status');
            $table->year('tahun_masuk');
        });

        DB::statement("ALTER TABLE siswas MODIFY COLUMN jenis_kelamin ENUM('L', 'P')");
        DB::statement("ALTER TABLE siswas MODIFY COLUMN status ENUM('aktif', 'lulus', 'pindah')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
