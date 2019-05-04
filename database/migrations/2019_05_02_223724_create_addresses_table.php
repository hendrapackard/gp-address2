<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('address');
            $table->text('note');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('sub_district_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('country_id');
            $table->boolean('is_default')->default(false);
            $table->string('postcode');
            $table->unsignedBigInteger('owner_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('village_id')->references('id')->on('villages')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('sub_district_id')->references('id')->on('sub_districts')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('province_id')->references('id')->on('provinces')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('country_id')->references('id')->on('countries')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
