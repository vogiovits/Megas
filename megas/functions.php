<?php
/** Megas theme bootstrap. */
if (!defined('ABSPATH')) { exit; }
require_once get_template_directory() . '/inc/settings.php';
require_once get_template_directory() . '/inc/contact.php';
function megas_setup() {
    load_theme_textdomain('megas', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array('height'=>500,'width'=>500,'flex-height'=>true,'flex-width'=>true));
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    add_theme_support('responsive-embeds');
    register_nav_menus(array('primary'=>'Κύριο μενού','footer_company'=>'Footer — Η εταιρεία','footer_business'=>'Footer — Επαγγελματίες','footer_help'=>'Footer — Χρήσιμα'));
}
add_action('after_setup_theme', 'megas_setup');
function megas_assets() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('megas-site',get_theme_file_uri('assets/css/site.css'),array(),$version);
    wp_enqueue_script('megas-site',get_theme_file_uri('assets/js/site.js'),array(),$version,true);
}
add_action('wp_enqueue_scripts','megas_assets');
function megas_en() { return function_exists('pll_current_language') ? pll_current_language('slug') === 'en' : get_theme_mod('megas_language','el') === 'en'; }
function megas_t($el,$en) { return megas_en() ? $en : $el; }
function megas_asset($file) { return get_theme_file_uri('assets/images/' . $file); }
function megas_image($file,$setting='') { $custom=$setting ? get_theme_mod($setting,'') : ''; return $custom ?: megas_asset($file); }
function megas_text($key) { $defaults=megas_defaults(); $prefix=megas_en()?'en_':''; return get_theme_mod('megas_'.$prefix.$key,$defaults[$prefix.$key] ?? $defaults[$key] ?? ''); }
function megas_lines($text) { return nl2br(esc_html($text)); }
function megas_accent_lines($text) { $parts=explode("\n",$text,2);return esc_html($parts[0]).(isset($parts[1])?'<br><em>'.megas_lines($parts[1]).'</em>':''); }
function megas_home() { return function_exists('pll_home_url') ? pll_home_url() : home_url('/'); }
function megas_contact_url() {
    $custom=get_theme_mod('megas_contact_url',''); if ($custom) { return $custom; }
    $pages=get_pages(array('meta_key'=>'_wp_page_template','meta_value'=>'template-contact.php','number'=>1));
    return $pages ? get_permalink($pages[0]) : add_query_arg('megas_contact','1',megas_home());
}
function megas_faq_url() { $page=get_page_by_path('faq'); return $page ? get_permalink($page) : add_query_arg('megas_faq','1',megas_home()); }
function megas_product_url($index) {
    $custom=get_theme_mod('megas_product_url_'.$index,'');
    if ($custom) { return $custom; }
    $slugs = array('ground', 'ground', 'beans', 'cup');
    $slug = $slugs[$index] ?? 'ground';
    return add_query_arg(array('megas_product'=>$slug, 'variant'=>$index === 1 ? '500g' : ''), megas_home());
}
function megas_brand() {
    $id=get_theme_mod('custom_logo');
    $url=$id ? wp_get_attachment_image_url($id,'full') : megas_asset('brand/megas-logo.png');
    echo '<a class="brand" href="'.esc_url(megas_home()).'" aria-label="'.esc_attr(megas_t('Μέγας — Αρχική','Megas — Home')).'"><img class="brand-logo" src="'.esc_url($url).'" alt="Μέγας Ελληνικός Καφές" width="500" height="500"></a>';
}
function megas_arrow() { echo '<span class="arrow" aria-hidden="true">↗</span>'; }
function megas_fallback_menu() {
    echo '<ul class="menu"><li class="menu-item-has-children"><a href="'.esc_url(megas_home().'#about').'">'.esc_html(megas_t('Ο κόσμος μας','Our world')).'</a><ul class="sub-menu"><li><a href="'.esc_url(megas_home().'#about').'">'.esc_html(megas_t('Η φιλοσοφία μας','Our philosophy')).'</a></li><li><a href="'.esc_url(megas_home().'#preparation').'">'.esc_html(megas_t('Η τέχνη του ελληνικού','The coffee ritual')).'</a></li></ul></li>';
    foreach (array('products'=>megas_t('Τα προϊόντα μας','Our products'),'professionals'=>megas_t('Επαγγελματίες','Professionals')) as $id=>$label) { echo '<li><a href="'.esc_url(megas_home().'#'.$id).'">'.esc_html($label).'</a></li>'; }
    echo '<li><a href="'.esc_url(megas_contact_url()).'">'.esc_html(megas_t('Επικοινωνία','Contact')).'</a></li></ul>';
}
add_filter('query_vars',function($vars){ $vars[]='megas_contact';$vars[]='megas_faq';return $vars; });
add_filter('template_include',function($template){if(get_query_var('megas_contact'))return get_theme_file_path('template-contact.php');if(get_query_var('megas_faq'))return get_theme_file_path('template-faq.php');return $template;});
add_filter('pre_get_document_title',function($title){if(get_query_var('megas_contact'))return megas_t('Επικοινωνία','Contact').' — Μέγας';if(get_query_var('megas_faq'))return 'FAQ — Μέγας';return $title;});

require_once get_template_directory() . '/inc/products.php';
