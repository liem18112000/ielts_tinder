<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('intro')->nullable();
            $table->float('band_score')->default(0.0);
            $table->text('home')->nullable();
            $table->date('dob')->nullable();
            $table->tinyInteger('achieveTime')->default(1);
            $table->text('image')->nullable();
            $table->text('online_image')->default('https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png');
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
        Schema::dropIfExists('profiles');
    }
}
