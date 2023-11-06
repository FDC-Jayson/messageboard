TYPE=VIEW
query=select `english`.`campaign_app_banners`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_campaign_app_banners`.`gl_title` AS `gl_title`,`english`.`global_campaign_app_banners`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`campaign_app_banners` left join `english`.`global_campaign_app_banners` on((`english`.`campaign_app_banners`.`id` = `english`.`global_campaign_app_banners`.`campaign_app_banner_id`))) join `english`.`country_codes` on((`english`.`global_campaign_app_banners`.`language_id` = `english`.`country_codes`.`id`)))
md5=7541d215b8a485f5525e05379d6cf83c
updatable=0
algorithm=0
definer_user=ncwww
definer_host=%
suid=1
with_check_option=0
timestamp=2021-11-18 02:57:43
create-version=1
source=select `campaign_app_banners`.`id` AS `id`,`country_codes`.`iso_639_1` AS `language`,`global_campaign_app_banners`.`gl_title` AS `gl_title`,`global_campaign_app_banners`.`overwrite_protection` AS `overwrite_protection` from ((`campaign_app_banners` left join `global_campaign_app_banners` on((`campaign_app_banners`.`id` = `global_campaign_app_banners`.`campaign_app_banner_id`))) join `country_codes` on((`global_campaign_app_banners`.`language_id` = `country_codes`.`id`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `english`.`campaign_app_banners`.`id` AS `id`,`english`.`country_codes`.`iso_639_1` AS `language`,`english`.`global_campaign_app_banners`.`gl_title` AS `gl_title`,`english`.`global_campaign_app_banners`.`overwrite_protection` AS `overwrite_protection` from ((`english`.`campaign_app_banners` left join `english`.`global_campaign_app_banners` on((`english`.`campaign_app_banners`.`id` = `english`.`global_campaign_app_banners`.`campaign_app_banner_id`))) join `english`.`country_codes` on((`english`.`global_campaign_app_banners`.`language_id` = `english`.`country_codes`.`id`)))
