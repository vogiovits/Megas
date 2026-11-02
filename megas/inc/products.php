<?php
/** Shared product catalogue and routing. */
if (!defined('ABSPATH')) { exit; }
function megas_products() {
    $coffee_description = megas_t(
        'Στα ελληνικά, «Μέγας» σημαίνει μεγαλοπρεπής. Και αυτό ακριβώς είναι αυτός ο καφές. Κάτι περισσότερο από ένα απλό ρόφημα, ο <strong>Μέγας</strong> είναι όλη η πλούσια παράδοσή μας σε ένα φλιτζάνι.<br><br>Φτιαγμένος από ένα διαχρονικό, μυστικό χαρμάνι που περνάει από γενιά σε γενιά, αυτός είναι ο ελληνικός καφές στην πιο αυθεντική του εκδοχή. Η συνταγή μας τιμά το παρελθόν ενώ αγκαλιάζει το παρόν, συνδυάζοντας την εμπειρία των προγόνων μας με την ακρίβεια της σημερινής τεχνολογίας καβουρδίσματος.<br><br>Αργά καβουρδισμένος στην εντέλεια και αλεσμένος σε παραδοσιακό πετρόμυλο, ο Μέγας είναι φτιαγμένος για το παραδοσιακό μπρίκι, προσφέροντας τη βαθιά, βελούδινη γεύση και το έντονο άρωμα που ορίζουν τον αυθεντικό ελληνικό καφέ.',
        'In Greek, “Megas” means grand — magnificent. And that’s exactly what this coffee is. More than just a drink, <strong>Megas</strong> brings our rich tradition to life in a cup.<br><br>Crafted from a timeless, secret blend passed down through generations, this is Greek coffee at its most authentic. Our recipe honors the past while embracing the present, combining the expertise of our ancestors with the precision of today’s roasting technology.<br><br>Slow-roasted to perfection and ground in a traditional stone mill, Megas is made for the traditional briki pot, delivering the deep, velvety flavor and bold aroma that define authentic Greek coffee.'
    );
    $coffee_info = megas_t(
        'Διατήρησε τη συσκευασία σε δροσερό και ξηρό μέρος, καλά κλεισμένη μετά το άνοιγμα.',
        'Store in a cool, dry place and close the pack tightly after opening.'
    );
    return array(
        'ground' => array(
            'title' => megas_t('Μέγας Ελληνικός Καφές Κλασικός Αλεσμένος', 'Megas Classic Ground Greek Coffee'),
            'description' => $coffee_description,
            'info' => $coffee_info,
            'features' => array(megas_t('Μορφή: αλεσμένος', 'Format: ground'), megas_t('Συσκευασίες: 200g / 500g', 'Packs: 200g / 500g')),
            'variants' => array('200g'=>array('200g','classic-200g.webp',0), '500g'=>array('500g','classic-500g.webp',1)),
        ),
        'beans' => array(
            'title' => megas_t('Μέγας Ελληνικός Καφές Κλασικός σε κόκκους', 'Megas Classic Whole Bean Greek Coffee'),
            'description' => $coffee_description,
            'info' => $coffee_info,
            'features' => array(megas_t('Μορφή: σε κόκκους', 'Format: whole beans'), megas_t('Για επαγγελματική χρήση', 'For professional use'), megas_t('Καθαρό βάρος: 4000γρ', 'Net weight: 4000g')),
            'variants' => array('4000g'=>array('4000g','beans-4kg.webp',2)),
        ),
        'cup' => array(
            'title' => megas_t('Φλιτζάνι Μέγας Ελληνικός Καφές', 'Megas Greek Coffee Cup'),
            'description' => megas_t('Το αγαπημένο σου τελετουργικό αποκτά το δικό του φλιτζάνι. Μικρό ή μεγάλο, το παραδοσιακό του σχήμα αγκαλιάζει τον ελληνικό καφέ και βοηθά να διατηρείται το καϊμάκι του, αναδεικνύοντας κάθε γουλιά. Μαζί με το πιατάκι του, ολοκληρώνει την εμπειρία του σερβιρίσματος, όπως της αξίζει.', 'Your favourite ritual finds its own cup. Small or large, its traditional shape cradles Greek coffee and helps preserve its delicate kaimaki foam, bringing out every sip. Paired with its matching saucer, it completes the serving experience your coffee deserves.'),
            'info' => megas_t('Πορσελάνινο φλιτζάνι σε παραδοσιακό σχήμα, με το λογότυπο Μέγας Ελληνικός Καφές. Διατίθεται σε μικρό και μεγάλο μέγεθος και συνοδεύεται από το αντίστοιχο πιατάκι. Κάθε σετ περιλαμβάνει ένα φλιτζάνι και ένα πιατάκι.', 'A traditionally shaped porcelain cup featuring the Megas Greek Coffee logo. Available in small and large sizes, each with its matching saucer. Every set includes one cup and one saucer.'),
            'features' => array(megas_t('Πορσελάνη', 'Porcelain'), megas_t('Παραδοσιακό σχήμα', 'Traditional shape'), megas_t('Λογότυπο Μέγας Ελληνικός Καφές', 'Megas Greek Coffee logo'), megas_t('Το σετ περιλαμβάνει φλιτζάνι με πιατάκι', 'The set includes a cup and saucer'), megas_t('Κατάλληλο για πλυντήριο πιάτων', 'Dishwasher safe')),
            'variants' => array('small'=>array(megas_t('Μικρό','Small'),'cup.webp',3), 'large'=>array(megas_t('Μεγάλο','Large'),'cup.webp',3)),
        ),
    );
}
function megas_current_product() {
    $key = get_query_var('megas_product');
    $products = megas_products();
    return is_string($key) && isset($products[$key]) ? $key : '';
}
add_filter('query_vars', function($vars) { $vars[]='megas_product'; $vars[]='variant'; return $vars; });
add_filter('template_include', function($template) {
    return megas_current_product() ? get_theme_file_path('template-product.php') : $template;
}, 20);
add_filter('pre_get_document_title', function($title) {
    $key = megas_current_product();
    return $key ? megas_products()[$key]['title'].' — Μέγας' : $title;
}, 20);
