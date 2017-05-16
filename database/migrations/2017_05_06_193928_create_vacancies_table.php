<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vacancy_id');
            $table->string('vacancy_url');
            $table->string('vacancy_name');
            $table->text('requirement')->nullable();
            $table->text('responsibility')->nullable();
            $table->unsignedInteger('salary_from')->nullable();
            $table->unsignedInteger('salary_to')->nullable();
            $table->string('salary_currency', 3)->nullable();
            $table->unsignedInteger('employer_id')->nullable();
            $table->string('employer_url')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
