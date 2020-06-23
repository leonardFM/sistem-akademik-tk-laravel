<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('no_induk')->nullable();
            $table->string('name');
            $table->string('nama_orangtua')->nullable();
            $table->string('gambar')->nullable();
            $table->string('email')->unique();
            $table->string('alamat')->nullable();
            $table->integer('no_telepon')->nullable();
            $table->integer('agama_id')->nullable();
            $table->integer('jenis_kelamin_id')->nullable();
            $table->integer('kelas_id')->nullable();
            $table->integer('ruang_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
