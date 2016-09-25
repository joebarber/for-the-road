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
?>
<div class='container'>
    
    <h2>FOR THE ROAD - 8th / 9th October</h2>
    
    <?php
    //lets calculate the current time in the format listed in performers.json
    date_default_timezone_set('Europe/London'); //currently one hour ahead - how to fix this?date_default_timezone_set('Europe/London');
    $today = date('l'); //eg. 'Saturday'
    $current_time = date('g.i'); //eg. '10.30'

    //echo "current time:" . $current_time;
    ?>
    
    <h2>NOW PLAYING:</h2>

    <div class="well" style="background-color: black; color: white;">
    
    <?php
    $result = file_get_contents($app_url . '/performers.json');
    $schedule = json_decode($result, true);
    //print_r($schedule);
    
    $now_playing = false;
    
    foreach ($schedule['performers'] as $performer) {
        
        $current_time = (int)str_replace(".","",$current_time);
        $timestart = (int)str_replace(".","",$performer['timestart']);
        $timeend = (int)str_replace(".","",$performer['timeend']);
        
        //TO DO bug fix - this only works after 1pm - fix for 24 hour clock?
        if ($performer['day'] == $today && $timestart <= $current_time && $timeend >= $current_time) {
            
            echo "<h1>".$performer['name']."</h1>";
            
            echo "<p>".$performer['timestart']." - ".$performer['timeend']."</p>";
            
            //Display performer images - check local first
            if (isset($performer['image'])) {
            ?>
                <img src="<?php echo $app_url; ?>/images/<?php echo $performer['image']; ?>" style="max-height:200px;"/>
            <?php
            }
            //if not, grab the profile pic of their facebook ID/page
            else if ($performer['facebookuserid'] !== "") {
                $user_picture = getUserPictureDetails($performer['facebookuserid']);
                echo "<img src='".$user_picture."'/>";
            }
            
            $now_playing = true;
             
            break;
        }
    }
 
    if(!$now_playing) {
        //No-one playing at the moment:
        echo "<p>Elvis has left the building. Grab yourself a beer, we'll have some more tunes up soon!</p>";
    }
 
    ?>
    </div>
    
    
    
    <p></p>
    <p align="right">
        <img src="{{asset('/images/Pelirocco.jpg', true)}}" style="height:50px;"/>
    </p>
    
</div>

<?php

header('Refresh: ' . $refresh_speed . '; url=' . $app_url . '/up-next/');

?>

</body>
</html>
