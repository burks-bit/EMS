<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('middle_name');
            $table->text('last_name');
            $table->date('birthdate');
            $table->text('sex');
            $table->text('age');
            $table->text('address');
            $table->text('religion');
            $table->text('contact_no');
            $table->text('civil_status');
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
        Schema::dropIfExists('employees');
    }
}
