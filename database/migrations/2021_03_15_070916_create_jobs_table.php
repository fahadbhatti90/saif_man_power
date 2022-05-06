<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            //$table->user_id();
            //$table->job_category_id();
            $table->string('title');
            $table->longText('description');
            $table->string('company_name');
            $table->string('address');
            $table->string('email');
            $table->string('username');
            $table->date('app_deadline');
            $table->bigInteger('job_sector');
            $table->integer('salary');
            $table->integer('min');
            $table->integer('max');
            $table->string('currency');
            $table->string('offered_salary');
            $table->string('career_level');
            $table->string('experience');
            $table->string('gender');
            $table->string('job_type');
            $table->string('qualification');
            $table->string('file');
            $table->string('country');
            $table->string('city');

            $table->timestamps();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
