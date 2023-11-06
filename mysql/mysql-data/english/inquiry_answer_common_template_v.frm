TYPE=VIEW
query=select `english`.`inquiry_answer_common_template`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_inquiry_answer_common_templates`.`gl_signature` AS `gl_signature`,`english`.`global_inquiry_answer_common_templates`.`gl_footer` AS `gl_footer`,`english`.`global_inquiry_answer_common_templates`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`inquiry_answer_common_template` left join `english`.`global_inquiry_answer_common_templates` on((`english`.`inquiry_answer_common_template`.`id` = `english`.`global_inquiry_answer_common_templates`.`inquiry_answer_common_template_id`))) join `english`.`country_codes` on((`english`.`global_inquiry_answer_common_templates`.`language_id` = `english`.`country_codes`.`id`)))
md5=f6313e311636665913160a0996ee6e58
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=2
with_check_option=0
timestamp=2023-09-20 01:27:12
create-version=1
source=SELECT \n        `inquiry_answer_common_template`.`id`,\n        `country_codes`.`iso_639_1` as language,\n        `global_inquiry_answer_common_templates`.`gl_signature`,\n        `global_inquiry_answer_common_templates`.`gl_footer`,\n        `global_inquiry_answer_common_templates`.`overwrite_protection`\n    FROM\n        `english`.`inquiry_answer_common_template`\n            LEFT JOIN\n        global_inquiry_answer_common_templates ON (inquiry_answer_common_template.id = global_inquiry_answer_common_templates.inquiry_answer_common_template_id)\n            inner JOIN\n        country_codes ON (global_inquiry_answer_common_templates.language_id = country_codes.id)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `english`.`inquiry_answer_common_template`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_inquiry_answer_common_templates`.`gl_signature` AS `gl_signature`,`english`.`global_inquiry_answer_common_templates`.`gl_footer` AS `gl_footer`,`english`.`global_inquiry_answer_common_templates`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`inquiry_answer_common_template` left join `english`.`global_inquiry_answer_common_templates` on((`english`.`inquiry_answer_common_template`.`id` = `english`.`global_inquiry_answer_common_templates`.`inquiry_answer_common_template_id`))) join `english`.`country_codes` on((`english`.`global_inquiry_answer_common_templates`.`language_id` = `english`.`country_codes`.`id`)))
