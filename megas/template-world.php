<?php
if (!defined('ABSPATH')) { exit; }
$world_page=megas_world_page();
if (!$world_page) { return; }
get_header();
?>
<main id="main-content" class="world-page">
<section class="page-title wrap"><div class="eyebrow"><?php echo esc_html(megas_t('Ο ΚΟΣΜΟΣ ΜΑΣ','OUR WORLD')); ?></div><h1><?php echo esc_html($world_page==='about' ? megas_t('Σχετικά με εμάς','About us') : megas_t('Η φιλοσοφία μας','Our philosophy')); ?></h1></section>
<?php if($world_page==='about'): ?>
<div class="world-about world-about-copy wrap">
<p><?php echo esc_html(megas_t('Είμαστε δεύτερη γενιά coffee roasters και συνεχίζουμε την οικογενειακή μας διαδρομή στον καφέ μέσα από την Earth Supplies Ε.Ε., μια εταιρεία επεξεργασίας και εμπορίου καφέ με έδρα την Κόρινθο. Συνδυάζουμε την εμπειρία δύο γενεών με υψηλή τεχνογνωσία και συνεχή εκπαίδευση, αναζητώντας καθημερινά την ποιότητα σε κάθε στάδιο της δουλειάς μας.', 'We are second-generation coffee roasters, continuing our family’s journey in coffee through Earth Supplies E.E., a coffee processing and trading company based in Corinth, Greece. We combine two generations of experience with specialist expertise and ongoing education, pursuing quality at every stage of our work.')); ?></p>
<p><?php echo esc_html(megas_t('Πίσω από την εταιρεία βρίσκεται ο Παναγιώτης Βόγιοβιτς, πιστοποιημένος Q Arabica Grader και κάτοχος του SCA Coffee Diploma. Η γνώση, η εκπαίδευση και η αγάπη του για τον καφέ δίνουν κατεύθυνση στη δουλειά μας, από την αξιολόγηση της πρώτης ύλης έως την επεξεργασία και την ανάδειξη του χαρακτήρα κάθε χαρμανιού.', 'Behind the company is Panagiotis Vogiovits, a certified Q Arabica Grader and holder of the SCA Coffee Diploma. His knowledge, training, and love of coffee guide our work, from evaluating green coffee to processing it and bringing out the character of each blend.')); ?></p>
<p><?php echo esc_html(megas_t('Στις εγκαταστάσεις μας στην Κόρινθο επεξεργαζόμαστε καφέδες υψηλής ποιότητας και παράγουμε τα δικά μας brands, μεταξύ αυτών το «ΜΕΓΑΣ ΕΛΛΗΝΙΚΟΣ ΚΑΦΕΣ». Από εδώ τροφοδοτούμε όλη την Ελλάδα, φέρνοντας την εμπειρία, τη φροντίδα και το μεράκι μας σε κάθε φλιτζάνι.', 'At our facilities in Corinth, we process high-quality coffees and produce our coffee brands, including MEGAS GREEK COFFEE. From here, we supply customers throughout Greece, bringing our experience, care, and dedication to every cup.')); ?></p>
</div>
<?php else: ?>
<section class="world-philosophy wrap">
<blockquote><p><?php echo esc_html(megas_t('“Διάλεξε μια δουλειά που σου αρέσει και δε θα χρειαστεί να δουλέψεις ούτε μια μέρα στη ζωή σου”', '“Choose a job you love, and you will never have to work a day in your life.”')); ?></p></blockquote>
<div class="world-letter">
<p><?php echo esc_html(megas_t('Με αυτή τη φράση συνοψίζονται όλα όσα αισθάνομαι για το επάγγελμα που έχω διαλέξει. Η λατρεία για τον καλό καφέ ενισχύει την ανάγκη μου να εξελίσσομαι καθημερινά και τη δίψα μου για δημιουργία δίχως αυτό να το θεωρώ δουλειά.', 'This phrase sums up everything I feel about the profession I have chosen. My love of good coffee fuels my desire to grow every day and my thirst for creating, without ever thinking of it as work.')); ?></p>
<p><?php echo esc_html(megas_t('Με πολλή αγάπη και μεράκι δημιουργήθηκε ο Μέγας Ελληνικός καφές, ένα χαρμάνι που συνδυάζει μια παραδοσιακή μυστική συνταγή ετών με ορισμένες σύγχρονες επιρροές. Διακρίνεται από τα ανθικά του αρώματα, γεύσεις ξηρών καρπών και κακάο καθώς και γεμάτο σώμα.', 'Megas Greek Coffee was created with love and dedication: a blend that combines a time-honored secret recipe with contemporary influences. It is distinguished by its floral aromas, notes of nuts and cocoa, and full body.')); ?></p>
<p><?php echo esc_html(megas_t('Είναι ένας ελληνικός καφές που θα συντροφεύει την κάθε σας ημέρα. Καλή απόλαυση!', 'It is a Greek coffee to accompany you every day. Enjoy!')); ?></p>
<p class="world-signature"><?php echo esc_html(megas_t('Παναγιώτης Βόγιοβιτς','Panagiotis Vogiovits')); ?></p>
<p class="world-founder-title">FOUNDER ΜΕΓΑΣ ΕΛΛΗΝΙΚΟΣ ΚΑΦΕΣ</p>
</div></section>
<?php endif; ?>
<nav class="world-pages wrap" aria-label="<?php echo esc_attr(megas_t('Ο κόσμος μας','Our world')); ?>"><a href="<?php echo esc_url(megas_world_url($world_page==='about' ? 'philosophy' : 'about')); ?>"><?php echo esc_html($world_page==='about' ? megas_t('Η φιλοσοφία μας','Our philosophy') : megas_t('Σχετικά με εμάς','About us')); ?> <?php megas_arrow(); ?></a></nav>
</main><?php get_footer(); ?>
