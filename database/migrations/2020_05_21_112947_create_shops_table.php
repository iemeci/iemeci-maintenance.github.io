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
        Schema::create('shops', function (Blueprint $table) {
            //
            $table->increments('shop_id')->comment('店舗いえメシID');
            $table->string('shop_pref', 5)->comment('店舗都道府県');
            $table->string('shop_area', 10)->comment('店舗エリア');
            $table->text('shop_name')->comment('店舗名');
            $table->text('shop_category_name')->comment('店舗カテゴリー名')->nullable();
            $table->float('shop_score', 3, 2)->comment('店舗スコア')->nullable();
            $table->text('shop_thumbnail_url')->comment('店舗サムネイルURL')->nullable();
            $table->text('shop_url_tabelog')->comment('店舗食べログURL')->nullable();
            $table->text('shop_url_uber_eats')->comment('店舗UberEats URL')->nullable();
            $table->text('shop_url_demaekan')->comment('店舗出前館 URL')->nullable();
            $table->text('shop_url_d_delivery')->comment('店舗dデリバリー URL')->nullable();
            $table->text('shop_url_rakuten_delivery')->comment('店舗楽天デリバリー URL')->nullable();
            $table->text('shop_address')->comment('店舗住所');
            $table->double('shop_address_lat', 10, 7)->comment('店舗緯度')->index();
            $table->double('shop_address_lng', 10, 7)->comment('店舗軽度')->index();
            $table->timestamps();
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
