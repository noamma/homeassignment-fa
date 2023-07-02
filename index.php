<?php
//$profile = property_exists($_GET,'profile')?$_GET['profile']:null;
if(array_key_exists('profile',$_GET)){
    $profile = $_GET['profile'];
    if ($profile === "profile-1" || $profile === "profile-2") {
$curlSession = curl_init();
curl_setopt($curlSession, CURLOPT_URL, 'https://json.flashy.dev/'.$profile);
//curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
$profileData = json_decode(curl_exec($curlSession));
curl_close($curlSession);
$background = explode(",", $profileData->background[0]);
$favorite = property_exists($profileData,"favorite")?$profileData->favorite:"Not Available";
$favorite_aw = property_exists($profileData,"favoriteaw")?$profileData->favoriteaw:"Not Available";
$superpower = property_exists($profileData,"superpower")?$profileData->superpower:"Not Available";
$workin_since = property_exists($profileData,"working_since")?date( "F Y",$profileData->working_since):"Not Available";
$website = property_exists($profileData,"website")?$profileData->website:"Not Available";
$linkedin = property_exists($profileData,"linkedin")?$profileData->linkedin:"Not Available";
$instagram = property_exists($profileData,"instagram")?$profileData->instagram:"Not Available";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to <?php echo $profileData->fullname?> Profile Page</title>
</head>
<body>
<div class="contactCard">
    <div class="headline">
        <img src="<?php echo $profileData->profile?>"/>
    </div>
    <h1><?php echo $profileData->fullname?></h1>
    <div class="contactCard-main">
        <div class="col1">
        <div class="col1-row1">
            <img class="col1-row1-logo" src="/img/Team%20Logo.png"/>
            <div class="col1-row1-data">
                <h4 class="team-h4">Team</h4>
                <p><?php echo $profileData->team?></p>
            </div>
        </div>
        <div class="col1-row2">
            <h4>Role in the team</h4>
            <p><?php echo $profileData->role?></p>
        </div>
        <div class="col1-row3">
            <h4>Department or company</h4>
            <p><?php echo $profileData->department?></p>
        </div>
        <div class="col1-row4">
            <h4>Location</h4>
            <p><?php echo $profileData->location?></p>
        </div>
    </div>
        <div class="col2">
            <div class="col2-row1">
                <h4>[team] member since</h4>
                <p><?php echo date( "F Y",$profileData->member_since);?></p>
            </div>
            <div class="col2-row2">
                <h4>Working in [company] since</h4>
                <p><?php echo $workin_since?></p>
            </div>
            <div class="col2-row3">
                <h4>Favorite [thing]</h4>
                <p><?php echo $favorite?></p>
            </div>
        </div>
        <div class="col3">
            <div class="col3-row1">
                <h4>My superpower</h4>
                <p><?php echo $superpower?></p>
            </div>
            <div class="col3-row2">
                <h4>I want to be good at</h4>
                <p><?php echo $profileData->good_at?></p>
            </div>
            <div class="col3-row3">
                <h4>Favorite thing to do at work</h4>
                <p><?php echo $favorite_aw?></p>
            </div>
        </div>
        <div class="col4">
                <h4>Background / experience</h4>
                <?php foreach ($background as $item) {
                    echo "<p>".$item ."</p>";
                }?>
        </div>
    </div>
    <div class="contactCard-buttom">
        <div class="links">
            <div class="website"><img src="img/WebsiteLogo.png"/><p><?php echo $website?></p></div>
            <div class="linkedIn"><img src="img/LinkedInLogo.png"/><p><?php echo $linkedin?></p></div>
            <div class="instagram"><img src="img/InstagramLogo.png"/><p><?php echo $instagram?></p></div>
        </div>
    </div>
</div>
</body>
</html>
<?php } else{?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Profiles Page</title>
</head>
<body>
<h1>Oops Unknown profile <?php echo $profile?></h1>
<p>Please select <a href="/?profile=profile-1">profile-1</a> or <a href="/?profile=profile-2">profile-2</a></p>
</body>
</html>
    <?php } } else{?>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Profiles Page</title>
</head>
<body>
<h1>Oops no profile selected</h1>
<p>Please select <a href="/?profile=profile-1">profile-1</a> or <a href="/?profile=profile-2">profile-2</a></p>
</body>
    </html>
<?php }?>
