<?php
$paragraph = $_GET['paragraph'];
$keyword = $_GET['keyword'];

$paragraph = trim($paragraph);
$keyword = trim($keyword);

// Sostituzione tramite str_replace che però sostituisce la parola anche nel caso in cui essa sia
// solo parte di una parola più lunga
$censoredParagraph = str_ireplace($keyword, "***", $paragraph);

// Sostituzione tramite espressione regolare per effettuare la ricerca della parola che non faccia
// parte di una parola più lunga
$censoredParagraph2 = preg_replace("/\b$keyword\b/i", "***", $paragraph);

// Sostituzione tramite ciclo for che cicla l'array di stringhe risultante dalla funzione explode()
// per sostituire tutte le parole che corrispondono a quella da censurare e poi ricompatta la frase
// tramite funzione implode() per poterla stampare
$arrayParagraph = explode(" ", $paragraph);
for ($i=0; $i < count($arrayParagraph); $i++){
    if(strtolower($arrayParagraph[$i]) == strtolower($keyword)){
        $arrayParagraph[$i] = "***";
    }
$censoredParagraph3 = implode(" ", $arrayParagraph);
}

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
    <h2>La frase che hai inserito è la seguente ed è lunga <?php echo strlen($paragraph)?> caratteri:</h2>
    <p><?php echo $paragraph; ?></p>
    <h2>La parola da censurare è:</h2>
    <p><?php echo $keyword ?></p>

    <!-- Frase risultante dalla str_replace -->
    <h2>La frase inserita e censurata è la seguente ed è lunga <?php echo strlen($censoredParagraph)?> caratteri</h2>
    <p><?php echo $censoredParagraph ?> </p>

    <!-- Frase risultante dalla preg_replace -->
    <h2>La frase inserita e censurata è la seguente ed è lunga <?php echo strlen($censoredParagraph2)?> caratteri</h2>
    <p><?php echo $censoredParagraph2 ?> </p>

    <!-- Frase risultante dalla censura tramite ciclo for -->
    <h2>La frase inserita e censurata è la seguente ed è lunga <?php echo strlen($censoredParagraph3)?> caratteri</h2>
    <p><?php echo $censoredParagraph3 ?> </p>
</body>
</html>