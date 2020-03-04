
<?php
    require_once 'display_errors.php';
    require_once 'vendor/autoload.php';
    use InstagramScraper\Instagram;
    
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
    $twig = new \Twig\Environment($loader);

    $instagram = new Instagram();

    $url_list = array();

    if ($_GET['tag']) {
        $tag = $_GET['tag'];
    }
    else {
        $tag = '';
    }

    if ($tag == '') {
        $error = 'Request cannot be emply. Try again.';
    }
    else {
        $medias = $instagram->getMediasByTag($tag, 20);
        foreach ($medias as $media) {
            $url_list[]=$media->getImageHighResolutionUrl();
        }
    }

    echo $twig->render('index.html', ['urls' => $url_list], 'tag => $tag');
