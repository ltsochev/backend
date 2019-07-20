<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->index();
            $table->bigInteger('user_id')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->timestamp('translated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translation_keys');
    }
}
