<?php

include('config/db_connect.php');

// THREE STEPS: 
// 1) write query to get all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// 2) make query and get results 
$result = mysqli_query($conn, $sql);

// 3) fetch resulting rows as array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);  // will make an associative array

// free the result from memory
mysqli_free_result($result);

// close the conenction 
mysqli_close($conn);

//(explode (',', $pizzas[0]['ingredients']));

?>

<!DOCTYPE html>
<html lang="en">


<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza): ?>

            <div class="col s6 m3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li><?php echo htmlspecialchars($ing) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">More info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <?php if (count($pizzas) >= 2) : ?>
            <p>There are two or more pizzas.</p>
        <?php else: ?>
            <p>There are less than 2 pizzas. </p>
        <?php endif; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>