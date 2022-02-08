<?php
//include_once "../Utils.php";

class UtilsTest extends \PHPUnit\Framework\TestCase {
     const country_code = 212;
       const country = "Morocco";
       const status = "Phone is Valid";
       const phone = "(212) 698054317";

    public function testPhoneNumberValidation()
   {
    $utils = new App\Utils();    
    $result = $utils->validatePhoneNumber(self::phone);

    $this->assertEquals(self::country_code, $result['country_code']);
    $this->assertEquals(self::country, $result['country']);
    $this->assertEquals(self::status, $result['status']);
   }
}
