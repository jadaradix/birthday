<?php

  class Table {

    public $data;
    private $columns;

    function __construct($data = null) {
      if (is_null($data)) return;
      $this->data = $data;
      $this->populateColumns();
    }

    private function getColumnsFromData($data) {
      return array_keys($data[array_keys($data)[0]]);
    }

    private function populateColumns() {
      $this->columns = $this->getColumnsFromData($this->data);
    }

    public function output($format = "html", $tab = "") {
      $r = "";
      switch($format) {
        case "html":
          $r = "";
          $r .= $tab . "<table>" . PHP_EOL;
          // Columns
          $r .= $tab . " <thead>" . PHP_EOL;
          $r .= $tab . "   <tr>" . PHP_EOL;
          foreach($this->columns as $column) {
            $r .= $tab . "     <th>" . $column . "</th>" . PHP_EOL;
          }
          $r .= $tab . "   </tr>" . PHP_EOL;
          $r .= $tab . " </thead>" . PHP_EOL;
          // Data
          $r .= $tab . " <tbody>" . PHP_EOL;
          foreach($this->data as $row) {
            $rowValues = array_values($row);
            $r .= $tab . "   <tr>" . PHP_EOL;
            foreach($rowValues as $value) {
              $r .= $tab . "     <td>" . $value . "</td>" . PHP_EOL;
            }
            $r .= $tab . "   </tr>" . PHP_EOL;
          }
          $r .= $tab . " </tbody>" . PHP_EOL;
          $r .= $tab . "</table>" . PHP_EOL;
          break;
      }
      return $r;
    }

  }

?>