<?php
defined('_JEXEC') or die;
 
//Carga de ficheros .CSS y JS
$doc = JFactory::getDocument();
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/mod_amadeus.js', 'text/javascript');
$doc->addStyleSheet(JURI::base(true).'/modules/mod_amadeus/css/mod_amadeus.css');
 
?>
 
<div class="tilesgroup<?php echo '' ?>">
    <div class="slider1">
    <?php
    foreach($list as $item){
        echo '<div class="slide">'.
               '<h2><a href="'.$item->link.'">'.$item->title.'</a></h2>'.
               '<a href="'.$item->link.'"><img src="'.$item->imagen.'" /></a>'.
             '</div>';
    }
    ?>
    </div>
</div>