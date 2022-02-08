<?php 
namespace App;
class Utils{

    public static function validatePhoneNumber($phone){
        $response = array('country'=> "", 'country_code' => "");
        $countries = Config::getConfigs("countries");
        //get country code from phone
        $arr = explode(")", $phone);
        $country_code = str_replace("(", "", $arr[0]); 
        //get country
        $country = $countries[$country_code][0];  //the first index is the country
        $regex = $countries[$country_code][1]; // the second index is the validation regex
        //get status
        if(preg_match("*".$regex."*", $phone)){ //add * delimeter on the regex for it to work
            $status = "Phone is Valid";
        }else {
            $status = "Not Valid";
        } 
        $response['country_code'] = $country_code;
        $response['country'] = $country;
        $response['status'] =$status;
        return $response;
    }
}
?>