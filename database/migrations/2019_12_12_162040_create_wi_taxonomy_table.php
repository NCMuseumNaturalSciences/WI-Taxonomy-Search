<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWiTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wi_taxonomy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('wi_id');
            $table->string('class')->nullable()->default(null);
            $table->string('_order')->nullable()->default(null);
            $table->string('suborder')->nullable()->default(null);
            $table->string('superfamily')->nullable()->default(null);
            $table->string('family')->nullable()->default(null);
            $table->string('subfamily')->nullable()->default(null);
            $table->string('genus')->nullable()->default(null);
            $table->string('species')->nullable()->default(null);
            $table->string('subspecies')->nullable()->default(null);
            $table->string('taxonLevel')->nullable()->default(null);
            $table->string('authority', 255)->nullable()->default(null);
            $table->string('commonNameEnglish', 255)->nullable()->default(null);
            $table->string('taxonomyType')->nullable()->default(null);
            $table->integer('iucnCategoryId')->unsigned()->default(null);
            $table->string('scientificName', 255)->nullable()->default(null);
            $table->string('uniqueIdentifier');
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
        Schema::dropIfExists('wi_taxonomy');
    }
}
