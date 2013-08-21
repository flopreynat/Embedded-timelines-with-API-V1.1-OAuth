<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
    </head>
    <body>
        <?php require_once("twitteroauth/twitteroauth.php");
    $consumer_key = 'xxxxxxxxxxxxxxxxxxxxxx';                               // Put your consumer key here
    $consumer_secret = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';         // Put your consumer secret here
    $access_token = 'xxxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';   // Put your access token here
    $access_token_secret = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';   // Put your access token secret here
    $nb_of_tweets = 5;                                                      // Nb of tweets to be displayed
    $include_rts = false;                                                   // true to include RT's or false to exclude them
                 
    $connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
                 
    $tweets = $connection->get('statuses/user_timeline', array('count' => $nb_of_tweets, 'include_rts' => $include_rts)); 
            ?>
        <ul>
            <?php  foreach ($tweets as $key => $tweet): ?>
                <li><?php 

                    //links
            $tweet = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a target='_blank' href=\"\\0\">\\0</a>",  $tweet->text); 
            //#
            $tweet = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a target="_blank" href="https://twitter.com/search?q=%23\2&src=hash">#\2</a>', $tweet);
            //@
            $tweet = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a target="_blank" href="http://twitter.com/$1" target="_blank">@$1</a>', $tweet );
                    
                    echo $tweet;

                ?></li>
            <?php endforeach ?>
        </ul>
    </body>
</html>