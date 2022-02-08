<?php
namespace App;
class Config{

    public static function getConfigs($name){
    $configs = array(
        "data_url" => "http://localhost:8000/customer",
        "countries" => array(
            "237" => array("Cameroon", "\(237\)\ ?[2368]\d{7,8}$"),
            "251" => array("Ethiopia", "\(251\)\ ?[1-59]\d{8}$"),
            "212" => array("Morocco", "\(212\)\ ?[5-9]\d{8}$"),
            "258" => array("Mozambique", "\(258\)\ ?[28]\d{7,8}$"),
            "256" => array("Uganda", "\(256\)\ ?\d{9}$")
        )
    );
    if(isset($configs[$name])){
        return $configs[$name];
    }else {
        return null;
    }
    }
   
}


?>