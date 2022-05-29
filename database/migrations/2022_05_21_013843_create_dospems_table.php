<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDospemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dospems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswas')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('npm');
            $table->foreignId('npm')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('proposal');
            $table->foreignId('dosens')->references('id')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('dospems');
    }
}
