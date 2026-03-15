<?php

echo "--- SISTEMA DE NOTAS ---\n";

$cadastro = []; //matriz principal
$medias = [];   //matriz para armazenar as medias

//preenchendo matriz
for ($i = 0; $i < 3; $i++) {

    echo "\nAluno " . ($i + 1) . ":\n";
    $nome = readline("Nome: ");

    $soma = 0; //reiniciando a soma para cada aluno

    for ($j = 0; $j < 3; $j++) {

        $nota = (float) readline("Informe a " . ($j + 1) . "ª nota: "); 
        $cadastro[$nome][] = $nota;
        $soma += $nota;
    }

    $media = $soma / count($cadastro[$nome]);
    $medias[$nome] = $media;
}

//inicializando maior e menor media com o primeiro aluno

$primeiroAluno = key($medias); //pega o primeiro aluno
$maior = $medias[$primeiroAluno]; //inicializa maior media com a media do primeiro aluno
$menor = $medias[$primeiroAluno]; //inicializa menor media com a media do primeiro aluno
$alunoMaior = $primeiroAluno; //inicializa o aluno com maior media
$alunoMenor = $primeiroAluno; //inicializa o aluno com menor media

//percorrendo a matriz para descobrir maior e menor valor
foreach ($medias as $nome => $media) {

    if ($media > $maior) {
        $maior = $media;
        $alunoMaior = $nome;
    }

    if ($media < $menor) {
        $menor = $media;
        $alunoMenor = $nome;
    }
}

//exibindo o resultado // NUMBER_FORMAT PARA COLOCAR DUAS CASAS DECIMAIS
echo "\nAluno com MAIOR média: $alunoMaior (=> " . number_format($maior, 2) . ")\n";
echo "Aluno com MENOR média: $alunoMenor (=> " . number_format($menor, 2) . ")\n";

?>