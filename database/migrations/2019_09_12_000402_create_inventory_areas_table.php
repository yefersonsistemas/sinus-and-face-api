<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity_Assigned');
            $table->integer('quantity_Used');
            $table->integer('quantity_Available');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('CASCADE');

            $table->foreign('inventory_id')
                ->references('id')
                ->on('inventories')
                ->onDelete('CASCADE');

            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branch')
                  ->onDelete('CASCADE');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_areas');
    }
}
