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
<main id="main-content"><section class="page-title wrap"><div class="eyebrow"><?php echo esc_html(megas_t('ΕΠΙΚΟΙΝΩΝΙΑ','CONTACT')); ?></div><h1><?php echo esc_html(megas_t('Ας γνωριστούμε.','Let’s get to know each other.')); ?></h1></section><section class="contact-grid wrap"><div class="contact-info"><h2><?php echo esc_html(megas_t('Ας μιλήσουμε','Let’s talk')); ?></h2><p><?php echo esc_html(megas_t('Έχεις μια ερώτηση για τον καφέ μας, θέλεις πληροφορίες για τα προϊόντα μας ή ενδιαφέρεσαι για συνεργασία; Είτε απολαμβάνεις τον Μέγα στο σπίτι είτε τον προσφέρεις στην επιχείρησή σου, είμαστε εδώ για να σε ακούσουμε. Στείλε μας το μήνυμά σου και θα χαρούμε να μιλήσουμε.', 'Have a question about our coffee, need information about our products, or interested in working together? Whether you enjoy Megas at home or serve it in your business, we’re here to listen. Send us a message — we’d love to hear from you.')); ?></p><dl class="contact-details">
<?php $phone=megas_contact_value('phone'); if($phone): ?><div><dt><?php echo esc_html(megas_t('Σταθερό τηλέφωνο','Telephone')); ?></dt><dd><a href="tel:<?php echo esc_attr(preg_replace('/[^+0-9]/','',$phone)); ?>"><?php echo esc_html($phone); ?></a></dd></div><?php endif; ?>
<?php $email=megas_contact_value('email'); if(is_email($email)): ?><div><dt>Email</dt><dd><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></dd></div><?php endif; ?>
<?php $address=megas_contact_value('address'); if($address): ?><div><dt><?php echo esc_html(megas_t('Διεύθυνση','Address')); ?></dt><dd><?php echo esc_html($address); ?></dd></div><?php endif; ?>
<?php $hours=megas_contact_value(megas_en() ? 'en_hours' : 'hours'); if($hours): ?><div><dt><?php echo esc_html(megas_t('Ωράριο λειτουργίας','Opening hours')); ?></dt><dd><?php echo nl2br(esc_html($hours)); ?></dd></div><?php endif; ?>
</dl></div>
<form class="contact-form" id="contact-form" method="post" action="<?php echo esc_url(add_query_arg('megas_lang',megas_en() ? 'en' : 'el',admin_url('admin-post.php'))); ?>">
<?php if(isset($statuses[$status])): ?><p class="contact-status <?php echo esc_attr($status); ?>" role="status"><?php echo esc_html($statuses[$status]); ?></p><?php endif; ?>
<input type="hidden" name="action" value="megas_contact"><?php wp_nonce_field('megas_contact','megas_nonce'); ?>
<div class="form-pair"><label><?php echo esc_html(megas_t('Ονοματεπώνυμο','Full name')); ?><input name="name" autocomplete="name" maxlength="100" required></label><label>Email<input name="email" type="email" autocomplete="email" maxlength="254" required></label></div><div class="form-pair"><label><?php echo esc_html(megas_t('Επιχείρηση (προαιρετικό)','Business (optional)')); ?><input name="company" autocomplete="organization" maxlength="200"></label><label><?php echo esc_html(megas_t('Θέμα','Topic')); ?><select name="subject"><option value="general"><?php echo esc_html(megas_t('Γενικές πληροφορίες','General information')); ?></option><option value="partnership"><?php echo esc_html(megas_t('Επαγγελματική συνεργασία','Business partnership')); ?></option><option value="product" <?php selected(isset($_GET['product'])); ?>><?php echo esc_html(megas_t('Πληροφορίες προϊόντων','Product information')); ?></option></select></label></div>
<label><?php echo esc_html(megas_t('Το μήνυμά σου','Your message')); ?><textarea name="message" rows="5" maxlength="4000" required><?php echo esc_textarea($product_message); ?></textarea></label>
<div class="megas-honeypot" aria-hidden="true"><label>Website<input name="website" tabindex="-1" autocomplete="off"></label></div>
<label class="checkbox"><input type="checkbox" name="privacy" value="1" required><span><?php echo esc_html(megas_t('Συμφωνώ να χρησιμοποιηθούν τα στοιχεία μου για την απάντηση στο αίτημά μου.','I agree to the use of my details to respond to this enquiry.')); ?><?php if(get_privacy_policy_url()): ?> <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php echo esc_html(megas_t('Ενημέρωση απορρήτου','Privacy information')); ?></a><?php endif; ?></span></label>
<button class="button" type="submit"><?php echo esc_html(megas_t('Αποστολή μηνύματος','Send message')); ?> <?php megas_arrow(); ?></button>
</form></section>
<?php
$store_address = megas_contact_value('address');
if ($store_address):
    $map_url = add_query_arg(array('q'=>$store_address, 'hl'=>megas_en() ? 'en' : 'el', 'z'=>'17', 'output'=>'embed'), 'https://maps.google.com/maps');
    $directions_url = add_query_arg(array('api'=>'1', 'destination'=>$store_address), 'https://www.google.com/maps/dir/');
?>
<section class="contact-location wrap" aria-labelledby="contact-location-title">
    <div class="contact-location-heading"><div><h2 id="contact-location-title"><?php echo esc_html(megas_t('Θα μας βρείτε εδώ','Find us here')); ?></h2><p><?php echo esc_html($store_address); ?></p></div>
    <a class="button" href="<?php echo esc_url($directions_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html(megas_t('Οδηγίες διαδρομής','Get directions')); ?> <?php megas_arrow(); ?></a></div>
    <iframe class="contact-map" src="<?php echo esc_url($map_url); ?>" title="<?php echo esc_attr(megas_t('Χάρτης καταστήματος Μέγας — ','Megas store map — ').$store_address); ?>" width="1240" height="480" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
</section>
<?php endif; ?>
</main><?php get_footer(); ?>
