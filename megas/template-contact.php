<?php
/* Template Name: Μέγας — Επικοινωνία */
get_header();
$status=isset($_GET['megas_status']) && is_string($_GET['megas_status']) ? sanitize_key(wp_unslash($_GET['megas_status'])) : '';
$product_message = '';
$product_key = isset($_GET['product']) && is_string($_GET['product']) ? sanitize_key(wp_unslash($_GET['product'])) : '';
$catalogue = megas_products();
if (isset($catalogue[$product_key])) {
    $selected_variant = isset($_GET['variant']) && is_string($_GET['variant']) ? sanitize_key(wp_unslash($_GET['variant'])) : '';
    $product_message = megas_t('Θα ήθελα πληροφορίες για: ', 'I would like information about: ').$catalogue[$product_key]['title'];
    if (isset($catalogue[$product_key]['variants'][$selected_variant])) {
        $product_message .= ' — '.$catalogue[$product_key]['variants'][$selected_variant][0];
    }
}
$statuses=array('sent'=>megas_t('Το μήνυμά σου υποβλήθηκε. Σε ευχαριστούμε!','Your message has been submitted. Thank you!'),'failed'=>megas_t('Η αποστολή δεν ολοκληρώθηκε. Δοκίμασε ξανά ή χρησιμοποίησε τα στοιχεία επικοινωνίας.','Your message could not be submitted. Try again or use our contact details.'),'invalid'=>megas_t('Έλεγξε τα υποχρεωτικά πεδία και δοκίμασε ξανά.','Check the required fields and try again.'),'limited'=>megas_t('Έχουν γίνει αρκετές προσπάθειες. Δοκίμασε ξανά σε δέκα λεπτά.','Too many attempts. Please try again in ten minutes.'));
?>
<main id="main-content"><section class="page-title wrap"><div class="eyebrow"><?php echo esc_html(megas_t('ΕΠΙΚΟΙΝΩΝΙΑ','CONTACT')); ?></div><h1><?php echo esc_html(megas_t('Ας γνωριστούμε.','Let’s get to know each other.')); ?></h1></section><section class="contact-grid wrap"><div class="contact-info"><h2><?php echo esc_html(megas_t('Ο Μέγας στο δικό σου κατάστημα.','Megas in your store.')); ?></h2><p><?php echo esc_html(megas_text('professional_body')); ?></p><?php foreach(array('phone','email','address') as $field):$value=megas_contact_value($field);if($value): ?><p><?php echo esc_html($value); ?></p><?php endif;endforeach; ?></div>
<form class="contact-form" id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
<?php if(isset($statuses[$status])): ?><p class="contact-status <?php echo esc_attr($status); ?>" role="status"><?php echo esc_html($statuses[$status]); ?></p><?php endif; ?>
<input type="hidden" name="action" value="megas_contact"><?php wp_nonce_field('megas_contact','megas_nonce'); ?>
<div class="form-pair"><label><?php echo esc_html(megas_t('Ονοματεπώνυμο','Full name')); ?><input name="name" autocomplete="name" maxlength="100" required></label><label>Email<input name="email" type="email" autocomplete="email" maxlength="254" required></label></div><div class="form-pair"><label><?php echo esc_html(megas_t('Επιχείρηση (προαιρετικό)','Business (optional)')); ?><input name="company" autocomplete="organization" maxlength="200"></label><label><?php echo esc_html(megas_t('Θέμα','Topic')); ?><select name="subject"><option value="general"><?php echo esc_html(megas_t('Γενικές πληροφορίες','General information')); ?></option><option value="partnership"><?php echo esc_html(megas_t('Επαγγελματική συνεργασία','Business partnership')); ?></option><option value="product" <?php selected(isset($_GET['product'])); ?>><?php echo esc_html(megas_t('Πληροφορίες προϊόντων','Product information')); ?></option></select></label></div>
<label><?php echo esc_html(megas_t('Το μήνυμά σου','Your message')); ?><textarea name="message" rows="5" maxlength="4000" required><?php echo esc_textarea($product_message); ?></textarea></label>
<div class="megas-honeypot" aria-hidden="true"><label>Website<input name="website" tabindex="-1" autocomplete="off"></label></div>
<label class="checkbox"><input type="checkbox" name="privacy" value="1" required><span><?php echo esc_html(megas_t('Συμφωνώ να χρησιμοποιηθούν τα στοιχεία μου για την απάντηση στο αίτημά μου.','I agree to the use of my details to respond to this enquiry.')); ?><?php if(get_privacy_policy_url()): ?> <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php echo esc_html(megas_t('Ενημέρωση απορρήτου','Privacy information')); ?></a><?php endif; ?></span></label>
<button class="button" type="submit"><?php echo esc_html(megas_t('Αποστολή μηνύματος','Send message')); ?> <?php megas_arrow(); ?></button>
</form></section></main><?php get_footer(); ?>
