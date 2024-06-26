<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->date('leave_date');
            $table->date('return_date');
            $table->text('description');
            $table->text('reason')->nullable();
            $table->enum('status', ['Mengajukan', 'Sedang Proses', 'Disetujui', 'Tidak Disetujui'])->nullable()->default('Mengajukan');
            $table->string('ba_signature')->nullable();
            $table->string('manager_signature')->nullable();
            $table->string('applicant_signature')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
