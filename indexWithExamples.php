<?php

define('NAME', 'Maria');

//$name = 'Yoshi';
//$age = 30;
//echo $name;

//$name = 'Mario';

$stringOne = 'my email is';
$stringTwo = 'mario123@netninja.co.uk';

//echo $stringOne . $stringTwo;

//echo 'Hey, my name is ' . $name;

//echo "Hey, my name is $name";

//echo "the ninja screamed \"whaaaaaaa\"";
//echo 'the ninja screamed "whaaaaaaa"';
//echo $name[0];

//echo strlen($name);
//echo strtoupper($name);
//echo strtolower($name);
//echo str_replace('m', 'w', $name);

$pi = 3.14;
echo floor($pi);

//indexed arrays
$peopleOne = ['Alice', 'Brunhild', 'Crystal'];
$peopleOne[1];

$peopleTwo = array('Daniel', 'Etienne', 'Frederique');
$peopleTwo[2];
print_r($peopleTwo);

$ages = [20, 30, 40, 50];
// replacing elements
$ages[1] = 25;
// adding elements
$ages[] = 60;
array_push($ages, 70);
// returning elements
print_r($ages);
// counting elements
echo count($ages);

// merging arrays
$peopleThree = array_merge($peopleOne, $peopleTwo);
print_r($peopleThree);


// associative arrays (key & value pairs)
$ninjasOne = ['shaun' => 'black', 'mario' => 'orange', 'luigi' => 'green'];
echo $ninjasOne['mario'];
print_r($ninjasOne);

$ninjasTwo = ['bowser' => 'green', 'peach' => 'yellow', 'daisy' => 'blue'];

$ninjasTwo['toad'] = 'pink';
$ninjasTwo['peach'] = 'peach';
print_r($ninjasTwo);

echo count($ninjasTwo);

$ninjasThree = array_merge($ninjasOne, $ninjasTwo);
print_r($ninjasThree);

// mutlidimensional array (an array of arrays)
$blogs = [
    ['title' => 'mario party', 'author' => 'mario', 'content' => 'lorem', 'likes' => 30],
    ['title' => 'mario cart cheats', 'author' => 'toad', 'content' => 'lorem', 'likes' => 25],
    ['title' => 'zelda hidden chests', 'author' => 'link', 'content' => 'lorem', 'likes' => 50]
];
// print_r($blogs[1][1]);     // will return 'toad'
// echo $blogs[2]['author']; // will return 'link'
echo count($blogs);

$blogs[] = ['title' => 'castle party', 'author' => 'peach', 'content' => 'lorem', 'likes' => 100];
//print_r($blogs);

// storing the popped off variable of the array 
$popped = array_pop($blogs);
print_r($popped);

/*loops 
$blogs = [blog1, blog2, ...];

foreach($blogs as $blog) {
    echo 'some template';
}
*/

$ninjas = ['shaun', 'ryu', 'yoshi'];
for ($i = 0; $i < count($ninjas); $i++) {
    echo $ninjas[$i] . '<br />';
};

foreach ($ninjas as $ninja) {
    echo $ninja . '<br />';
}

// example
$products = [
    ['name' => 'shiny star', 'price' => 20],
    ['name' => 'green shell', 'price' => 10],
    ['name' => 'red shell', 'price' => 15],
];

foreach ($products as $product) {
    echo $product['name'] . ' - ' . $product['price'];
    echo '<br />';
};

foreach ($products as $product) {
    if($product['name'] === 'green shell') {
        break;
    };

    if($product['price'] > 15) {
        continue;
    };

    echo $product['name'] . '<br>';
}

// while loop
$i = 0;

while ($i < count($products)) {
    echo $products[$i]['name'];
    echo '<br />';
    $i++;
};

// comparison booleans (T or F)
echo true; // will display   1  in the browser
echo false; // displays nothing!!!!! whatttt 

// numbers
echo 5 < 10;  // 1
echo 5 == 10;  // nothing
echo 5 <= 5;  // 1
echo 5 != 5;  // nothing

//strings
echo 'shaun' < 'yoshi'; // 1, because compares alphabetical order of index[0]
echo 'shaun' > 'Shaun';  // 1, because lowercase > uppercase 

// loose vs strict equal comparison
echo "5" == 5; // 1
echo "5" === 5; // nothing
echo true == "1";  // 1
echo false == "";  // 1

// conditionnal statement e.g. logged in vs not logged in
$price = 20;
if ($price < 30) {
    echo "the condition is met";
} else {
    echo "nope";
};

foreach ($products as $product) {
    //if ($product['price'] < 15 && $product['price'] > 2) {
    //  echo $product['name'] . '<br>';
    //}

    if ($product['price'] < 10 || $product['price'] > 20) {
        echo $product['name'] . '<br>';
    }
}

// functions 

function sayHello($name = 'shaun', $time = 'morning') {
    echo "Good $time, $name";
}
sayHello('mario', 'night');

function formatProduct($product){
    //echo "<br>A {$product['name']} costs {$product['price']}$ to buy. <br>";
    return "<br>A {$product['name']} costs {$product['price']}$ to buy. <br>";
}
// $formatted = formatProduct(['name' => 'gold star', 'price' => 20]);
// echo $formatted;

$name = 'mario';

/*
function sayHelloAgain() {
    global $name;
    $name = 'Amanda';
    echo "<br>hello $name<br>";
}
sayHelloAgain();
echo $name;
*/
function sayBye($name) {
    $name = "Amanda";
    echo "<br>bye $name";
}

sayBye($name);  // Amanda
echo $name;   // mario 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First PHP Page :)</title>
</head>

<body>
    <h1>

        <?php echo 'hello, folks'; ?>
        <!--idem as <h1>hello, folks</h1>-->

    </h1>
    <div><?php echo NAME; ?></div>
    <div><?php echo $age; ?></div>

    <h1>Products</h1>
    <ul>
        <?php foreach($products as $product) { ?>
            <?php if($product['price'] > 15){ ?>
                <li><?php echo $product['name'] ?></li>
            <?php } ?>
       <?php } ?>
    </ul>

    <?php 
    include('ninjas.php');  // carries on with the rest of PHP in HTML page if file inexistent
    require('ninjas.php');  // fatal error if file doens't exist
    include'ninjas.php';  // also can be written without ()
    require'ninjas.php';  // idem

    include'content.php';
    include'content.php';

    echo 'end of php' ?>



</body>

</html>