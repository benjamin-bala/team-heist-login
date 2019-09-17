<!-- <?php
session_start();

?> -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | Team Heist</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <!-- <?php if (isset($_GET['message'])): ?>
        <script>alert("<?=$_GET['message']?>");</script>
    <?php endif;?> -->
        <div class="container-fluid" id="wrapper">
                <div class="text-box animated slideInDown 2s slow">
                    <h1 class="welcome-text">
                        Welcome,
                        <span class="username">
                            <!-- <?= isset($_SESSION['fullname'])? $_SESSION['fullname'] : "Heist"?> -->
                        </span>
                    </h1>
                </div>
                <div class="img-box animated fadeIn 2s slower">
                    <img class="welcome-image" src="https://res.cloudinary.com/abisola/image/upload/v1568718400/welcome_cuvmal.png">
                </div>
        </div>
    </body>


</html>
