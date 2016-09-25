
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
    
    <div class="well" style="background-color: black; color: white;">
        <h2>SATURDAY</h2>
        <p>
            <?php
    
            $result = file_get_contents($app_url . '/performers.json');
            $schedule = json_decode($result, true);
            //print_r($schedule);
            
            foreach ($schedule['performers'] as $performer) {
                if($performer['day'] == "Saturday") {
                    echo $performer['name'] . " / ";
                }
            }
            
            ?>
        </p>
        <!--<p align="right">
            <img src="{{asset('/images/the-sway.png', true)}}" style="height:100px;"/>
            <img src="{{asset('/images/the-sway-live.jpg', true)}}" style="height:100px;"/>
        </p>-->
    </div>
    
    
    <div class="well" style="text-align:right;">
        <h2>SUNDAY</h2>
        <p>
            <?php
    
            $result = file_get_contents($app_url . '/performers.json');
            $schedule = json_decode($result, true);
            //print_r($schedule);
            
            foreach ($schedule['performers'] as $performer) {
                if($performer['day'] == "Sunday") {
                    echo $performer['name'] . " / ";
                }
            }
            
            ?>
        </p>
    </div>
    
    <div class="well" style="background-color: black; color: white;">
        <p>
            FREE ENTRY / ALL DAY FOOD / CHARITY COLLECTION FOR RISE
            <br/>
            SWAY CD LAUNCH  / LATE NIGHT 2 AM BAR ON SATURDAY
        </p>
    </div>
    
    <p></p>
    <p align="right">
        <img src="{{asset('/images/Pelirocco.jpg', true)}}" style="height:50px;"/>
    </p>
    
</div>

<?php
header('Refresh: ' . $refresh_speed . '; url=' . $app_url . '/now-playing/');
?>

</body>
</html>
