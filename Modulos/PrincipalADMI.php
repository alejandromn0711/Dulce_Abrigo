<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        body {
            color: #204a87;
        }

        h1 {
            position: fixed;
            top: 190px;
            left: 40%;

        }
    </style>

    <?php

    if (isset($_SESSION['ADMI'])) {

    ?>

        <h1 style="font-size: 4em;" align="center" , style="color: #204a87">¡Bienvenid@! <?php echo ucwords($_SESSION['nombreADMI']); ?> <br><svg width="4em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg></h1>

    <?php } ?>
</body>


</html>