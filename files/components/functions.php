<?php

    function image($src, $class) {
        global $path;
        echo '<img class="'.$class.'" src="'.$path.'files/images/'.$src.'">';
    }

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
        echo '<script src="'.$path.'files/js/'.$src.'"></script>';
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

    function get_block_title($id = null, $block_name = null) {
        global $page;

        $json = json_decode(file_get_contents(get_site_content()), true);

        if ($id != null) {
            foreach ($json[$page['name']] as $key => $value) {
                if ($value['id'] == $id) {
                    return $value['block_title'];
                }
            }
        }
        if ($block_name != null) {
            foreach ($json[$page['name']] as $key => $value) {
                if ($value['block_name'] == $block_name) {
                    return $value['block_title'];
                }
            }
        }
    }

    function get_block($id = null, $block_name = null) {
        global $page;

        $json = json_decode(file_get_contents(get_site_content()), true);

        if ($id != null) {
            foreach ($json[$page['name']] as $key => $value) {
                if ($value['id'] == $id) {
                    if (isset($value['content']['buttons'])) {
                        $i = 0;
                        foreach ($value['content']['buttons'] as $button) {
                            $value['content']['buttons'][$i]['link'] = replace_variables($button['link']);
                            $i++;
                        }
                    }
                    return replace_nline($value['content']); //replace_variables(replace_nline($value['content']));
                }
            }
        }
        if ($block_name != null) {
            foreach ($json[$page['name']] as $key => $value) {
                if ($value['block_name'] == $block_name) {
                    if (isset($value['content']['buttons'])) {
                        $i = 0;
                        foreach ($value['content']['buttons'] as $button) {
                            $value['content']['buttons'][$i]['link'] = replace_variables($button['link']);
                            $i++;
                        }
                    }
                    return replace_nline($value['content']); //replace_variables(replace_nline($value['content']));
                }
            }
        }
    }

    function replace_variables($content) {
        global $variable;
        foreach ($variable as $key => $value) {
            if (str_contains($content, "[%$key]")) { $content = str_replace("[%$key]",$value, $content); }
        }
        return $content;
    }

    function replace_nline($content) {
        foreach ($content as $key => $value) {
            if ($key != "buttons") { $content[$key] = str_replace('\n','<br>', $value); }
        }
        return $content;
    }













    function set_page_meta($custom = null) {
        global $site;
        if ($custom) {
            echo "<meta name='description' content='$custom'>";
        } else {
            echo "<meta name='description' content='".$site["description"]."'>";
        }
    }

    function set_social_meta() {
        global $site;
        echo '
            <meta property="og:title" content="FR Jostens Portfolio">
            <meta property="og:description" content="'.$site["description"].'">
            <meta property="og:image" content="https://frjosten.nl/files/images/over-mij.jpg">
            <meta property="og:url" content="https://frjosten.nl/">

            <meta name="twitter:title" content="Add title here">
            <meta name="twitter:description" content="'.$site["description"].'">
            <meta name="twitter:image" content="https://frjosten.nl/files/images/over-mij.jpg">
            <meta name="twitter:url" content="https://frjosten.nl/">

        ';
    }


    function get_page_title($sep = null, $part1 = null, $part2 = null) {
        global $page;
        global $site;

        if ($sep == null) {
            $sep = "|";
        }

        $page_name = ucfirst($page['name']);
        $site_name = $site['name'];

        if (str_contains($page_name, '-')) { $page_name = str_replace('-',' ', $page_name); }

        
        $title = '<title>';
        if ($part1) { $title .= $part1 . ' '. $sep .' '; }
        else { $title .= $page_name . ' '. $sep .' '; }

        if ($part2) { $title .= $part2 . '</title>'; }
        else { $title .= $site_name . '</title>'; }

        return $title;

    }


    function get_site_content() {
        global $path;

        $lang = strtolower($_COOKIE['site_lang']);

        return $path.'files/lang/'.$lang.'.json';
    }




    initSiteLang();
    function initSiteLang() {
        if(isset($_COOKIE['site_lang'])) {
            return;
        }

        $location = strtolower(get_user_location());

        if ($location == 'nl') {
            setcookie('site_lang', 'nl', time() + (86400 * 30), "/"); // 86400 = 1 day * 30 (1 month)
        } else {
            setcookie('site_lang', 'en', time() + (86400 * 30), "/"); // 86400 = 1 day * 30 (1 month)
        }

        header("Refresh:0");
    }


    function get_user_location() {
        /* return 'nl'; */

        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }

        if ($ipaddress == "127.0.0.1") {
            return "nl";
        }

        $json = json_decode(file_get_contents("http://ipinfo.io/$ipaddress/json"), true);
        return $json['country'];
    }






    function da_number_format($input, $decimals){
        return number_format($input, $decimals, '.', ',');
    }


?>