<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMKanas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kanas', function (Blueprint $table) {
            //
            $table->integer('kana_id')->primary();
            $table->string('kana_name', 1);
            $table->integer('kana_group_id')->index();
        });
        Schema::create('m_kana_groups', function (Blueprint $table) {
            //
            $table->integer('kana_group_id')->primary();
            $table->string('kana_group_name', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_kanas', function (Blueprint $table) {
            //
        });
    }
}
