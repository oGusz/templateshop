<!DOCTYPE html>
<html lang='pt-br'>

<head>


    <?php include(__DIR__ . "/templateshop-busca/infos-head-category.php"); ?>
    <?php include(__DIR__ . "/templateshop-busca/inc/jquery.php"); ?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Codes</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" onload="this.rel='stylesheet'">




    <link rel="stylesheet" href="/templateshop-busca/css/normalize.css" ?>>
    <link rel="stylesheet" href="/templateshop-busca/css/doutor.css">
    <link rel="stylesheet" href="/templateshop-busca/css/style-base.css">
    <link rel="stylesheet" href="/templateshop-busca/css/style.css">
    <link rel="stylesheet" href="/templateshop-busca/sweetalert/css/sweetalert.css">
    <link rel="stylesheet" href="/templateshop-busca/slick/slick.css">
    <link rel="stylesheet" href="/templateshop-busca/slick/slick-banner.css">

    <link rel="import" href="/templateshop-busca/inc/jquery.php">



    <style>
        .btn {
            display: inline-block;
            margin: 8px 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 16px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            background-color: var(--primary-color);
            color: #fff;
            outline: transparent solid 2px;
            outline-offset: 1px;
            border-radius: var(--border-radius);
            -webkit-transition: .3s;
            transition: .3s;
        }


        .btn:active,
        .btn:focus,
        .btn:hover {
            background-color: var(--secondary-color);
            outline: var(--light) solid 2px;
        }
    </style>
</head>

<body>


    <a class="btn" href="<?= wppLink($whatsapp) ?>" title="Solicitar contato por whatsapp" target="_blank">Solicitar contato por whatsapp <i class="fab fa-whatsapp"></i></a>


    <script>

    </script>
</body>

</html>