<?php
if (!defined('ABSPATH')) { exit; }
function megas_world_url($page) { return add_query_arg('megas_world',$page,megas_home()); }
function megas_world_page() {
    $page=get_query_var('megas_world');
    return in_array($page,array('about','philosophy'),true) ? $page : '';
}
add_filter('query_vars',function($vars){$vars[]='megas_world';return $vars;});
add_filter('template_include',function($template){return megas_world_page() ? get_theme_file_path('template-world.php') : $template;},30);
add_filter('pre_get_document_title',function($title){
    $page=megas_world_page();
    return $page ? ($page==='about' ? megas_t('Σχετικά με εμάς','About us') : megas_t('Η φιλοσοφία μας','Our philosophy')).' — Μέγας' : $title;
},30);
/* Update this submenu even when a WordPress menu has been assigned. */
add_filter('wp_nav_menu_objects',function($items,$args){
    if (($args->theme_location ?? '') !== 'primary') { return $items; }
    $parent=null;
    foreach($items as $item){
        if (!(int)$item->menu_item_parent && in_array(trim(wp_strip_all_tags($item->title)),array('Ο κόσμος μας','Our world'),true)) { $parent=$item; break; }
    }
    if (!$parent) { return $items; }
    $removed=array();$parents=array((int)$parent->ID);
    do {
        $added=false;
        foreach($items as $item){
            if(in_array((int)$item->menu_item_parent,$parents,true) && !in_array((int)$item->ID,$removed,true)){
                $removed[]=(int)$item->ID;$parents[]=(int)$item->ID;$added=true;
            }
        }
    } while($added);
    $result=array();
    foreach($items as $item){
        if(in_array((int)$item->ID,$removed,true)){continue;}
        if($item->ID===$parent->ID){
            $item=clone $item;$item->url=megas_world_url('about');$item->title=megas_t('Ο κόσμος μας','Our world');
        }
        $result[]=$item;
        if($item->ID!==$parent->ID){continue;}
        foreach(array('about'=>megas_t('Σχετικά με εμάς','About us'),'philosophy'=>megas_t('Η φιλοσοφία μας','Our philosophy')) as $slug=>$title){
            $child=clone $parent;$child->ID=$slug==='about' ? -9001 : -9002;$child->db_id=$child->ID;
            $child->menu_item_parent=(string)$parent->ID;$child->title=$title;$child->url=megas_world_url($slug);
            $child->type='custom';$child->object='custom';$child->object_id=$child->ID;$child->classes=array();$child->target='';$child->xfn='';$child->attr_title='';$child->description='';$child->current=false;$child->current_item_parent=false;$child->current_item_ancestor=false;
            $result[]=$child;
        }
    }
    return $result;
},20,2);
