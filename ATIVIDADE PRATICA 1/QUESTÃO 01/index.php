<?php
    echo "--- MEDIA DE NOTAS ---\n";

    $nome = readline("Digite seu nome: ");
    $notas = [];
    $soma = 0; 

    //preenchendo array 
    for($i = 0; $i < 3; $i++){
        $nota = (float) readline("Informe a " .($i + 1). " nota: ");  //ponto serve para concatenacao

        $notas[] = $nota; //armazenando valores no array

        $soma = $soma + $nota; //somando as notas
    }
   
    $media = $soma / count($notas); //count serve para contar quantos valores existem no array

    echo "\n";
    echo "Aluno: " . $nome . "\n";

    //exibindo as notas
    foreach($notas as $nota){
        echo "Nota $nota \n";
    }

    echo "Media das notas: " . $media . "\n";

    echo "\n";
    echo "--- RESULTADO: ---\n";

    //verificando situacao do alunos
    if($media >= 7){
        echo "Aprovado \n";

    }else if($media >= 5 && $media <7){
        echo "Recuperacao \n";

    }else{
        echo "Reprovado \n";
    }

?>