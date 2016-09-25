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
        <h2>SHOW US YOUR PHOTOS!</h2>
        
        <p>
            Snapped a great picture of you, your friends or one of our awesome performers at today's event? 
        </p>
        <p>
            <img src="{{asset('/images/zz_the_sway_at_pelirocco.jpg', true)}}" style="height:250px;"/>
        </p>
        
    </div>
    
    <div class="well" style="text-align:right;">
        <p>
            This screen is linked to our 'For The Road' Facebook event page. Find us, upload your best shots 
            and share them with us on our big screen!
        </p>
    </div>
    
    <p></p>
    
    <p align="right">
        <img src="{{asset('/images/Pelirocco.jpg', true)}}" style="height:50px;"/>
    </p>
</div>

<script src="{{asset('js/jquery-3.1.0.min.js', true)}}"></script>

<?php
header('Refresh: ' . $refresh_speed . '; url=' . $app_url . '/event-messages/');
?>

</body>
</html>