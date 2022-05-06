<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyForJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_for_jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id');
            $table->string('name');
            $table->string('email');
            $table->BigInteger('contact');
            $table->string('cv');
            $table->timestamps();
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_for_jobs');
    }
}
