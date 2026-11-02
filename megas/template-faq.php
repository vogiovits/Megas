<?php
/* Template Name: Μέγας — Συχνές ερωτήσεις */
get_header();
$faqs=array(
 array(megas_t('Ποιες συσκευασίες διαθέτει ο Μέγας;','Which pack sizes are available?'),megas_t('Κλασικός Αλεσμένος 200g και 500g, Κλασικός σε Κόκκους 4kg και φλιτζάνι Μέγας με πιατάκι. Για διαθεσιμότητα, επικοινώνησε μαζί μας.','Classic Ground 200g and 500g, Classic Whole Bean 4kg, and the Megas cup and saucer. Contact us for availability.')),
 array(megas_t('Ο καφές 4kg είναι αλεσμένος;','Is the 4kg coffee ground?'),megas_t('Η συσκευασία 4kg περιέχει καφέ σε κόκκους. Μίλησέ μας για την κατάλληλη άλεση.','The 4kg pack contains whole bean coffee. Talk to us about grinding.')),
 array(megas_t('Πώς μπορώ να συνεργαστώ μαζί σας;','How can I become a partner?'),megas_t('Στείλε μας ένα μήνυμα με τα στοιχεία της επιχείρησής σου και θα συζητήσουμε τις ανάγκες σου.','Send us your business details and we will discuss your needs.')),
 array(megas_t('Μπορώ να αγοράσω online;','Can I buy online?'),megas_t('Η ιστοσελίδα παρουσιάζει τα προϊόντα μας. Για πληροφορίες αγοράς ή συνεργασίας, επικοινώνησε μαζί μας.','This website presents our products. Contact us about purchasing or partnerships.'))
);
?>
<main id="main-content"><section class="page-title wrap"><div class="eyebrow">FAQ</div><h1><?php echo esc_html(megas_t('Συχνές ερωτήσεις','Frequently asked questions')); ?></h1></section><section class="wrap faq-content"><?php foreach($faqs as $i=>$item): ?><details class="faq-item" <?php echo $i===0?'open':''; ?>><summary><?php echo esc_html($item[0]); ?></summary><p><?php echo esc_html($item[1]); ?></p></details><?php endforeach; ?></section></main><?php get_footer(); ?>
