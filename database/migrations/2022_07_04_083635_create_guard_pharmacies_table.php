<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('guard_pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('city_name_fk');
            $table->foreign('city_name_fk')->references('city_name')->on('pharmacies');
            $table->unsignedBigInteger('pharmacy_fk')->unique();
            $table->foreign('pharmacy_fk')->references('id')->on('pharmacies')->onDelete('CASCADE');
            $table->dateTime('open_time')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->dateTime('close_time')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('guard_pharmacies');
    }
};
