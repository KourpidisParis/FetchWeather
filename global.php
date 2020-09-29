
<?php
class LiveLocations
{
  private static $Locations;

  public static function addLocation($location){
    array_push(self::$locations,$location );
    }

  public static function getAllLocations(){
    return self::$locations;
  }

}

?>

