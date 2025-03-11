<?php

include('config/db_connect.php');

$email = $title = $ingredients = "";
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

/*if(isset($_GET['submit'])) {  // was the form submitted?  $_GET is a *global*
    echo $_GET['email'];  // key-value, email-{user-enetered email}
    echo $_GET['title'];
    echo $_GET['ingredients'];
}*/

if (isset($_POST['submit'])) {  // was the form submitted?  $_POST is a *global*
    //check email
    if (empty($_POST['email'])) {
        $errors['email'] = "An email is required. <br>";
    } else {
        //echo htmlspecialchars($_POST['email']);  // key-value, email-{user-enetered email}
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be a valid email adress.";
        }
    }

    //check title
    if (empty($_POST['title'])) {
        $errors['title'] = "A title is required. <br>";
    } else {
        //echo htmlspecialchars($_POST['title']);  
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = "Title must be letters and spaces only.";
        }
    }

    //check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = "At least 1 ingredient is required. <br>";
    } else {
        //echo htmlspecialchars($_POST['ingredients']); 
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = "Ingredients must be a comma-separated list.";
        }
    }

    if (array_filter($errors)) { // no errors => returns false; error(s) => returns true)
        //echo 'hey! there are errors in the form.';
    } else {
        //echo 'Form is valid.';

        $email = mysqli_real_escape_string($conn, $_POST['email']); //store the user email in DB
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // create SQL insert: into these columns, insert these $values
        $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

        // save to DB and check (make query and get result)
        if(mysqli_query($conn, $sql)) {
            //succes
            header('Location: index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
    // end of POST check
    //attention! save the data BEFORE redirecting!
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
<h4 class="center">Add a Pizza</h4>
<!--<form class="white" action="add.php" method="POST">-->
<form class="white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Your Email: </label>
    <input label="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <div class="red-text"><?php echo $errors['email']; ?></div>
    <label>Pizza Title: </label>
    <input label="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
    <div class="red-text"><?php echo $errors['title']; ?></div>
    <label>Ingredients (comma separated): </label>
    <input label="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>
    <div class="center">
        <input type="submit" name="submit" value="sumbit" class="btn brand z-depth-0">
    </div>
</form>
</section>

<?php include('templates/footer.php'); ?>

</html>