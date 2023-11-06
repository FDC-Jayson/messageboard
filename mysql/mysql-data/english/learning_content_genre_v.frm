TYPE=VIEW
query=select `english`.`learning_content_genres`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_learning_content_genres`.`gl_name` AS `gl_name`,`english`.`global_learning_content_genres`.`gl_description` AS `gl_description`,`english`.`global_learning_content_genres`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`learning_content_genres` left join `english`.`global_learning_content_genres` on((`english`.`learning_content_genres`.`id` = `english`.`global_learning_content_genres`.`genre_id`))) join `english`.`country_codes` on((`english`.`global_learning_content_genres`.`language_id` = `english`.`country_codes`.`id`)))
md5=fafb1cfb171b688a6ca2008c395a18cb
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:58:00
create-version=1
source=select `learning_content_genres`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_learning_content_genres`.`gl_name` AS `gl_name`,`global_learning_content_genres`.`gl_description` AS `gl_description`,`global_learning_content_genres`.`overwrite_protection` AS `overwrite_protection` from ((`learning_content_genres` left join `global_learning_content_genres` on((`learning_content_genres`.`id` = `global_learning_content_genres`.`genre_id`))) join `country_codes` on((`global_learning_content_genres`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`learning_content_genres`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_learning_content_genres`.`gl_name` AS `gl_name`,`english`.`global_learning_content_genres`.`gl_description` AS `gl_description`,`english`.`global_learning_content_genres`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`learning_content_genres` left join `english`.`global_learning_content_genres` on((`english`.`learning_content_genres`.`id` = `english`.`global_learning_content_genres`.`genre_id`))) join `english`.`country_codes` on((`english`.`global_learning_content_genres`.`language_id` = `english`.`country_codes`.`id`)))
