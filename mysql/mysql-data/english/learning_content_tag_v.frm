TYPE=VIEW
query=select `english`.`learning_content_tags`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_learning_content_tags`.`gl_name` AS `gl_name`,`english`.`global_learning_content_tags`.`gl_description` AS `gl_description`,`english`.`global_learning_content_tags`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`learning_content_tags` left join `english`.`global_learning_content_tags` on((`english`.`learning_content_tags`.`id` = `english`.`global_learning_content_tags`.`tag_id`))) join `english`.`country_codes` on((`english`.`global_learning_content_tags`.`language_id` = `english`.`country_codes`.`id`)))
md5=d86a1e35389b975cc844a1ef003b8e65
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:58:07
create-version=1
source=select `learning_content_tags`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_learning_content_tags`.`gl_name` AS `gl_name`,`global_learning_content_tags`.`gl_description` AS `gl_description`,`global_learning_content_tags`.`overwrite_protection` AS `overwrite_protection` from ((`learning_content_tags` left join `global_learning_content_tags` on((`learning_content_tags`.`id` = `global_learning_content_tags`.`tag_id`))) join `country_codes` on((`global_learning_content_tags`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`learning_content_tags`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_learning_content_tags`.`gl_name` AS `gl_name`,`english`.`global_learning_content_tags`.`gl_description` AS `gl_description`,`english`.`global_learning_content_tags`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`learning_content_tags` left join `english`.`global_learning_content_tags` on((`english`.`learning_content_tags`.`id` = `english`.`global_learning_content_tags`.`tag_id`))) join `english`.`country_codes` on((`english`.`global_learning_content_tags`.`language_id` = `english`.`country_codes`.`id`)))
