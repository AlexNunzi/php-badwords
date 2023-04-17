<?php
$paragraph = $_GET['paragraph'];
$keyword = $_GET['keyword'];

$censoredParagraph = str_ireplace(trim($keyword), "***", $paragraph);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badwords</title>
</head>
<body>
    <h2>La frase che hai inserito è la seguente ed è lunga <?php echo strlen(trim($paragraph))?> caratteri:</h2>
    <p><?php echo trim($paragraph); ?></p>
    <h2>La parola da censurare è:</h2>
    <p><?php echo trim($keyword) ?></p>
    <h2>La frase inserita e censurata è la seguente ed è lunga <?php echo strlen(trim($censoredParagraph))?> caratteri</h2>
    <p><?php echo trim($censoredParagraph) ?> </p>
</body>
</html>