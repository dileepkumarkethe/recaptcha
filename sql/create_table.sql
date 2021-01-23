
use recaptcha_dev;

create table sites(
    id integer(5) auto_increment not null,
    primary key(id),
    site_id varchar(32)  not null,
    
    site_key varchar(64) not null,
    site_secret varchar(64) not null,

    site_lang varchar(4) default 'en',
    
    site_charset varchar(16) default 'UTF-8',
    
    site_appl varchar(84) default './phpinfo.php',
    
    page_title varchar(32) default 'Title for this Page goes here',
    page_heading varchar(32) default 'Page Heading',
    page_message varchar(255) default 'A message of up to 255 characters can be here.',

    form_submit varchar(16) default 'Enter',
    
    recaptcha_theme varchar(8) default 'dark'
);

select * from sites;
