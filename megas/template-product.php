<?php
if (!defined('ABSPATH')) { exit; }
$key = megas_current_product();
if (!$key) { return; }
$product = megas_products()[$key];
$variant = get_query_var('variant');
if (!is_string($variant) || !isset($product['variants'][$variant])) { $variant = array_key_first($product['variants']); }
$choice = $product['variants'][$variant];
get_header();
?>
<main id="main-content" class="product-detail wrap">
<nav class="product-breadcrumb" aria-label="<?php echo esc_attr(megas_t('Διαδρομή','Breadcrumb')); ?>"><a href="<?php echo esc_url(megas_home().'#products'); ?>"><?php echo esc_html(megas_t('Τα προϊόντα μας','Our products')); ?></a><span aria-hidden="true"> / </span><span><?php echo esc_html($product['title']); ?></span></nav>
<article class="product-detail-grid">
<div class="product-detail-photo"><img src="<?php echo esc_url(megas_image('products/'.$choice[1], 'megas_image_product_'.$choice[2])); ?>" alt="<?php echo esc_attr($product['title'].' — '.$choice[0]); ?>" width="1121" height="1403" fetchpriority="high"></div>
<div class="product-detail-copy"><div class="eyebrow"><?php echo esc_html(megas_t('Η ΣΕΙΡΑ ΜΑΣ','OUR COLLECTION')); ?></div><h1><?php echo esc_html($product['title']); ?></h1>
<section><h2><?php echo esc_html(megas_t('Περιγραφή','Description')); ?></h2><p><?php echo wp_kses($product['description'], array('strong'=>array(), 'em'=>array(), 'br'=>array())); ?></p></section>
<section><h2><?php echo esc_html(megas_t('Πληροφορίες','Information')); ?></h2><p><?php echo esc_html($product['info']); ?></p></section>
<section><h2><?php echo esc_html(megas_t('Χαρακτηριστικά','Features')); ?></h2><ul class="product-features"><?php foreach ($product['features'] as $feature): ?><li><?php echo esc_html($feature); ?></li><?php endforeach; ?></ul></section>
<section><h2><?php echo esc_html(megas_t('Επιλογές','Options')); ?></h2><div class="product-options" aria-label="<?php echo esc_attr(megas_t('Διαθέσιμες επιλογές','Available options')); ?>"><?php foreach ($product['variants'] as $value=>$option): ?><a class="product-option<?php echo $value === $variant ? ' is-selected' : ''; ?>" href="<?php echo esc_url(add_query_arg(array('megas_product'=>$key, 'variant'=>$value), megas_home())); ?>" <?php if ($value === $variant): ?>aria-current="true"<?php endif; ?>><?php echo esc_html($option[0]); ?></a><?php endforeach; ?></div><p class="product-selection"><?php echo esc_html(megas_t('Επιλεγμένο: ','Selected: ').$choice[0]); ?></p></section>
<a class="button" href="<?php echo esc_url(add_query_arg(array('product'=>$key, 'variant'=>$variant), megas_contact_url())); ?>"><?php echo esc_html(megas_t('Ρώτησέ μας για το προϊόν','Enquire about this product')); ?> <?php megas_arrow(); ?></a>
</div></article>
<nav class="product-other" aria-label="<?php echo esc_attr(megas_t('Περισσότερα προϊόντα','More products')); ?>"><?php foreach (megas_products() as $slug=>$item): if ($slug === $key) { continue; } ?><a href="<?php echo esc_url(add_query_arg('megas_product',$slug,megas_home())); ?>"><?php echo esc_html($item['title']); ?> ↗</a><?php endforeach; ?></nav>
</main><?php get_footer(); ?>
