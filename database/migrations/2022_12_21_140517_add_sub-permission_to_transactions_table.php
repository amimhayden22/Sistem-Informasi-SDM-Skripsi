<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubPermissionToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('sub_permission', ['Perkawinan Pekerja Sendiri', 'Pembaptisan/khitanan anak sah Pekerja', 'Perkawinan anak sah Pekerja', 'Istri sah Pekerja melahirkan/gugur kandungan', 'Kematian suami/istri/anak/menantu/orang tua/mertua', 'Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah', 'Lainnya'])->nullable()->after('for');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('sub-permission');
        });
    }
}
