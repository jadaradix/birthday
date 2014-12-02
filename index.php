<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/fonts.css">
    <title>Birthday</title>
  </head>
  <body>

    <div class="display-box">

      <h1>People with whom I am romantically compatible</h1>

<?php

  include "person.php";
  include "table.php";

  // Define People (array of Person classes)
  $people = array(
    // new Person("James", Person::makeDate(1993, 11, 12)),
    new Person("AL", Person::makeDate(1991, 6, 4)),
    new Person("VW", Person::makeDate(1992, 5, 23)),
    new Person("CM", Person::makeDate(1991, 3, 28)),
    new Person("MW", Person::makeDate(1991, 4, 13)),
    new Person("FS", Person::makeDate(1993, 6, 7)),
    new Person("LA", Person::makeDate(1995, 8, 20))
  );

  // Table class needs a key based array, so make one
  // A functional paradigm would be nice, PHP...
  $peopleData = array();
  foreach($people as $person) {
    // Array push-esque
    $peopleData[$person->name] = array(
      "Person" => $person->name,
      "Star Sign" => $person->getStarSign(),
      "Age" => $person->getAge()
    );
  }

  // Debug
  // var_dump($peopleData);

  // Make a Table class with the key based array
  $peopleTable = new Table($peopleData);

  // The Table class generates markup, so show it
  echo $peopleTable->output("html", "     ");

?>

    </div>

  </body>
</html>