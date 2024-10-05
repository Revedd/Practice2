<?php

require_once "vendor/autoload.php";
$faker = Faker\Factory::create();


$Pdo = new PDO("mysql:host=localhost;dbname=user;charset=utf8mb4", "root", "");
echo "Inserting 100,000 rows per 50 second \n";
$Inserts = 10000;
for ($i = 0; $i < 100000000; $i += $Inserts) {
    $Values = [];
    $Query = "INSERT INTO usertable (Id, Fname, Lname, FatherName, PhoneNumber, Description) VALUES ";

    for ($j = 0; $j < $Inserts; $j++) {
        $id = $faker->uuid();
        $FirstName = $faker->firstName;
        $LastName = $faker->lastName;
        $FatherName = $faker->firstNameMale;
        $PhoneNumber = $faker->e164PhoneNumber();
        $Description = $faker->realText(1000);//faghat tooye "realText" english minevesht
                                                         //vagarna mishod az paragraph estefadeh kard
                                                         //ke daghigh besheh rooye 100 ta kalame set besheh
                                                         //vali khob to paragraph latin generate mikard

        $Values[] ="(" . $Pdo->quote($id) .", ". $Pdo->quote($FirstName) . ", " . $Pdo->quote($LastName) . ", " .
            $Pdo->quote($FatherName) . ", " . $Pdo->quote($PhoneNumber) . ", " .
            $Pdo->quote($Description) . ")";
    }

    $Query .=implode(",", $Values).";";
    $Pdo->exec($Query);

    echo "10,000 rows inserted \n";
}

echo "Done!";
