    <?php 
    
    session_start();

    //$_SESSION['name'] = 'the old lady from the corner store';
    // sessions are safer than cookies

    if($_SERVER['QUERY_STRING'] == 'noname'){
        //unset($_SESSION['name']);
        session_unset();
    }
    
    $name = $_SESSION['name'] ?? 'Guest';

    // get cookie 
    $gender = $_COOKIE['gender'] ?? 'Unknown';
    
    
    ?>

    
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ninja Pizza</title>
        <!-- Materialize 1.0.0 Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style type="text/css">
            .brand {
                background-color: #cbb09c !important;
            }
            .brand-text {
                color: #cbb09c !important;
            }
            form{
                max-width: 80vw;
                margin: 2vw auto;
                padding: 2vw;
            }
        </style>
    </head>

    <body class="grey lighten-4">
        <nav class="white z-depth-0">
            <div class="container">
                <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
                    <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                    <li><a href="add.php" class="btn brand z-depth-0">Add A Pizza</a></li>
                </ul>
            </div>

        </nav>