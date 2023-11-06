TYPE=VIEW
query=select `english`.`textbook_categories`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_categories`.`gl_name` AS `gl_name`,`english`.`global_textbook_categories`.`gl_description` AS `gl_description` from ((`english`.`textbook_categories` left join `english`.`global_textbook_categories` on((`english`.`textbook_categories`.`id` = `english`.`global_textbook_categories`.`textbook_category_id`))) join `english`.`country_codes` on((`english`.`global_textbook_categories`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`textbook_categories`.`status` = 1)
md5=e2921e18d22aa37ed8fb2e84afbf10c0
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:58:51
create-version=1
source=select `textbook_categories`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_textbook_categories`.`gl_name` AS `gl_name`,`global_textbook_categories`.`gl_description` AS `gl_description` from ((`textbook_categories` left join `global_textbook_categories` on((`textbook_categories`.`id` = `global_textbook_categories`.`textbook_category_id`))) join `country_codes` on((`global_textbook_categories`.`language_id` = `country_codes`.`id`))) where (`textbook_categories`.`status` = 1)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`textbook_categories`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbook_categories`.`gl_name` AS `gl_name`,`english`.`global_textbook_categories`.`gl_description` AS `gl_description` from ((`english`.`textbook_categories` left join `english`.`global_textbook_categories` on((`english`.`textbook_categories`.`id` = `english`.`global_textbook_categories`.`textbook_category_id`))) join `english`.`country_codes` on((`english`.`global_textbook_categories`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`textbook_categories`.`status` = 1)
