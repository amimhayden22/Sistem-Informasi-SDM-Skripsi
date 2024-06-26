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
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('position_id')->nullable();
            $table->char('code', 50)->nullable();
            $table->string('name', 150);
            $table->string('place_of_birth', 100);
            $table->date('date_of_birth');
            $table->string('email', 150);
            $table->text('address');
            $table->bigInteger('phone');
            $table->string('religion', 150);
            $table->string('education', 150);
            $table->string('bank', 150);
            $table->string('account_number');
            $table->date('start_contract')->nullable();
            $table->date('end_of_contract')->nullable();
            $table->double('basic_salary')->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade');
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
