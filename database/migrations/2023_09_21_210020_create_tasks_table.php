<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->integer('priority');
            $table->string('title');
            $table->text('description');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }

};
