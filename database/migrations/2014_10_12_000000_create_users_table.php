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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image_user')->nullable();
            $table->boolean('admins')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('formations', function (Blueprint $table) {
            $table->id('id_formation');
            $table->string('name_formation')->unique();
            $table->text('description');
            $table->integer('prix');
            $table->string('image_form')->nullable();
            $table->bigInteger('nb_views')->nullable();
            $table->bigInteger('nb_completions')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id_types')->on('types')->onDelete('SET NULL');
            $table->timestamps();
        });

        Schema::create('formations_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('id_formation');
            $table->unsignedBigInteger('id_categorie');
            $table->foreign('id_formation')->references('id_formations')->on('formations')->onDelete('SET NULL');
            $table->foreign('id_categorie')->references('id_categories')->on('categories')->onDelete('SET NULL');
        });

        Schema::create('chapitres', function (Blueprint $table) {
            $table->id('id_chapitre');
            $table->string('name_chap');
            $table->integer('duration');
            $table->integer('numero');
            $table->longText('cours');
            $table->unsignedBigInteger('id_formations');
            $table->foreign('id_formations')->references('id_formation')->on('formations');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_categories');
            $table->string('libelle');
            $table->timestamps();
        });
        Schema::create('types', function (Blueprint $table) {
            $table->id('id_types');
            $table->string('libelle');
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
        Schema::dropIfExists('formations');
        Schema::dropIfExists('chapitres');
        Schema::dropIfExists('formations_categories');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('types');
    }
}
