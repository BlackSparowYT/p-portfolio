
<div class="breadcrumbs">
    
    <?php
        $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
        for($i = 0; $i < count($crumbs) -1; $i++){
            if ($i > 1 ) { echo '<p>></p>'; }
            if ($crumbs[$i] == "gokyo-cuijk") { echo '<a href="https://'.$site['url'].'">';icon('breadcrumbs-dark.svg', 'breadcrumbs__icon js-breadcrumbs'); echo '</a>'; } 
            else {
                echo '<p>'.ucfirst( str_replace( array(".php","_"), array(""," "), $crumbs[$i]) . '</p>');
            }
        }
    ?>
                    
</div>