<?php
    require_once 'display_errors.php';
    require_once 'vendor/autoload.php';
    use InstagramScraper\Instagram;

    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
    $twig = new \Twig\Environment($loader);
    $instagram = new Instagram();

    $urls = array();

    if(isset($_GET['tag'])) {
        $tag = $_GET['tag'];
        if (trim($tag) == '') {
            $error_warning = true;
        }
        else {
            $medias = $instagram->getMediasByTag($tag, 20);
            $media = $medias[0];
            $error_warning = false;

            foreach ($medias as $media) {
                $urls[] = $media->getImageHighResolutionUrl();
            }
        }
        
    }
    else {
        $tag = '';
    }

    echo $twig->render('index.html', ['tag' => $tag, 'urls' => $urls, 'warning' => $error_warning]);