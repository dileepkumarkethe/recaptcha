
use recaptcha_dev;
insert into sites (site_id,site_key,site_secret,site_lang,site_charset,site_appl,page_title,page_heading,page_message,form_submit,recaptcha_theme) 
values ('demo_01','YOUR RECAPTCHA SITE KEY GOES HERE','YOUR RECAPTCHA SECRET GOES HERE','en','UTF-8','./phpinfo.php','reCAPTCHA Demo','reCAPTCHA Demo using MySQL','This demonstration illustrates reCAPTCHA v2 and MySQL, where MySQL is used for storing things like site specific content. Like this message.','Run Application','dark');

insert into sites (site_id,site_key,site_secret) 
values ('demo_02','YOUR RECAPTCHA SITE KEY GOES HERE','YOUR RECAPTCHA SECRET GOES HERE');

select * from sites;
