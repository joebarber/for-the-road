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

    $result = file_get_contents($app_url . '/performers.json');
    $schedule = json_decode($result, true);
    //print_r($schedule);

    $count = 0;
    echo "<h1>COMING UP:</h1>";
    
    foreach ($schedule['performers'] as $performer) {
        
        $current_time = (int)str_replace(".","",$current_time);
        $timestart = (int)str_replace(".","",$performer['timestart']);
        $timeend = (int)str_replace(".","",$performer['timeend']);
        
        //TO DO bug fix - this only works after 1pm - fix for 24 hour clock?
        if ($performer['day'] == $today && $timestart >= $current_time) {
         
            if ($count < 3) { //get the next three performers
                if ($count % 2 == 1) {
                ?>
                    <div class="well up<?php echo $count; ?>" style="background-color: black; color: white;">
                <?php
                }
                else {
                ?>
                    <div class="well up<?php echo $count; ?>" style="text-align:right;">
                <?php
                }
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
                ?>
                </div>
                <?php
                
            }
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
<script src="{{asset('js/up-next.js', true)}}"></script>

<?php
header('Refresh: 15; url=' . $app_url . '/promo-1/');
?>

</body>
</html>
