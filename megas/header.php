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
<?php $language_links=megas_language_links(); ?>
<details class="dropdown language"><summary aria-label="<?php echo esc_attr(megas_t('Επιλογή γλώσσας','Choose language')); ?>"><?php echo megas_en()?'EN':'EL'; ?></summary><div>
<?php foreach(array('el'=>'Ελληνικά','en'=>'English') as $code=>$label): ?>
<a href="<?php echo esc_url($language_links[$code]); ?>" lang="<?php echo esc_attr($code); ?>" hreflang="<?php echo esc_attr($code); ?>" <?php if((megas_en() ? 'en' : 'el') === $code): ?>aria-current="true"<?php endif; ?>><?php echo esc_html($label); ?></a>
<?php endforeach; ?></div></details>
<a class="header-cta" href="<?php echo esc_url(megas_home().'#professionals'); ?>"><?php echo esc_html(megas_t('Ας συνεργαστούμε','Let’s work together')); ?> <?php megas_arrow(); ?></a>
<button class="mobile-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation"><?php echo esc_html(megas_t('Μενού','Menu')); ?> <span aria-hidden="true">☰</span></button>
</div></div></header>
