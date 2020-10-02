<?php

//Sintaxe abaixo apenas para importações não essenciais:
// include 'funcoes.php';

require_once 'funcoes.php';

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Vinícius',
        'saldo' => 1000
    ], 
    '123.456.789-09' => [
        'titular' => 'Maria',
        'saldo' => 10000
    ], 
    '123.455.678-08' => [
        'titular' => 'Alberto',
        'saldo' => 300
        ]
    ];

$cpf = '123.456.789-09';

$contasCorrentes[$cpf] = sacar($contasCorrentes[$cpf], 500);

$cpf = '123.455.678-08';

$contasCorrentes[$cpf] = depositar($contasCorrentes[$cpf], 950);

unset ($contasCorrentes['123.455.678-08']);

titularComLetrasMaiusculas($contasCorrentes['123.456.789-10']); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <h1>Contas correntes</h1>

    <dl>
        <?php foreach($contasCorrentes as $cpfs => $contas){?>
            <dt>
                <h3><?=$contas['titular']; ?> - <?= $cpfs; ?></h3>
            </dt>
            <dd>
                Saldo: <?= $contas['saldo'];?>
            </dd>
        <?php }?>
    </dl>
</body>
</html>