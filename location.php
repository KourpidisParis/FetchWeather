<?php

class Location{
    private $name;
    private $region;
    private $country;
    private $localtime;
    private $tempc;
    private $condition;
    private $image;

    function __construct($name, $region,$country,$localtime,$tempc,$condition,$image) {
        $this->name = $name; 
        $this->region = $region;
        $this->country = $country; 
        $this->localtime = $localtime; 
        $this->tempc = $tempc;
        $this->condition=$condition; 
        $this->image = $image;
 
      }

      //Get name
      public function get_name() {
        return $this->name;
      }

      //Get region
      public function get_region() {
        return $this->region;
      }
      
      //Get country
      public function get_country() {
        return $this->country;
      }

      //Get localtime
      public function get_localtime() {
        return $this->localtime;
      }

      //Get tempc
      public function get_tempc() {
        return $this->tempc;
      }

      //Get condition
      public function get_condition(){
        return $this->condition;
      }

      public function get_image(){
        return $this->image;
      }

}









?>