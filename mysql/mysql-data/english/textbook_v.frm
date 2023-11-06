TYPE=VIEW
query=select `english`.`textbooks`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbooks`.`gl_name` AS `gl_name` from ((`english`.`textbooks` left join `english`.`global_textbooks` on((`english`.`textbooks`.`id` = `english`.`global_textbooks`.`textbook_id`))) join `english`.`country_codes` on((`english`.`global_textbooks`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`textbooks`.`status` = 1)
md5=27bd5261e6e80dd7303b5d20f313c195
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:59:19
create-version=1
source=select `textbooks`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_textbooks`.`gl_name` AS `gl_name` from ((`textbooks` left join `global_textbooks` on((`textbooks`.`id` = `global_textbooks`.`textbook_id`))) join `country_codes` on((`global_textbooks`.`language_id` = `country_codes`.`id`))) where (`textbooks`.`status` = 1)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`textbooks`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_textbooks`.`gl_name` AS `gl_name` from ((`english`.`textbooks` left join `english`.`global_textbooks` on((`english`.`textbooks`.`id` = `english`.`global_textbooks`.`textbook_id`))) join `english`.`country_codes` on((`english`.`global_textbooks`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`textbooks`.`status` = 1)
