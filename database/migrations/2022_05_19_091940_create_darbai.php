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
        Schema::create('darbai', function (Blueprint $table) {
            $table->id();
            $table->string('tel')->nullable();
            $table->string('adresas')->nullable();
            $table->string('email')->nullable();
            $table->text('komentaras')->nullable();
            $table->text('darbKoment')->nullable();
            $table->timestamp('isvykimo_data')->nullable();
            $table->timestamp('atvykimo_data')->nullable();
            $table->timestamp('baigimo_data')->nullable();
            $table->integer('darbuotojo_id')->nullable();
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
        Schema::dropIfExists('darbai');
    }
};
