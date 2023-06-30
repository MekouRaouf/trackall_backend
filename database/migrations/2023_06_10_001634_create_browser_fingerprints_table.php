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
        Schema::create('browser_fingerprints', function (Blueprint $table) {
            $table->id();
            $table->string("website_url");
            $table->string("useragent")->nullable();
            $table->string("browsername")->nullable();
            $table->string("connection_type")->nullable();
            $table->string("languages");
            $table->string("selected_language");
            $table->boolean("cookies");
            $table->integer("processorcores")->nullable();
            $table->string("ram_memory")->nullable();
            $table->string("screenW")->nullable();
            $table->string("screenH")->nullable();
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('browser_fingerprints');
    }
};
