<?php

    function image($src, $class) {
        global $path;
        echo '<img class="'.$class.'" src="'.$path.'files/images/'.$src.'">';
    }

    /* function icon($src, $class) {
        global $path;
        echo '<img class="'.$class.'" src="'.$path.'files/icons/'.$src.'">';
    }

    function ext_icon($src, $class) {
        echo '<img class="'.$class.'" src="'.$src.'">';
    } */

    function logo($src, $class) {
        global $path;
        echo '<img class="'.$class.'" src="'.$path.'files/logos/'.$src.'">';
    }

    function button($target, $text, $class, $outsideLink) {
        if ($outsideLink == false) {
            global $path;
            echo '<a href="'.$path.$target.'" class="'.$class.'">'.$text.'</a>';
        } else {
            echo '<a href="'.$target.'" target="_blank" class="'.$class.'"><h3>'.$text.'</h3></a>';
        }
    }

    function script($src) {
        global $path;
        echo '<script src="'.$path.'files/scripts/'.$src.'"></script>';
    }

    function map($url) {
        echo '<iframe width="100%" height="100%" frameborder="0" src="'.$url.'"></iframe>';
    }

    function getByID($array, $id) {
        $return = "unknown";
        foreach($array AS $index => $element) {
            if($element['id'] == $id) {
                return $element;
            }
        }
        return $return;
    }


?>