TYPE=VIEW
query=select `english`.`textbook_sales_category_items`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_sales_category_items`.`language_id` AS `language_id`,`english`.`global_textbook_sales_category_items`.`gl_title` AS `gl_title`,`english`.`global_textbook_sales_category_items`.`gl_description` AS `gl_description` from ((`english`.`textbook_sales_category_items` left join `english`.`global_textbook_sales_category_items` on((`english`.`textbook_sales_category_items`.`id` = `english`.`global_textbook_sales_category_items`.`textbook_sales_category_item_id`))) join `english`.`country_codes` on((`english`.`global_textbook_sales_category_items`.`language_id` = `english`.`country_codes`.`id`)))
md5=cbc515fdfbbab6195df10e963297a14b
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:59:00
create-version=1
source=select `textbook_sales_category_items`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_textbook_sales_category_items`.`language_id` AS `language_id`,`global_textbook_sales_category_items`.`gl_title` AS `gl_title`,`global_textbook_sales_category_items`.`gl_description` AS `gl_description` from ((`textbook_sales_category_items` left join `global_textbook_sales_category_items` on((`textbook_sales_category_items`.`id` = `global_textbook_sales_category_items`.`textbook_sales_category_item_id`))) join `country_codes` on((`global_textbook_sales_category_items`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`textbook_sales_category_items`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_sales_category_items`.`language_id` AS `language_id`,`english`.`global_textbook_sales_category_items`.`gl_title` AS `gl_title`,`english`.`global_textbook_sales_category_items`.`gl_description` AS `gl_description` from ((`english`.`textbook_sales_category_items` left join `english`.`global_textbook_sales_category_items` on((`english`.`textbook_sales_category_items`.`id` = `english`.`global_textbook_sales_category_items`.`textbook_sales_category_item_id`))) join `english`.`country_codes` on((`english`.`global_textbook_sales_category_items`.`language_id` = `english`.`country_codes`.`id`)))
