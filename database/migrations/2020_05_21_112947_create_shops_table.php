<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_shops', function (Blueprint $table) {
            $table->string('shop_tabelog_id', 8)->comment('食べログID')->primary();
            $table->string('shop_postcode', 7)->comment('店舗郵便番号')->nullable();
            $table->string('shop_pref', 5)->comment('店舗都道府県')->nullable();
            $table->string('shop_area', 10)->comment('店舗エリア')->nullable();
            $table->text('shop_name')->comment('店舗名');
            $table->text('shop_category_name')->comment('店舗カテゴリー名')->nullable();
            $table->float('shop_score', 3, 2)->comment('店舗スコア')->nullable();
            $table->text('shop_thumbnail_url')->comment('店舗サムネイルURL')->nullable();
            $table->text('shop_url_tabelog')->comment('店舗食べログURL');
            $table->string('shop_url_uber_eats', 500)->comment('店舗UberEats URL')->nullable();
            $table->string('shop_url_demaekan', 30)->comment('店舗出前館 URL')->nullable();
            $table->string('shop_url_d_delivery', 30)->comment('店舗dデリバリー URL')->nullable();
            $table->string('shop_url_rakuten_delivery', 30)->comment('店舗楽天デリバリー URL')->nullable();
            $table->string('shop_id_menu', 12)->comment('Menu 店舗ID')->nullable();
            $table->string('shop_id_wolt', 200)->comment('Wolt 店舗ID')->nullable();
            $table->string('shop_id_foodpanda', 12)->comment('Foodpanda 店舗ID')->nullable();
            $table->string('shop_id_foodneko', 12)->comment('Foodneko 店舗ID')->nullable();
            $table->text('shop_address')->comment('店舗住所')->nullable();
            $table->double('shop_address_lat', 10, 7)->comment('店舗緯度')->index()->nullable();
            $table->double('shop_address_lng', 10, 7)->comment('店舗軽度')->index()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::table('m_shops', function (Blueprint $table) {
            $table->index('shop_url_uber_eats');
            $table->index('shop_url_demaekan');
            $table->index('shop_url_rakuten_delivery');
            $table->index('shop_url_d_delivery');
            $table->index('shop_id_menu');
            $table->index('shop_id_wolt');
            $table->index('shop_id_foodpanda');
            $table->index('shop_id_foodneko');
        });

        Schema::create('m_areas', function (Blueprint $table) {
            $table->string('area_id', 2)->comment('エリアID')->primary();
            $table->string('area_name', 30)->comment('エリア名');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('m_prefs', function (Blueprint $table) {
            $table->string('pref_id', 2)->comment('都道府県ID')->primary();
            $table->string('pref_name', 4)->comment('都道府県名')->nullable();
            $table->string('pref_area_id', 2)->comment('所属エリアID')->index()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });


        Schema::create('m_cities', function(Blueprint $table) {
            $table->string('city_id', 5)->comment('市区町村ID')->primary();
            $table->string('city_name', 20)->comment('市区町村名')->nullable();
            $table->string('city_kana', 50)->comment('市区町村名カナ')->nullable()->index();
            $table->string('city_pref_id', 2)->comment('所属都道府県ID')->nullable()->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('m_towns', function(Blueprint $table) {
            $table->string('town_id', 9)->comment('大字ID')->primary();
            $table->string('town_name', 20)->comment('大字名')->nullable();
            $table->string('town_city_id', 5)->comment('所属市区町村ID')->nullable()->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('m_streets', function(Blueprint $table) {
            $table->string('street_id', 12)->comment('丁目ID')->primary();
            $table->string('street_name', 20)->comment('丁目名')->nullable();
            $table->string('street_town_id', 9)->comment('所属大字ID')->nullable()->index();
            $table->double('street_lat', 10, 7)->comment('緯度')->nullable()->index();
            $table->double('street_lng', 10, 7)->comment('経度')->nullable()->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            //
        });
    }
}
