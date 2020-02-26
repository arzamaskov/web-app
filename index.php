
<?php
    require_once 'vendor/autoload.php';
    use InstagramScraper\Instagram;
    
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
    $twig = new \Twig\Environment($loader);

    $instagram = new Instagram();
    $account = $instagram->getAccount('arzamaskov');

    // echo $twig->render('index.html', ['name' => 'Andrey']);


    
    // $nonPrivateAccountMedias = $instagram->getMedias('arzamaskov');
    
    // echo $twig->render('index.html', ['insta' => $nonPrivateAccountMedias[0]->getLink()]);

    

    // Available fields
    // echo "Account info:\n";
    // echo "Id: {$account->getId()}\n";
    // echo "Username: {$account->getUsername()}\n";
    // echo "Full name: {$account->getFullName()}\n";
    // echo "Biography: {$account->getBiography()}\n";
    // echo "Profile picture url: {$account->getProfilePicUrl()}\n";
    // echo "External link: {$account->getExternalUrl()}\n";
    // echo "Number of published posts: {$account->getMediaCount()}\n";
    // echo "Number of followers: {$account->getFollowsCount()}\n";
    // echo "Number of follows: {$account->getFollowedByCount()}\n";
    // echo "Is private: {$account->isPrivate()}\n";
    // echo "Is verified: {$account->isVerified()}\n";

    $instaData = array(
        'id' => $account->getId(),
        'username' => $account->getUsername(),
        'full_name' => $account->getFullName(),
        'profile_pic' => $account->getProfilePicUrl(),
        'followers' => $account->getFollowsCount(),
        'follows' => $account->getFollowedByCount()
    );

    echo $twig->render('index.html', $instaData);