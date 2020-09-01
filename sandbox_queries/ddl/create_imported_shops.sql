drop table sandbox.imported_shops;
create table sandbox.imported_shops
(
    shop_id int auto_increment primary key,
    shop_name text null,
    tabelog_url text null,
    shop_url text null,
    shop_address text null,
    service_name text null
);

