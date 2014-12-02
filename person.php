<?php

  class Person {

    public $name;
    private $dob;

    const DATE_FORMAT = "Y-n-d";
    const DATE_FORMAT_YEAR = "Y";
    const DATE_FORMAT_MONTH = "n";
    const DATE_FORMAT_DAY = "d";

    function __construct($name = null, $dob = null) {
      $this->name = (is_null($name) ? "A Person" : $name);
      $this->dob = (is_null($dob) ? self::makeDate(1991, 3, 1) : $dob);
    }

    static function makeDate($year, $month, $day) {
      $dateString = self::DATE_FORMAT;
      $dateString = str_replace(self::DATE_FORMAT_YEAR, $year, $dateString);
      $dateString = str_replace(self::DATE_FORMAT_MONTH, $month, $dateString);
      $dateString = str_replace(self::DATE_FORMAT_DAY, $day, $dateString);
      return new DateTime($dateString);
    }

    static function formatDate($date) {
      return $date->format(self::DATE_FORMAT);
    }

    // Date of Birth
    public function getDOB() {
      return $this->dob;
    }

    public function setDOB($year, $month, $day) {
      $this->dob = self::makeDate($year, $month, $day);
    }

    private static function dateToComponentArray($date) {
      $dateStringDataArray = explode("-", self::formatDate($date));
      $dateYear = array_shift($dateStringDataArray);
      $dateMonth = array_shift($dateStringDataArray);
      $dateDay = array_shift($dateStringDataArray);
      $r = array(
        'year' => $dateYear,
        'month' => $dateMonth,
        'day' => $dateDay
      );
      return $r;
    }

    // Star Sign
    public function getStarSign() {
      // Method from this Python SO answer: http://stackoverflow.com/questions/3274597/x
      // Get Index
      $dobStringDataArray = self::dateToComponentArray($this->dob);
      $dobMonth = $dobStringDataArray['month'];
      $dobDay = $dobStringDataArray['day'];
      $dobIndex = $dobMonth . $dobDay;
      // Define Zodiacs
      $zodiacs = array(
        120 => 'Capricorn',
        218 => 'Aquarius',
        320 => 'Pisces',
        420 => 'Aries',
        521 => 'Taurus',
        621 => 'Gemini',
        622 => 'Cancer',
        823 => 'Leo',
        923 => 'Virgo',
        1023 => 'Libra',
        1122 => 'Scorpio',
        1222 => 'Sagitarius',
        1231 => 'Capricorn'
      );
      // Find by Index
      foreach($zodiacs as $zodiacIndex => $starSign) {
        if ($dobIndex < $zodiacIndex) return $starSign;
      }
      return $zodiacs[0];
    }

    // Get Age
    public function getAge() {
      $now = new DateTime();
      // Test for AL's birthday:
      // $now = self::makeDate(2014, 6, 4);
      return $now->diff($this->dob)->format("%" . Person::DATE_FORMAT_YEAR);
    }

  }

?>