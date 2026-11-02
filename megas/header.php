<?php if (!defined('ABSPATH')) { exit; } ?><!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php if(!has_site_icon()): ?><link rel="icon" type="image/png" href="<?php echo esc_url(megas_asset('brand/megas-logo.png')); ?>"><?php endif; ?><?php wp_head(); ?></head>
<body <?php body_class('megas-site'); ?>><?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main-content"><?php echo esc_html(megas_t('Μετάβαση στο περιεχόμενο','Skip to content')); ?></a>
<header id="top"><div class="header-inner wrap">
<?php megas_brand(); ?>
<nav class="site-nav" id="primary-navigation" aria-label="<?php echo esc_attr(megas_t('Κύρια πλοήγηση','Main navigation')); ?>">
<?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'fallback_cb'=>'megas_fallback_menu','depth'=>3)); ?>
</nav><div class="header-actions">
<?php if(function_exists('pll_the_languages')): $langs=pll_the_languages(array('raw'=>1,'hide_if_empty'=>1,'hide_if_no_translation'=>1)); if(count($langs)>1): ?>
<details class="dropdown language"><summary><?php echo esc_html(strtoupper(pll_current_language('slug'))); ?></summary><div><?php foreach($langs as $lang): ?><a href="<?php echo esc_url($lang['url']); ?>" lang="<?php echo esc_attr($lang['slug']); ?>" hreflang="<?php echo esc_attr($lang['locale']); ?>"><?php echo esc_html($lang['name']); ?></a><?php endforeach; ?></div></details>
<?php endif; elseif(get_theme_mod('megas_english_url','')): ?>
<details class="dropdown language"><summary><?php echo megas_en()?'EN':'EL'; ?></summary><div><a href="<?php echo esc_url(home_url('/')); ?>" lang="el">Ελληνικά</a><a href="<?php echo esc_url(get_theme_mod('megas_english_url')); ?>" lang="en">English</a></div></details>
<?php else: ?><span class="language-current" aria-label="<?php echo esc_attr(megas_en()?'English':'Ελληνικά'); ?>"><?php echo megas_en()?'EN':'EL'; ?></span><?php endif; ?>
<a class="header-cta" href="<?php echo esc_url(megas_home().'#professionals'); ?>"><?php echo esc_html(megas_t('Ας συνεργαστούμε','Let’s work together')); ?> <?php megas_arrow(); ?></a>
<button class="mobile-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation"><?php echo esc_html(megas_t('Μενού','Menu')); ?> <span aria-hidden="true">☰</span></button>
</div></div></header>
