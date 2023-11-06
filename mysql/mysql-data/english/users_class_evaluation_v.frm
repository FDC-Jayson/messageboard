TYPE=VIEW
query=select `english`.`users_class_evaluations`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_users_class_evaluations`.`gl_user_comment` AS `gl_user_comment` from ((`english`.`users_class_evaluations` left join `english`.`global_users_class_evaluations` on((`english`.`users_class_evaluations`.`id` = `english`.`global_users_class_evaluations`.`users_class_evaluation_id`))) join `english`.`country_codes` on((`english`.`global_users_class_evaluations`.`language_id` = `english`.`country_codes`.`id`)))
md5=e21b60be48b80a6f492f20d07b5657a9
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:59:27
create-version=1
source=select `users_class_evaluations`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_users_class_evaluations`.`gl_user_comment` AS `gl_user_comment` from ((`users_class_evaluations` left join `global_users_class_evaluations` on((`users_class_evaluations`.`id` = `global_users_class_evaluations`.`users_class_evaluation_id`))) join `country_codes` on((`global_users_class_evaluations`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`users_class_evaluations`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_users_class_evaluations`.`gl_user_comment` AS `gl_user_comment` from ((`english`.`users_class_evaluations` left join `english`.`global_users_class_evaluations` on((`english`.`users_class_evaluations`.`id` = `english`.`global_users_class_evaluations`.`users_class_evaluation_id`))) join `english`.`country_codes` on((`english`.`global_users_class_evaluations`.`language_id` = `english`.`country_codes`.`id`)))
