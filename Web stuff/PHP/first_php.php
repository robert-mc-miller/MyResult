<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework</title>
    <?php
        function diff($a, $b) {
            if ($a > $b){
                return $a - $b;
            }
            elseif ($a < $b) {
                return $b - $a;
            } else {
                return 0;
            }
        }

        function randomString($a, $b, $c){
            $num = rand(0, 2);
            $strings = [$a, $b, $c];
            return $strings[$num];
            
        }

        function randomStringArray($array){
            $num = rand(0, count($array));
            return $array[$num];
            
        }
    ?>
</head>
<body>

    <!-- Code for the absolute difference form -->
    <form method="get">
        <h1>Function 1 - Absolute Difference</h1>
        Number 1: <input type="number" name="numone">
        <br>
        <br>
        Number 2: <input type="number" name="numtwo">
        <br>
        <br>
        <input type="submit">
    </form>

    <?php
    
    if(isset($_GET["numone"])){
        $a = $_GET["numone"];
        $b = $_GET["numtwo"];
        $absdiff = diff($a, $b);
        echo "<h2>Answer: $absdiff</h2>";
    }
        ?>

    <!-- Code for the random string form -->
    <form method="get">
            <h1>Function 2 - Random String</h1>
            String 1: <input type="text" name="string1">
            <br>
            <br>
            String 2: <input type="text" name="string2">
            <br>
            <br>
            String 3: <input type="text" name="string3">
            <br>
            <br>
            <input type="submit">
        </form>


        <?php
    
        if(isset($_GET["string1"])){
            $a = $_GET["string1"];
            $b = $_GET["string2"];
            $c = $_GET["string3"];
            echo '<h2>Answer: ' . randomString($a, $b, $c) . '</h2>';
        }
        ?>


    <!-- Code for the random string from array form -->
    <form method="get">
        <h1>Function 3 - Random String from array</h1>
        <p>Submit strings seperated by commas (e.g test1,test2,test3)</p>
        Array: <input type="text" name="array">
        <br>
        <br>
        <input type="submit">
    </form>


        <?php
    
        if(isset($_GET["array"])){
            $array = $_GET["array"];
            $array = explode( ',', $array );
            echo '<h2>Answer: ' . randomStringArray($array) . '</h2>';
        }
        ?>

</body>
</html>