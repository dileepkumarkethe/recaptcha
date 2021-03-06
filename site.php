<?php
$_site_id = 'demo_01';
define('SITE_ID', $_site_id);

/*
    Register API keys at - 
        https://www.google.com/recaptcha/admin

    reCAPTCHA supported 40+ languages listed here -
        https://developers.google.com/recaptcha/docs/language
*/
define('SITE_KEY', '6LeC_jYaAAAAAAf-gwGRRniU2HBZLSXwHTZ8HfH3');
define('SITE_SECRET', '6LeC_jYaAAAAAGTQXaFetdQVf9fDDSjoJwex_q5_');
/*
    Language setting used by our HTML and required by the
    reCAPTCHA api. The charset is only used in our HTML.
*/
define('SITE_LANG', 'en');
define('SITE_CHARSET', 'UTF-8');
// the page that is loaded upon passing the reCAPTCHA and
// entering a user name
define('SITE_APPL', './phpinfo.php');
/*
    some page elements
*/
define('PAGE_TITLE', 'reCAPTCHA PHP Demo');
define('PAGE_HEADING', 'reCAPTCHA PHP Demo');
define('PAGE_MESSAGE', 'This demonstration illustrates reCAPTCHA v2 with PHP.');
// Submit button caption
define('FORM_SUBMIT', 'Enter');
// reCAPTCHA theme (light or dark)
define('RECAPTCHA_THEME', 'dark');
?>
