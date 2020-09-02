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
            $table->string('shop_tabelog_id', 8)->comment('食べログID')->primary();
            $table->string('shop_postcode', 7)->comment('店舗郵便番号')->nullable();
            $table->string('shop_pref', 5)->comment('店舗都道府県')->nullable();
            $table->string('shop_area', 10)->comment('店舗エリア')->nullable();
            $table->text('shop_name')->comment('店舗名');
            $table->text('shop_category_name')->comment('店舗カテゴリー名')->nullable();
            $table->float('shop_score', 3, 2)->comment('店舗スコア')->nullable();
            $table->text('shop_thumbnail_url')->comment('店舗サムネイルURL')->nullable();
            $table->text('shop_url_tabelog')->comment('店舗食べログURL');
            $table->text('shop_url_uber_eats')->comment('店舗UberEats URL')->nullable();
            $table->text('shop_url_demaekan')->comment('店舗出前館 URL')->nullable();
            $table->text('shop_url_d_delivery')->comment('店舗dデリバリー URL')->nullable();
            $table->text('shop_url_rakuten_delivery')->comment('店舗楽天デリバリー URL')->nullable();
            $table->text('shop_address')->comment('店舗住所')->nullable();
            $table->double('shop_address_lat', 10, 7)->comment('店舗緯度')->index()->nullable();
            $table->double('shop_address_lng', 10, 7)->comment('店舗軽度')->index()->nullable();
            $table->string('shop_clowl', 1)->comment('店舗閲覧フラグ')->default(0);
            $table->string('shop_fetched', 1)->comment('店舗情報取得フラグ')->nullable()->default(Null);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();;
            $table->softDeletes();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->increments('area_id')->comment('地域ID');
            $table->string('area_name', 30)->comment('地域名');
            $table->string('area_noun', 1)->comment('地域名50音');
            $table->longText('area_url')->comment('地域URL');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));;
            $table->softDeletes();
        });

        Schema::create('shop_lists', function (Blueprint $table) {
            $table->increments('shop_list_id')->comment('ショップリストID');
            $table->string('shop_list_area_id', 7)->comment('ショップリスト地域ID');
            $table->string('shop_list_pref_id', 5)->comment('ショップリスト都道府県ID');
            $table->string('shop_list_name', 10)->comment('ショップリスト名');
            $table->longText('shop_list_href')->comment('ショップリストURL');
            $table->integer('shop_list_num', false, true)->comment('ショップリストレコード数');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));;
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
