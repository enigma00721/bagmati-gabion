<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->text('aboutus')->nullable();
            $table->text('message')->nullable();
            $table->string('mobile',30)->nullable();
            $table->string('telephone',30)->nullable();
            $table->string('location',150)->nullable();
            $table->string('mail',150)->nullable();
            $table->string('fb_link',220)->nullable();
            $table->string('tw_link',220)->nullable();
            $table->integer('projects')->nullable();
            $table->integer('partners')->nullable();
            $table->integer('clients')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_infos');
    }
}
