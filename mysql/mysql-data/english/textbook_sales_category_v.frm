TYPE=VIEW
query=select `english`.`textbook_sales_categories`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_sales_categories`.`gl_title` AS `gl_title`,`english`.`global_textbook_sales_categories`.`gl_description` AS `gl_description`,`english`.`global_textbook_sales_categories`.`gl_description2` AS `gl_description2`,`english`.`global_textbook_sales_categories`.`gl_description3` AS `gl_description3`,`english`.`global_textbook_sales_categories`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`textbook_sales_categories` left join `english`.`global_textbook_sales_categories` on((`english`.`textbook_sales_categories`.`id` = `english`.`global_textbook_sales_categories`.`textbook_sales_category_id`))) join `english`.`country_codes` on((`english`.`global_textbook_sales_categories`.`language_id` = `english`.`country_codes`.`id`)))
md5=7c1a90872bfb7c14c1670b83379923ea
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:59:06
create-version=1
source=select `textbook_sales_categories`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_textbook_sales_categories`.`gl_title` AS `gl_title`,`global_textbook_sales_categories`.`gl_description` AS `gl_description`,`global_textbook_sales_categories`.`gl_description2` AS `gl_description2`,`global_textbook_sales_categories`.`gl_description3` AS `gl_description3`,`global_textbook_sales_categories`.`overwrite_protection` AS `overwrite_protection` from ((`textbook_sales_categories` left join `global_textbook_sales_categories` on((`textbook_sales_categories`.`id` = `global_textbook_sales_categories`.`textbook_sales_category_id`))) join `country_codes` on((`global_textbook_sales_categories`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`textbook_sales_categories`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_sales_categories`.`gl_title` AS `gl_title`,`english`.`global_textbook_sales_categories`.`gl_description` AS `gl_description`,`english`.`global_textbook_sales_categories`.`gl_description2` AS `gl_description2`,`english`.`global_textbook_sales_categories`.`gl_description3` AS `gl_description3`,`english`.`global_textbook_sales_categories`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`textbook_sales_categories` left join `english`.`global_textbook_sales_categories` on((`english`.`textbook_sales_categories`.`id` = `english`.`global_textbook_sales_categories`.`textbook_sales_category_id`))) join `english`.`country_codes` on((`english`.`global_textbook_sales_categories`.`language_id` = `english`.`country_codes`.`id`)))
