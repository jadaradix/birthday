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
      switch($format) {
        case "html":
          echo $tab . "<table>" . PHP_EOL;
          // Columns
          echo $tab . " <thead>" . PHP_EOL;
          echo $tab . "   <tr>" . PHP_EOL;
          foreach($this->columns as $column) {
            echo $tab . "     <th>" . $column . "</th>" . PHP_EOL;
          }
          echo $tab . "   </tr>" . PHP_EOL;
          echo $tab . " </thead>" . PHP_EOL;
          // Data
          echo $tab . " <tbody>" . PHP_EOL;
          foreach($this->data as $row) {
            $rowValues = array_values($row);
            echo $tab . "   <tr>" . PHP_EOL;
            foreach($rowValues as $value) {
              echo $tab . "     <td>" . $value . "</td>" . PHP_EOL;
            }
            echo $tab . "   </tr>" . PHP_EOL;
          }
          echo $tab . " </tbody>" . PHP_EOL;
          echo $tab . "</table>" . PHP_EOL;
      }
    }

  }

?>