TYPE=VIEW
query=select `english`.`textbook_subcategories`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_subcategories`.`gl_name` AS `gl_name`,`english`.`global_textbook_subcategories`.`gl_description` AS `gl_description` from ((`english`.`textbook_subcategories` left join `english`.`global_textbook_subcategories` on((`english`.`textbook_subcategories`.`id` = `english`.`global_textbook_subcategories`.`textbook_subcategory_id`))) join `english`.`country_codes` on((`english`.`global_textbook_subcategories`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`textbook_subcategories`.`status` = 1)
md5=1867e80ca38f36aae7b33f85c12bb888
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:59:13
create-version=1
source=select `textbook_subcategories`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_textbook_subcategories`.`gl_name` AS `gl_name`,`global_textbook_subcategories`.`gl_description` AS `gl_description` from ((`textbook_subcategories` left join `global_textbook_subcategories` on((`textbook_subcategories`.`id` = `global_textbook_subcategories`.`textbook_subcategory_id`))) join `country_codes` on((`global_textbook_subcategories`.`language_id` = `country_codes`.`id`))) where (`textbook_subcategories`.`status` = 1)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`textbook_subcategories`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_subcategories`.`gl_name` AS `gl_name`,`english`.`global_textbook_subcategories`.`gl_description` AS `gl_description` from ((`english`.`textbook_subcategories` left join `english`.`global_textbook_subcategories` on((`english`.`textbook_subcategories`.`id` = `english`.`global_textbook_subcategories`.`textbook_subcategory_id`))) join `english`.`country_codes` on((`english`.`global_textbook_subcategories`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`textbook_subcategories`.`status` = 1)
