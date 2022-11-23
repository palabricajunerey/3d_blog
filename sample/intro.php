<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page 3D</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>Hello</h1>

                <?php
                // PHP codes
                # PHP codes
                /*
                echo "Hello from PHP";
                */
                $a = 4; //global
                $b = "Hello";
                $C = true;
                $d2 = 1.5;
                $age;
                $aGE;
                $aGe;

                echo "Hi, " . $b . " " . $C . "<br>";

                echo $a * $d2 . "<br>";
                echo $a + $d2 . "<br>";
                echo $a - $d2 . "<br>";
                echo $a / $d2 . "<br>";
                echo $a % $d2 . "<br>";
                echo "<hr>";
                function test()
                {
                    //$a = 1; //local
                    global $a;

                    static $x = 0;
                    echo $x;
                    $x++;
                    echo "<p>Variable x inside function is: $a</p>";
                }

                test();
                test();
                test();
                print "<p>Print Statement</p>";
                /*
PHP supports the following data types:

    String
    Integer
    Float (floating point numbers - also called double)
    Boolean
    Array
    Object
    NULL


    //string manipulation
    strlen()

                
                */
                echo strlen("Hello world!") . "<br>";
                echo str_word_count("Hello world!") . "<br>";
                echo strrev("Hello world!");



// if(){
// //codes
// }elseif(){
// //codes
// }elseif(){
// //codes
// }else{
// //codes
// }

// switch (n) {
//     case label1:
//       code to be executed if n=label1;
//       break;
//     case label2:
//       code to be executed if n=label2;
//       break;
//     case label3:
//       code to be executed if n=label3;
//       break;
//     default:
//       code to be executed if n is different from all labels;
//   } 

// while (condition is true) {
//   code to be executed;
// } 

// for (init counter; condition; increment counter) {
//     code to be executed for each iteration;
//   } 

// foreach ($array as $value) {
//     code to be executed;
//   } 

$colors = array("red", "green", "blue", "yellow");
echo $colors[0]; //indexed array

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
$age['Peter']; //associative array

foreach ($colors as $value) {
  echo "$value <br>";
}

$cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),//1
    array("Saab",5,2),//2
    array("Land Rover",17,15)//3
  );
echo "<hr>";
//   echo $cars[0][0];
//   echo $cars[0][1];
//   echo $cars[0][2];
//   echo $cars[1][0];
//   echo $cars[1][1];
//   echo $cars[1][2];
//   echo $cars[2][0];
$count =1;  
for($row = 0; $row < 4; $row++){ //row = 1
    
    echo "<p><b>Row number $count</b></p>";
    echo "<ul>";
    for($col = 0; $col < 3; $col++){ //row = 1 , col = 0
        echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
    $count++;
}

echo "<hr>";

$count = 1;
foreach ($cars as $row) {
    
	echo "Array " . $count++ ."<br>";

    foreach ($row as $col=>$value) {
        echo $value . "<br>";
    }

}

define("", "");


                ?>



            </div>
        </div>
    </div>
</body>

</html>