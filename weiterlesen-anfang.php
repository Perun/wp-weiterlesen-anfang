<?php
/*
Plugin Name: Weiterlesen auf den Anfang
Plugin URI: http://www.perun.net/2012/10/13/wordpress-weiterlesen-link-auf-den-anfang-des-blogartikels/
Description: Entfernt den Anker (<code>#more-xyz</code>) aus dem Weiterlesen-Link. Somit verweist der Weiterlesen-Link auf den Anfang des jeweiligen Artikels.
Version: 0.1
Author: Vladimir Simovic
Author URI: http://www.perun.net
*/
function entferne_weiterlesen_anker($verweis) {
    $entfernen = strpos($verweis, '#more-');
    if ($entfernen) {
        $ergebnis = strpos($verweis, '"', $entfernen);
    }
    if ($ergebnis) {
        $verweis = substr_replace($verweis, '', $entfernen, $ergebnis-$entfernen);
    }
    return $verweis;
}
add_filter('the_content_more_link', 'entferne_weiterlesen_anker');
?>
