<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->bigIncrements('idMouvement');
            $table->string('typeMouvement');
            $table->text('commentMouvement',26);
            $table->date('dateMouvement');
            $table->decimal('billetMouvement',13,2);
            $table->decimal('pieceMouvement',13,2);
            $table->decimal('centimeMouvement',13,2);
            $table->decimal('totalMouvementDepot',13,2)->default(0);
            $table->decimal('totalMouvementRetrait',13,2)->default(0);
            $table->decimal('totalMouvementRemise',13,2)->default(0);
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
        Schema::dropIfExists('mouvements');
    }
}
