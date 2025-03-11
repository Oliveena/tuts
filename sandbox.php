<?php 
// ternary operators
$score = 50;

// if ($score <40) {
//     echo 'high score! :D';
// } else {
//     echo 'low score! :(';
// }

// $val = $score > 40 ? 'high score! :D' : 'low score :(';
// echo $val;


// superglobals 
// $_GET['name'], $_POST['name'];

echo $_SERVER['SERVER_NAME'] . '<br>';
echo $_SERVER['REQUEST_METHOD'] . '<br>';
echo $_SERVER['SCRIPT_FILENAME'] . '<br>';
echo $_SERVER['PHP_SELF'] . '<br>';
echo $_SERVER['REQUEST_METHOD'] . '<br>';

//
// SESSION and COOKIE 
//
if(isset($_POST['submit'])) {

    // cookie for gender, unrelated to session start, but initates on POST
    setcookie('gender', $_POST['gender'], time() + 86400); // cookie will last 1 day 

    session_start();
    $_SESSION['name'] = $_POST['name'];
    header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php $score > 40 ? 'high score! :D' : 'low score :('; ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="name" placeholder="Name">
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="non-binary">Non-binary</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
    
</body>
</html>