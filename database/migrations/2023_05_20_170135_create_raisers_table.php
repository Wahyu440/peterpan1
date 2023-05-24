<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raisers', function (Blueprint $table) {
            $table->id();
            $table->string('username_pic');
            $table->string('password_pic');
            $table->string('name_pic');
            $table->string('profil')->nullable();
            $table->string('no_telp');
            $table->string('nama_instansi')->nullable();
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
        Schema::dropIfExists('raisers');
    }
};
