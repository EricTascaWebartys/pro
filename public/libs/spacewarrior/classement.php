<?php
    require('class/Datas.php');
    require('class/User.php');
    $datas = json_decode(file_get_contents('json/datas.json'));
 ?>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shoot</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/particles.js-master/demo/css/style.css">
  <link rel="stylesheet" href="css/front.css">

</head>

<body>
    <div style="background-image:url('img/bg-space.webp');background-size:cover;background-repeat:no-repeat">
        <div class="col-md-6 col-12 mx-auto border border-dark" style="width:100%; height:100%; background-color:rgba(0, 0, 0, 0.8)">
            <p class="text-center text-light pt-4" style="font-size:24px">TOP 5 PLAYERS</p>
            <?php foreach ($datas as $key => $data) { ?>

                <p class="text-center mt-5 text-info mb-5" style="font-size:20px"><?php echo $data->name. " | "?> <span class="text-success"><?php echo $data->score ?></span></p>
                <div class="border border-bottom-0" style="opacity:0.6"></div>
            <?php } ?>
            <p class="text-center mb-3" style="position:absolute; bottom:40px; width:100%"><a href="index.php" class="btn btn-outline-light">Retour au jeu</a></p>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
