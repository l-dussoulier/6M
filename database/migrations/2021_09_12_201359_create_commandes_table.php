<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('telephone');
            $table->string('ville');
            $table->string("adresse");
            $table->string('numero-adresse');
            $table->integer('codePostal');

            $table->timestamps();

            $table->unsignedBigInteger('statut_id');
            $table->unsignedBigInteger('article_id');

            $table->foreign('statut_id')->references('id')->on('statuts');
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
