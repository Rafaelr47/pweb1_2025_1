<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
    <?php
        $nome = "Rafael";
        echo "Bem vindo ao PHP, $nome <br>";

        $idade = 19;
        if ($idade < 18) {
            echo "Menor<br>";
        } else {
            echo "Maior de idade<br>";
        }

        $notas = [7,6,5,8,9];
        echo "Notas maiores que 6: ";
        for($i = 0; $i< count($notas); $i++) {
            if ($notas[$i]> 6){
                echo "$notas[$i] ";
            }
            
        }
        echo "<br>";
        $alunos = ["Rafael", "Sandro", "Mateus", "Angelo", "Ferron"];
        for($i = 0; $i< count($alunos); $i++){
            echo "$alunos[$i], ";
        }

    ?>
</body>
</html>