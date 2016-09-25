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

    <h2>SWAY CDs / FOR THE ROAD!</h2>
    
    <div class="well" style="background-color: black; color: white;">
        <p>
            <img src="{{asset('/images/sway_demo_cover.jpg', true)}}" style="width:800px;margin-left:-90px;"/>
        </p>
    </div>
    
    <div class="well" style="text-align:right;">
        <p>
            Our long awaited first recordings! CDs £3 each - see Steph, Baz or Joe
        </p>
    </div>
    
    <p></p>
    
    <p align="right">
        <img src="{{asset('/images/Pelirocco.jpg', true)}}" style="height:50px;"/>
    </p>
</div>

<script src="{{asset('js/jquery-3.1.0.min.js', true)}}"></script>

<?php
header('Refresh: ' . $refresh_speed . '; url=' . $app_url . '/promo-2/');
?>

</body>
</html>