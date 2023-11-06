TYPE=VIEW
query=select `english`.`teachers`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_teachers`.`gl_message` AS `gl_message`,`english`.`global_teachers`.`gl_self_introduction_third_pp` AS `gl_self_introduction_third_pp` from ((`english`.`teachers` left join `english`.`global_teachers` on((`english`.`teachers`.`id` = `english`.`global_teachers`.`teacher_id`))) join `english`.`country_codes` on((`english`.`global_teachers`.`language_id` = `english`.`country_codes`.`id`)))
md5=95af08c28d9a4ee3eb23e210c354ad51
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:58:44
create-version=1
source=select `teachers`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_teachers`.`gl_message` AS `gl_message`,`global_teachers`.`gl_self_introduction_third_pp` AS `gl_self_introduction_third_pp` from ((`teachers` left join `global_teachers` on((`teachers`.`id` = `global_teachers`.`teacher_id`))) join `country_codes` on((`global_teachers`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`teachers`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_teachers`.`gl_message` AS `gl_message`,`english`.`global_teachers`.`gl_self_introduction_third_pp` AS `gl_self_introduction_third_pp` from ((`english`.`teachers` left join `english`.`global_teachers` on((`english`.`teachers`.`id` = `english`.`global_teachers`.`teacher_id`))) join `english`.`country_codes` on((`english`.`global_teachers`.`language_id` = `english`.`country_codes`.`id`)))
