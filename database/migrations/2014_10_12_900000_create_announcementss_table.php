<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price');
            $table->string('street');
            $table->string('space');
            $table->string('description');
            $table->integer('city_id')->unsigned();
            $table->integer('number_of_rooms_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->integer('type_of_property_id')->unsigned();
            $table->timestamps();

              $table->foreign('number_of_rooms_id')
                ->references('id')
                ->on('numberofrooms')
                ->onDelete('cascade');
    
     $table->foreign('area_id')
                ->references('id')
                ->on('area')
                ->onDelete('cascade');
    
     $table->foreign('type_of_property_id')
                ->references('id')
                ->on('typeofproperty')
                ->onDelete('cascade');
        
        
          $table->foreign('city_id')
                ->references('id')
                ->on('city')
                ->onDelete('cascade');
        });
        
      
    }
    
      

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('announcement');
    }
}
