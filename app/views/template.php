<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2><?php echo $name?></h2>

<div class="container">
    <?php require $view; ?>

</div>
</body>
</html>