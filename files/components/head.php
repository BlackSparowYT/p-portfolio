<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        if (!$page['custom_title']['flag'] || !isset($page['custom_title']['flag'])) { echo get_page_title(); }
        else { echo get_page_title($page['custom_title']['seperator'], $page['custom_title']['part1'], $page['custom_title']['part2']); }
        // Note that part1, part2 and the seperator are required to be set
    ?>

    <?php echo '<link rel="stylesheet" href="' . $path . 'files/styles/core.css">' ?>
    <?php echo '<link rel="icon" type="image/x-icon" href="' . $path . 'files/logos/favicon.png">' ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YBKBS0EKY7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YBKBS0EKY7');
    </script>

</head>