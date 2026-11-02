<?php
if (!defined('ABSPATH')) { exit; }
function megas_contact_defaults() { return array('phone'=>'2741022201','email'=>'hello@megas.coffee','address'=>'Κροκιδά 15, Κόρινθος, ΤΚ 20100'); }
function megas_contact_value($key) { $defaults=megas_contact_defaults();return get_theme_mod('megas_'.$key,$defaults[$key] ?? ''); }
function megas_defaults() {
 return array(
 'hero_title'=>"\"Τιμά το παρελθόν\nκαι αγκαλιάζει\nτο μέλλον\"",'en_hero_title'=>"\"Honouring the past.\nEmbracing the future.\"",
 'hero_button'=>'Ανακάλυψε τον','en_hero_button'=>'Discover it',
 'story_title'=>"Ένας καφές με\nτη δική του ιστορία.",'en_story_title'=>"A coffee with\na story of its own.",
 'story_body'=>'Με πολλή αγάπη και μεράκι δημιουργήθηκε ο Μέγας Ελληνικός Καφές: ένα ισορροπημένο χαρμάνι που συνδυάζει μια παραδοσιακή μυστική συνταγή ετών με ορισμένες σύγχρονες επιρροές. Διακρίνεται από ανθικά αρώματα, γεύσεις ξηρών καρπών και κακάο, καθώς και γεμάτο σώμα.',
 'en_story_body'=>'Created with love and care, Megas Greek Coffee brings together a time-honoured secret recipe and contemporary influences. A balanced blend with floral aromas, nutty and cocoa flavours, and a full body.',
 'award_title'=>"Μια ταυτότητα\nπου ξεχωρίζει.",'en_award_title'=>"An identity\nthat stands out.",
 'award_body'=>'Ασημένια διάκριση στα Specialist Awards 2025, στην κατηγορία Branding. Μια αναγνώριση της εικόνας με την οποία ο Μέγας συστήνεται στο σήμερα.',
 'en_award_body'=>'A Silver distinction at the Specialist Awards 2025 in the Branding category. Recognition of the identity with which Megas introduces itself today.',
 'products_title'=>'Τα προϊόντα μας','en_products_title'=>'Our products',
 'product_0'=>'Μέγας Ελληνικός Καφές Κλασικός Αλεσμένος 200g','en_product_0'=>'Megas Classic Ground Greek Coffee 200g',
 'product_1'=>'Μέγας Ελληνικός Καφές Κλασικός Αλεσμένος 500g','en_product_1'=>'Megas Classic Ground Greek Coffee 500g',
 'product_2'=>'Μέγας Ελληνικός Καφές Κλασικός σε κόκκους 4000γρ','en_product_2'=>'Megas Classic Whole Bean Greek Coffee 4000g',
 'product_3'=>'Φλιτζάνι Μέγας Ελληνικός Καφές','en_product_3'=>'Megas Greek Coffee Cup',
 'preparation_title'=>"Η παράδοση\nσε τέσσερα βήματα.",'en_preparation_title'=>"Tradition,\nin four simple steps.",
 'preparation_intro'=>'Ο καλός ελληνικός θέλει λίγο χρόνο και πολύ μεράκι. Ας τον ετοιμάσουμε μαζί.','en_preparation_intro'=>'Good Greek coffee takes a little time and a little care. Let’s make it together.',
 'step_1_title'=>'Δοσολογία','en_step_1_title'=>'Measure',
 'step_1_body'=>'Προσθέτουμε 10 g Μέγας Ελληνικό Καφέ σε 100 ml νερό. Προσθέτουμε ζάχαρη, αν επιθυμούμε.','en_step_1_body'=>'Add 10 g of Megas Greek Coffee to 100 ml of water. Add sugar if desired.',
 'step_2_title'=>'Αργό βράσιμο','en_step_2_title'=>'Slow brewing',
 'step_2_body'=>'Ανακατεύουμε καλά και αφήνουμε σε χαμηλή φωτιά για περίπου 4 λεπτά. Αποσύρουμε το μπρίκι μόλις αρχίσει να φουσκώνει ο καφές, πριν ξεχειλίσει.','en_step_2_body'=>'Stir well and leave over low heat for about 4 minutes. Remove the briki as the foam begins to rise, before it boils over.',
 'step_3_title'=>'Σερβίρισμα','en_step_3_title'=>'Serve',
 'step_3_body'=>'Σερβίρουμε αργά και από χαμηλά στο φλιτζάνι, ώστε να διατηρηθεί το καϊμάκι.','en_step_3_body'=>'Pour slowly, keeping the briki close to the cup to preserve the foam.',
 'step_4_title'=>'Απόλαυση','en_step_4_title'=>'Enjoy',
 'step_4_body'=>'Αφήνουμε λίγο να κατασταλάξει. Συνοδεύουμε με ένα ποτήρι νερό και απολαμβάνουμε. Καλή απόλαυση!','en_step_4_body'=>'Let the grounds settle, serve with a glass of water and enjoy.',
 'professional_title'=>'Ο Μέγας στο δικό σου κατάστημα.','en_professional_title'=>'Megas in your store.',
 'professional_body'=>'Πρόσφερε στους πελάτες σου έναν καφέ με αυθεντικό χαρακτήρα. Με το χαρμάνι Μέγας Ελληνικός Καφές, τον κατάλληλο εξοπλισμό και τη δική μας υποστήριξη, δημιουργούμε μαζί μια συνεργασία που στηρίζει την καθημερινότητα της επιχείρησής σου.',
 'en_professional_body'=>'Offer your customers a coffee with authentic character. With the Megas Greek Coffee blend, the right equipment and our support, we build a partnership that supports the everyday needs of your business.',
 'professional_button'=>'Γίνε συνεργάτης μας','en_professional_button'=>'Become a partner',
 'cta_title'=>'Να τα πούμε με έναν καφέ;','en_cta_title'=>'Let’s talk over coffee.',
 'footer_tagline'=>'Η παράδοση σε κάθε φλιτζάνι.','en_footer_tagline'=>'Tradition in every cup.'
 );
}
function megas_customize($wp_customize) {
 $wp_customize->add_panel('megas',array('title'=>'Μέγας — Περιεχόμενο','priority'=>30));
 $groups=array('hero'=>'Κεντρική παρουσίαση','story'=>'Η ιστορία μας','award'=>'Βράβευση','products'=>'Προϊόντα','preparation'=>'Παρασκευή','professional'=>'Επαγγελματίες','cta'=>'Κάλεσμα επικοινωνίας','footer'=>'Υποσέλιδο');
 foreach($groups as $id=>$label){$wp_customize->add_section('megas_'.$id,array('title'=>$label,'panel'=>'megas'));}
 foreach(megas_defaults() as $key=>$default){
  $plain=preg_replace('/^en_/','',$key);$group=explode('_',$plain)[0];
  if($group==='product')$group='products';if($group==='step')$group='preparation';
  $wp_customize->add_setting('megas_'.$key,array('default'=>$default,'sanitize_callback'=>'sanitize_textarea_field','transport'=>'refresh'));
  $wp_customize->add_control('megas_'.$key,array('section'=>'megas_'.$group,'label'=>(strpos($key,'en_')===0?'EN · ':'EL · ').str_replace('_',' ',$plain),'type'=>'textarea'));
 }
 $images=array('hero'=>'products/classic-200g.webp','cup'=>'products/cup.webp','award'=>'brand/specialist-silver-2025.png','product_0'=>'products/classic-200g.webp','product_1'=>'products/classic-500g.webp','product_2'=>'products/beans-4kg.webp','product_3'=>'products/cup.webp');
 foreach($images as $key=>$file){$group=strpos($key,'product_')===0?'products':($key==='award'?'award':'hero');$setting='megas_image_'.$key;$wp_customize->add_setting($setting,array('default'=>'','sanitize_callback'=>'esc_url_raw'));$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,$setting,array('label'=>'Εικόνα: '.$key,'section'=>'megas_'.$group)));}
 for($i=1;$i<=4;$i++){$key='megas_step_image_'.$i;$wp_customize->add_setting($key,array('default'=>'','sanitize_callback'=>'esc_url_raw'));$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,$key,array('label'=>'Φωτογραφία βήματος '.$i,'section'=>'megas_preparation')));}
 $wp_customize->add_section('megas_contact',array('title'=>'Επικοινωνία & σύνδεσμοι','panel'=>'megas'));
 $wp_customize->add_setting('megas_language',array('default'=>'el','sanitize_callback'=>function($value){return in_array($value,array('el','en'),true)?$value:'el';}));
 $wp_customize->add_control('megas_language',array('label'=>'Γλώσσα περιεχομένου χωρίς Polylang','section'=>'megas_contact','type'=>'select','choices'=>array('el'=>'Ελληνικά','en'=>'English')));
 foreach(array('phone'=>'Τηλέφωνο','email'=>'Δημόσιο email / παραλήπτης φόρμας','address'=>'Διεύθυνση','contact_url'=>'Σελίδα επικοινωνίας (προαιρετικό)','terms_url'=>'Όροι χρήσης (URL)','english_url'=>'Αγγλική αρχική (αν δεν χρησιμοποιείται Polylang)') as $key=>$label){
  $sanitize=str_ends_with($key,'url')?'esc_url_raw':($key==='email'?'sanitize_email':'sanitize_text_field');$wp_customize->add_setting('megas_'.$key,array('default'=>megas_contact_defaults()[$key] ?? '','sanitize_callback'=>$sanitize));$wp_customize->add_control('megas_'.$key,array('label'=>$label,'section'=>'megas_contact','type'=>str_ends_with($key,'url')?'url':($key==='email'?'email':'text')));
 }
 for($i=0;$i<4;$i++){$key='megas_product_url_'.$i;$wp_customize->add_setting($key,array('default'=>'','sanitize_callback'=>'esc_url_raw'));$wp_customize->add_control($key,array('label'=>'Σύνδεσμος προϊόντος '.($i+1),'section'=>'megas_products','type'=>'url'));}
}
add_action('customize_register','megas_customize');
