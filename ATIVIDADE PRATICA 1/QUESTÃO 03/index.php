<?php

echo "----------- ATENDIMENTO LANCHONETE ----------\n";
$cliente = readline("Informe o nome do cliente: ");

//matriz para armazenar o cardapio
$cardapio = [
    1 => ["produto" => "X-Burguer", "preco" => 18.00],
    2 => ["produto" => "X-Salada", "preco" => 20.00],
    3 => ["produto" => "Batata Frita", "preco" => 15.00],
    4 => ["produto" => "Refrigerante", "preco" => 8.00],
    5 => ["produto" => "Suco Natural", "preco" => 10.00]
];

$pedido = [];
$total = 0;
$continuar = 'S';

do {
    
    echo "\n---------- CARDÁPIO ----------\n";
    
    foreach ($cardapio as $codigo => $item) { //exibindo o cardapio
        echo "$codigo - {$item['produto']} - R$ " . number_format($item['preco'], 2) . "\n";
    }

    echo "0 - Finalizar pedido\n";

    $codigo = (int) readline("Informe seu pedido: ");  //utilizando o INT para converter diretamente a entrada em um inteiro

    //finalizando o pedido antes de entrar na estrutura de decisao
    if ($codigo == 0) {
        echo "Programa encerrado";
        exit; 
    }

    //estrutura de decisao
    switch ($codigo) {

        case 1:
            $produtoEscolhido = $cardapio[1]['produto'];
            $precoEscolhido = $cardapio[1]['preco'];
            break;

        case 2:
            $produtoEscolhido = $cardapio[2]['produto'];
            $precoEscolhido = $cardapio[2]['preco'];
            break;

        case 3:
            $produtoEscolhido = $cardapio[3]['produto'];
            $precoEscolhido = $cardapio[3]['preco'];
            break;

        case 4:
            $produtoEscolhido = $cardapio[4]['produto'];
            $precoEscolhido = $cardapio[4]['preco'];
            break;

        case 5:
            $produtoEscolhido = $cardapio[5]['produto'];
            $precoEscolhido = $cardapio[5]['preco'];
            break;

        default:
            echo "Código invalido! Tente novamente.\n";
            continue 2; //repedindo o loop 
    }

    //solicitando a quantidade de produtos
    echo "\n";
    $quantidade = (int) readline("Informe a quantidade: ");

    if ($quantidade <= 0) {
        echo "\n";
        echo "Quantidade inválida. Deve ser maior que zero. ";
        continue; //repedindo o loop 
    }

    $subtotal = $precoEscolhido * $quantidade; //calculando o valor total de pedido

    $pedido[] = [ //array para armazenar os produtos, quantidades e valor total inicial
        "produto" => $produtoEscolhido,
        "quantidade" => $quantidade,
        "subtotal" => $subtotal
    ];

    $total = $total + $subtotal; 

    //informando produtos, quantidades e valores a serem pagos
    echo "Adicionado: $produtoEscolhido x $quantidade = R$ " . number_format($subtotal, 2) . "\n";

    echo "\n";
    $continuar = readline("Deseja adicionar outro produto? (S - SIM) (N- NÃO): ");

} while ($continuar === 'S' || $continuar === "s");

//verificando valor pago e validando
do {
    
    $valorPago = (float) readline("\nInforme o valor pago pelo cliente: R$ ");

    if ($valorPago < $total) {
        echo "Valor insuficiente! Total do pedido: R$ " . number_format($total, 2) . "\n";
    }

} while ($valorPago < $total);

//calculando troco
$troco = $valorPago - $total;

//exibindo resumo do pedido
echo "---------------------------------------\n";
echo "\n---------- RESUMO DO PEDIDO ---------\n";
echo "Cliente: $cliente\n";

//percorrendo o array ASSOCIATIVO para exibir
foreach ($pedido as $item) {

    echo "Produto: {$item['produto']}\n"; //chamando a chave (nome) para exibir o valor contido no espaço.
    echo "Quantidade: {$item['quantidade']}\n";
    echo "Subtotal: R$ " . number_format($item['subtotal'], 2) . "\n";

}
    echo "Total: R$ " . number_format($total, 2) . "\n";
    echo "Valor pago: R$ " . number_format($valorPago, 2) . "\n";
    echo "Troco: R$ " . number_format($troco, 2) . "\n";

?>