<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLIXY AI</title>
    <?php wp_head(); // for injecting css
    ?>
</head>

<body>
    <header>
        <div class="container">
            <?php wp_nav_menu(
                array(
                    'theme-location' => 'top-bar',
                    'menu_class' => 'top-bar'
                )
                /*   array(
                    'menu' => 'Top Menu',
                    'menu_class' => 'top-bar'
                )*/
            ); ?>
        </div>
    </header>