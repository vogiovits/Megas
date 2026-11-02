<?php
if (!defined('ABSPATH')) { exit; }
function megas_post_text($key) { return isset($_POST[$key]) && is_string($_POST[$key]) ? sanitize_text_field(wp_unslash($_POST[$key])) : ''; }
function megas_contact_finish($status) {
    $return=wp_get_referer() ?: add_query_arg('megas_contact','1',megas_home());
    $return=remove_query_arg('megas_status',$return);
    wp_safe_redirect(add_query_arg('megas_status',$status,$return).'#contact-form'); exit;
}
function megas_submit_contact() {
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') { wp_die('Method not allowed.','',array('response'=>405)); }
    $nonce=megas_post_text('megas_nonce');
    if (!$nonce || !wp_verify_nonce($nonce,'megas_contact')) { wp_die(esc_html(megas_t('Η φόρμα έληξε. Ανανεώστε τη σελίδα και δοκιμάστε ξανά.','This form expired. Refresh the page and try again.')),'',array('response'=>403)); }
    if (megas_post_text('website')) { megas_contact_finish('invalid'); }
    $name=megas_post_text('name');$email=megas_post_text('email');$company=megas_post_text('company');
    $message=isset($_POST['message']) && is_string($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
    $subject=megas_post_text('subject');
    if (!$name || strlen($name)>200 || !is_email($email) || strlen($email)>254 || !$message || strlen($message)>12000 || megas_post_text('privacy')!=='1') { megas_contact_finish('invalid'); }
    $allowed=array('general','partnership','product');if(!in_array($subject,$allowed,true))$subject='general';
    $ip=sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? 'unknown');$key='megas_contact_'.substr(wp_hash($ip),0,32);
    $attempts=(int)get_transient($key);if($attempts>=5)megas_contact_finish('limited');set_transient($key,$attempts+1,10*MINUTE_IN_SECONDS);
    $recipient=megas_contact_value('email') ?: get_option('admin_email');
    if(!is_email($recipient))megas_contact_finish('failed');
    $body="Name: $name\nEmail: $email\nCompany: $company\nTopic: $subject\n\n$message";
    $sent=wp_mail($recipient,'Megas website: '.$subject,$body,array('Content-Type: text/plain; charset=UTF-8','Reply-To: '.$email));
    megas_contact_finish($sent?'sent':'failed');
}
add_action('admin_post_megas_contact','megas_submit_contact');
add_action('admin_post_nopriv_megas_contact','megas_submit_contact');
