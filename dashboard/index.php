<?php

session_start();

if (!isset($_SESSION['user_data'])) // if user not logged in
{
        header("Location: ../");
        exit();
}

if(isset($_POST['logout']))
{
	session_destroy();
	header("Location: ../");
    exit();
}

if ($_SESSION["normalogin"] == "ok")
{
    //RETURNS FROM NORMAL API IF USER DOESN'T HAVE HWID LOCK
    $username = $_SESSION["user_data"]["username"];
    $subscription = $_SESSION["user_data"]["subscriptions"][0]->subscription;
    $expiry = $_SESSION["user_data"]["subscriptions"][0]->expiry;
    $ip = $_SESSION["user_data"]["ip"];
    $hwid = $_SESSION["user_data"]["hwid"];
    $createdate = $_SESSION["user_data"]["createdate"];
    $lastLogin = $_SESSION["user_data"]["lastlogin"];
    //           --------  END  --------, THIS SCRIPT WILL CONTINUE NOW

} else {
    //echo "SellerKey Login <br><br>";
    $sellerkey = ""; //CHANGE THIS <---
    $tempuser = $_SESSION["tempuser"];
    //echo $tempuser; // shows ^^
    $url = "https://keyauth.win/api/seller/?sellerkey=" . $sellerkey . "&type=userdata&user=" . $tempuser;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $responsedata = curl_exec($curl);
    $response = $responsedata;
    $json = json_decode($response);

    if ($json->success)
    {
        // IF REQUEST SUCCESS IT WILL CONTINUE PHP FILE
    } else {
        //This will show SellerAPI Failed request as modern.
        ?>
        <html>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/util.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <body>

        <div id="container" class="flex flex-col items-center justify-center">
        <div class="flex flex-col items-center justify-center pt-40 text-center">
        <span class="text-2xl md:text-2xl font-semibold text-white">API Message: <?php echo $json->message; ?></span>
        <span class="text-2xl md:text-2xl font-semibold text-white">Please contact site owner.</span>
        
        <pre>

        <form method="post"><button name="logout" class="px-8 py-3 whitespace-no-wrap bg-red text-white rounded-lg font-semibold xd hover:bg-cc">Sign Out</button></form>
        </pre>

        <pre><div class="centeredtext"><span class="text-lg text-gray-400 font-semibold">Copyright © <script type="text/javascript">document.write(new Date().getFullYear())</script> <?php echo "$_SERVER[HTTP_HOST]";?></span></div></pre>
        </div>
        </div>
        </html>
        </body>
        <?php
        exit();
    }

    //ALL THINGS FROM SELLERAPI REQUEST THAT YOU CAN USE :)
    $username = $json->username;
    $subscription = $json->subscriptions[0]->subscription;
    $timeleft = $json->subscriptions[0]->timeleft;
    $expiry = $json->subscriptions[0]->expiry;
    $ip = $json->ip;
    $hwid = $json->hwid;
    $createdate = $json->createdate;
    $lastLogin = $json->lastlogin;
    //--------  END  --------
}

$numuusers = $_SESSION["fullsession"]->appinfo->numUsers;
$numOnlineUsers = $_SESSION["fullsession"]->appinfo->numOnlineUsers;
$numKeys = $_SESSION["fullsession"]->appinfo->numKeys;
$appVersion = $_SESSION["fullsession"]->appinfo->version;
$customerPanelLink = $_SESSION["fullsession"]->appinfo->customerPanelLink;

?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="25x25" href="https://cdn.discordapp.com/icons/824397012685291520/c2bd444560b2aa72d33c01925934c5e4.png?size=4096">

<html>
<title>KeyAuth PHP Example</title>
<meta name="theme-color" content="#5271ef">
<meta name="description" content="KeyAuth PHP Example Created by mazk#9154">
<meta name="og:image" content="https://cdn.discordapp.com/icons/824397012685291520/c2bd444560b2aa72d33c01925934c5e4.png?size=4096">

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/util.css">
<link rel="stylesheet" href="../css/normalize.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.keyauth.com/dashboard/unixtolocal.js"></script>
<body>
<nav id="navigationBar" class="flex flex-row items-center justify-between p-6 bg-sweetBlack">
<div class="left flex flex-row items-center ml-10 md:ml-20 text-white">
<img src="https://cdn.discordapp.com/icons/824397012685291520/c2bd444560b2aa72d33c01925934c5e4.png" width="48px" height="48px" class="mr-2 hidden md:inline pointer-events-none noselect">
</div>
<div class="right mr-10 md:mr-185">

<form method="post"><button name="logout" class="px-8 py-3 whitespace-no-wrap bg-red text-white rounded-lg font-semibold xd hover:bg-cc">Sign Out</button></form>
</div>
</nav>

<div id="container" class="flex flex-col items-center justify-center">
<div class="flex flex-col items-center justify-center pt-40 text-center">
<span class="text-2xl md:text-2xl font-semibold text-white">Hey <?php echo $username; ?>,</span>
<span class="text-2xl md:text-2xl font-semibold text-white">Welcome to PHP Example Dashboard!</span>
<div class="container-login100-form-btn m-t-17">
</div>
<pre>

<span class="text-gray-400 text-lg md:text-xl font-bold">User Information</span>

<span class="text-gray-400 text-lg font-bold">Subscription: <?php echo $subscription; ?></span>
<span class="text-gray-400 text-lg font-bold">Expiry: <script>document.write(convertTimestamp(<?php echo $expiry; ?>));</script></span>
<span class="text-gray-400 text-lg font-bold">Timeleft: <script>document.write(convertTimestamp(<?php echo $timeleft; ?>));</script></span>
<span class="text-gray-400 text-lg font-bold">Created Date: <script>document.write(convertTimestamp(<?php echo $createdate; ?>));</script></span>


<span class="text-gray-400 text-lg md:text-xl font-bold">Application Information</span>

<span class="text-gray-400 text-lg font-bold">Online Users: <?php echo $numOnlineUsers; ?></span>
<span class="text-gray-400 text-lg font-bold">Keys: <?php echo $numKeys; ?></span>
<span class="text-gray-400 text-lg font-bold">Version: <?php echo $appVersion; ?></span>
<span class="text-gray-400 text-lg font-bold">KeyAuth CustomerPanel: <?php echo $customerPanelLink; ?></span>
</pre>
</div>
</div>


<pre>











<div class="centeredtext">
  <span class="centeredtext text-lg text-gray-400 font-semibold">Copyright © <script type="text/javascript">document.write(new Date().getFullYear())</script> <?php echo "$_SERVER[HTTP_HOST]";?></span>
</div>
</pre>
</body>
</html>
