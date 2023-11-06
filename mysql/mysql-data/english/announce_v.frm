TYPE=VIEW
query=select `english`.`announces`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_announces`.`gl_title` AS `gl_title`,`english`.`global_announces`.`gl_content` AS `gl_content`,`english`.`global_announces`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`announces` left join `english`.`global_announces` on((`english`.`announces`.`id` = `english`.`global_announces`.`announce_id`))) join `english`.`country_codes` on((`english`.`global_announces`.`language_id` = `english`.`country_codes`.`id`)))
md5=3c1a837618ff0f65e061e739030b597e
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:57:14
create-version=1
source=select `announces`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_announces`.`gl_title` AS `gl_title`,`global_announces`.`gl_content` AS `gl_content`,`global_announces`.`overwrite_protection` AS `overwrite_protection` from ((`announces` left join `global_announces` on((`announces`.`id` = `global_announces`.`announce_id`))) join `country_codes` on((`global_announces`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`announces`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_announces`.`gl_title` AS `gl_title`,`english`.`global_announces`.`gl_content` AS `gl_content`,`english`.`global_announces`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`announces` left join `english`.`global_announces` on((`english`.`announces`.`id` = `english`.`global_announces`.`announce_id`))) join `english`.`country_codes` on((`english`.`global_announces`.`language_id` = `english`.`country_codes`.`id`)))
