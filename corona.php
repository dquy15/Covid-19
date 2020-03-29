<?php
function covid_19(){
    $url = 'https://code.junookyo.xyz/api/ncov-moh/data.json';
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    $result = array(
         "messages" => array(
                    "0" => array(
 			 "text" => "\n🌐Thế Giới :" . "\n💉Ca nhiễm : " . $json['data']['global']['cases'] . " \n☠️Tử vong : " .  $json['data']['global']['deaths'] . " \n💊Phục hồi: " .  $json['data']['global']['recovered'],

 
                    ), // End 
                    "1" => array(
      					"text" => "\n🇻🇳Việt Nam"  . "\n💉Ca nhiễm : " . $json['data']['vietnam']['cases'] . " \n☠️Tử vong : " . $json['data']['vietnam']['deaths'] . " \n💊Phục hồi: " . $json['data']['vietnam']['recovered'] ,
                   ), // End 
      )
    );
    $fp = fopen('covid.json', 'w');
    fwrite($fp, json_encode($result, JSON_PRETTY_PRINT));   // here it will print the array pretty
    fclose($fp);
}
$run = covid_19();
echo $run; exit;