<?php

include('config/db_connect.php');

//check GET request id param
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql query
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // get query results 
    $result = mysqli_query($conn, $sql);

    // fetch reuult in array format
    $pizza = mysqli_fetch_assoc($result);

    // free the memory and close the connection
    // it's always the same steps over and over 
    mysqli_free_result($result);
    mysqli_close($conn);

    //print_r($pizza);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('config/db_connect.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <?php include('templates/header.php'); ?>

    <!--Body-->
    <h2 class="center">Details</h2>
    <div class="container center">

    <?php if($pizza): ?>
        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p>At <?php echo date($pizza['created_at']); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
        <?php else : ?>

            <h5>
                No such pizza exists! Please try again.
            </h5>
            <?php endif; ?>

    </div>

    <!--Footer-->
    <?php include('templates/footer.php'); ?>
</body>

</html>