<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php

            require "view/partials/navbar.php";

            echo "<hr class='border border-2 opacity-50'>";


            ?>

            <h1>Home Page</h1>
            <h1>Hello <?php echo $_SESSION['user']?></h1>
        </div>
    </div>
</div>
</body>
</html>