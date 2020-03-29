<?php
function covid_19(){
    $url = 'https://code.junookyo.xyz/api/ncov-moh/data.json';
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    $result = array(
    "0" => array(
        "attachment" => array(
            "type" => "template",
            "payload" => array(
                "template_type" => "generic",
                "elements" => array(
                    "0" => array(
                        "title" => "Toàn Thế Giới",
                        "subtitle" => "\nCa nhiễm : " . $json['data']['global']['cases'] . " \nTử vong : " .  $json['data']['global']['deaths'] . " \nPhục hồi: " .  $json['data']['global']['recovered'],
						"case_global"=>   $json['data']['global']['cases'],
						"death_global" => $json['data']['global']['deaths'],
						"recovered_global" => $json['data']['global']['recovered'],
                    ), // End 
                    "1" => array(
                        "title" => "Việt Nam",
                        "subtitle" => "\nCa nhiễm : " . $json['data']['vietnam']['cases'] . " \nTử vong : " . $json['data']['vietnam']['deaths'] . " \nPhục hồi: " . $json['data']['vietnam']['recovered'] ,
						"case_vietnam"=>   $json['data']['vietnam']['cases'],
						"death_vietnam" => $json['data']['vietnam']['deaths'],
						"recovered_vietnam" => $json['data']['vietnam']['recovered'],
						
						
                    ), // End 
                )
            )
        )
    )
    );
    $fp = fopen('covid19.json', 'w');
    fwrite($fp, json_encode($result, JSON_PRETTY_PRINT));   // here it will print the array pretty
    fclose($fp);
}
$run = covid_19();
echo $run; exit;