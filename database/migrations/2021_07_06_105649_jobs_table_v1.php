<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobsTableV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('jobs')) {
            Schema::table('jobs', function (Blueprint $table) {
                if (!Schema::hasColumn('jobs', 'country_id')) {
                $table->string('country_id')->default('1')->after('country');
                }
                if (!Schema::hasColumn('jobs', 'city_id')) {
                $table->string('city_id')->default('1')->after('city');
                }
                if (!Schema::hasColumn('jobs', 'currency_id')) {
                    $table->string('currency_id')->default('QAR')->after('currency');
                }
                if (Schema::hasColumn('jobs', 'username')) {
                $table->dropColumn('username');
                }
                if (Schema::hasColumn('jobs', 'salary')) {
                $table->dropColumn('salary');
                }
                if (Schema::hasColumn('jobs', 'offered_salary')) {
                $table->dropColumn('offered_salary');
                }

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('jobs')) {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropColumn(['country_id']);
                $table->dropColumn(['city_id']);
            });
        }
    }
}
