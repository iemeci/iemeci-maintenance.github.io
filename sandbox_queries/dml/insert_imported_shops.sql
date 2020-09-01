-- 手動でインポートする
-- 楽天デリバリーのインポート
update iemeci.shops origin
join (
    select
    r_delivery_origin.shop_url
    ,r_delivery_origin.tabelog_url
    from (
      select shop_url
      ,tabelog_url
      from sandbox.imported_shops
      where service_name = '楽天デリバリー'
        and tabelog_url <> '-' and tabelog_url is not null
    ) r_delivery_origin
    join (
      select
      tabelog_url,
      max(cast(replace(replace(shop_url, '/store/', ''), '/', '') as signed )) as r_delivery_id
      from sandbox.imported_shops
      where service_name = '楽天デリバリー'
        and tabelog_url <> '-' and tabelog_url is not null
      group by tabelog_url
    ) max_r_delivery
    on r_delivery_origin.tabelog_url = max_r_delivery.tabelog_url
    and r_delivery_origin.shop_url = concat('/store/', max_r_delivery.r_delivery_id, '/')
) r_delivery
on concat('https://tabelog.com', origin.shop_url_tabelog) = r_delivery.tabelog_url collate utf8_general_ci
set origin.shop_url_rakuten_delivery = r_delivery.shop_url
;


-- dデリバリーのインポート
update iemeci.shops origin
    join (
        select
            d_delivery_origin.shop_url
             , d_delivery_origin.tabelog_url
        from (
            select
            shop_url
            ,tabelog_url
            from sandbox.imported_shops
            where service_name = 'ｄデリバリー'
              and tabelog_url <> '-' and tabelog_url is not null
            ) d_delivery_origin
            join (
              select
                tabelog_url,
                max(cast(replace(replace(shop_url, 'https://delivery.dmkt-sp.jp/shop/itemlist/', ''), '/', '') as signed )) as d_delivery_id
               from sandbox.imported_shops
              where service_name = 'ｄデリバリー'
              and tabelog_url <> '-' and tabelog_url is not null
              group by tabelog_url
            ) max_r_delivery
            on d_delivery_origin.tabelog_url = max_r_delivery.tabelog_url
            and d_delivery_origin.shop_url = concat('https://delivery.dmkt-sp.jp/shop/itemlist/', max_r_delivery.d_delivery_id, '/')
    ) r_delivery
    on concat('https://tabelog.com', origin.shop_url_tabelog) = r_delivery.tabelog_url collate utf8_general_ci
set origin.shop_url_d_delivery = replace(r_delivery.shop_url, 'https://delivery.dmkt-sp.jp', '')
;
