TYPE=VIEW
query=select `english`.`mail_templates`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_mail_templates`.`gl_subject` AS `gl_subject`,`english`.`global_mail_templates`.`gl_body` AS `gl_body`,`english`.`global_mail_templates`.`gl_body_html` AS `gl_body_html`,`english`.`global_mail_templates`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`mail_templates` left join `english`.`global_mail_templates` on((`english`.`mail_templates`.`id` = `english`.`global_mail_templates`.`mail_template_id`))) join `english`.`country_codes` on((`english`.`global_mail_templates`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`mail_templates`.`status` = 1)
md5=4c5ec0de739c46483fd91c954bea0663
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:58:23
create-version=1
source=select `mail_templates`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_mail_templates`.`gl_subject` AS `gl_subject`,`global_mail_templates`.`gl_body` AS `gl_body`,`global_mail_templates`.`gl_body_html` AS `gl_body_html`,`global_mail_templates`.`overwrite_protection` AS `overwrite_protection` from ((`mail_templates` left join `global_mail_templates` on((`mail_templates`.`id` = `global_mail_templates`.`mail_template_id`))) join `country_codes` on((`global_mail_templates`.`language_id` = `country_codes`.`id`))) where (`mail_templates`.`status` = 1)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`mail_templates`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_mail_templates`.`gl_subject` AS `gl_subject`,`english`.`global_mail_templates`.`gl_body` AS `gl_body`,`english`.`global_mail_templates`.`gl_body_html` AS `gl_body_html`,`english`.`global_mail_templates`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`mail_templates` left join `english`.`global_mail_templates` on((`english`.`mail_templates`.`id` = `english`.`global_mail_templates`.`mail_template_id`))) join `english`.`country_codes` on((`english`.`global_mail_templates`.`language_id` = `english`.`country_codes`.`id`))) where (`english`.`mail_templates`.`status` = 1)
