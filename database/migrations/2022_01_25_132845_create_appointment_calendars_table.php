<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_calendars', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('all_monday_1')->default(0)->nullable();
            $table->longText('monday_1')->nullable();

            $table->tinyInteger('all_tuesday_1')->default(0)->nullable();
            $table->longText('tuesday_1')->nullable();

            $table->tinyInteger('all_wednesday_1')->default(0)->nullable();
            $table->longText('wednesday_1')->nullable();

            $table->tinyInteger('all_thursday_1')->default(0)->nullable();
            $table->longText('thursday_1')->nullable();

            $table->tinyInteger('all_friday_1')->default(0)->nullable();
            $table->longText('friday_1')->nullable();

            $table->tinyInteger('all_saturday_1')->default(0)->nullable();
            $table->longText('saturday_1')->nullable();

            $table->tinyInteger('all_sunday_1')->default(0)->nullable();
            $table->longText('sunday_1')->nullable();

            $table->tinyInteger('all_monday_2')->default(0)->nullable();
            $table->longText('monday_2')->nullable();

            $table->tinyInteger('all_tuesday_2')->default(0)->nullable();
            $table->longText('tuesday_2')->nullable();

            $table->tinyInteger('all_wednesday_2')->default(0)->nullable();
            $table->longText('wednesday_2')->nullable();

            $table->tinyInteger('all_thursday_2')->default(0)->nullable();
            $table->longText('thursday_2')->nullable();

            $table->tinyInteger('all_friday_2')->default(0)->nullable();
            $table->longText('friday_2')->nullable();

            $table->tinyInteger('all_saturday_2')->default(0)->nullable();
            $table->longText('saturday_2')->nullable();

            $table->tinyInteger('all_sunday_2')->default(0)->nullable();
            $table->longText('sunday_2')->nullable();

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
        Schema::dropIfExists('appointment_calendars');
    }
}
