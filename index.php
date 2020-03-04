
<?php
    require_once 'display_errors.php';
    require_once 'vendor/autoload.php';
    use InstagramScraper\Instagram;

    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
    $twig = new \Twig\Environment($loader);

    $instagram = new Instagram();

    $urls = array();

    if($_GET['tag'] == '') {
        $tag = '';
    }
    else {
       $tag = $_GET['tag'];
       $medias = $instagram->getMediasByTag($tag, 20);
       $media = $medias[0];

       foreach ($medias as $media) {
           $urls[] = $media->getImageHighResolutionUrl();
       }

    }



    echo $twig->render('index.html', ['urls' => $urls]);
    //var_dump($urls);``
