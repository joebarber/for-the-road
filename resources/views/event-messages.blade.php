<?php
//@include('includes.header')
?>

<html>
<head>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css', true)}}">
    <link rel="stylesheet" href="{{asset('/css/styles.css', true)}}">
</head>
<body>
<?php
//include our common functions within /app
include(app_path() . '/Functions/lib.php');

$event_feed = getEventFeed($event_id, $accessToken);
?>
<div class='container'>
    
    <h2>FOR THE ROAD - 8th / 9th October</h2>
    
    <?php
    $count = 0;
    
    //just show the first 5 most recent results from the event feed
    foreach ($event_feed['data'] as $post_details) {
        //print_r($post_details);
        if (isset($post_details['message']) && $count < 5) {
            if ($count % 2 == 0) {
            ?>
                <div class="well feed<?php echo $count; ?>" style="background-color: black; color: white;">
            <?php
            }
            else {
            ?>
                <div class="well feed<?php echo $count; ?>" style="text-align:right;">
            <?php
            }
            
            //now also get further details of the post, eg. associated photos etc
            $post_further_details = getPostDetails($post_details['id']);
            //print_r($post_further_details);
            $user_picture = getUserPictureDetails($post_further_details['from']['id']);

            //display photos uploaded by a user's post if available
            if (isset($post_further_details['picture'])) {
                
                $post_image = getUserPictureDetails($post_further_details['object_id']);
                //print_r($user_picture);
                echo "<p><img src='".$post_image."'/></p>";             
                
            }
            
            echo "<h1>" . $post_details['message'] . "</h1>";
            
            echo "<p align='right'>Posted by: " . $post_further_details['from']['name'];
            echo "<br/><img src='".$user_picture."'/>";
            echo "</p>";
            ?>
            </div>
            <?php
        $count++;
        }
    }
    ?>
    
    <p></p>
    <p align="right">
        <img src="{{asset('/images/Pelirocco.jpg', true)}}" style="height:50px;"/>
    </p>
    
</div>

<script src="{{asset('js/jquery-3.1.0.min.js', true)}}"></script>
<script src="{{asset('js/event-messages.js', true)}}"></script>

<?php
header('Refresh: 25; url=' . $app_url . '/');
?>

</body>
</html>
