<?php

$number; $rows;
$table = '';

// VALIDAR CAMPOS
if (!empty($_POST['number']) && !empty($_POST['rows']) && isset($_POST['generateTable'])) {
    // PEGAR O NÚMERO A SER OPERADO E A QUATIDADE DE LINHAS QUE A TABUADA VAI TER
    $number = (int) $_POST['number'];
    $rows = (int) $_POST['rows'];

    // SELECIONAR OPERAÇÃO
    selectOperation();
} else {
    $table = 'Preencha todos os campos!';
}

// LIMPAR TABUADA
if (isset($_POST['clearTable'])) {
    $table = '';
}

function selectOperation()
{
    $operatorValue = $_POST['operator'];
    switch ($operatorValue) {
        case "addition":
            addition();
            break;
        case "subtraction":
            subtraction();
            break;
        case "multiplication":
            multiplication();
            break;
        case "division":
            division();
            break;
    }
}
/* OPERAÇÕES */
function addition()
{
    global $number, $rows, $table;
    for ($row = 1; $row <= $rows; $row++) {
        $result = $number + $row;
        $table .= "<p>$number + $row = $result</p>";
    }
}
function subtraction()
{
    global $number, $rows, $table;
    for ($row = 1; $row <= $rows; $row++) {
        $result = $number - $row;
        $table .= "<p>$number - $row = $result</p>";
    }
}
function multiplication()
{
    global $number, $rows, $table;
    for ($row = 1; $row <= $rows; $row++) {
        $result = $number * $row;
        $table .= "<p>$number x $row = $result</p>";
    }
}
function division()
{
    global $number, $rows, $table;
    for ($row = 1; $row <= $rows; $row++) {
        $result = $number / $row;
        $table .= "<p>$number ÷ $row = ".round($result, 2)."</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./favicon_io/favicon.ico" type="image/x-icon">
</head>

<body>
    <h1>Gerador de Tabuada</h1>

    <form class="container" method="post">
        <div class="controls">

            <!-- CAMPO PARA INSERIR NÚMERO -->
            <div class="insert-number control">
                <label for="number">Número</label>
                <input type="number" name="number" id="number">
            </div>

            <!-- CAMPO PARA SELECIONAR OPERAÇÃO -->
            <div class="select-operator control">
                <label for="number">Operação</label>
                <select name="operator" id="operator">
                    <option value="addition">+</option>
                    <option value="subtraction">-</option>
                    <option value="multiplication" selected>x</option>
                    <option value="division">÷</option>
                </select>
            </div>

            <!-- CAMPO PARA DEFINIR A QUANTIDADE DE LINHAS DA TABUADA -->
            <div class="set-rows control">
                <label for="rows">Qtd de Linhas</label>
                <input type="number" name="rows" id="rows" <?php echo !empty($_POST["rows"]) ? "value='".$_POST["rows"]."'" : "value='10'"?>>
            </div>

        </div>
        <!-- BOTÕES PARA GERAR OU LIMPAR TABUADA -->
        <div class="buttons">
            <button value="generateTable" name="generateTable" id="generateTable">Gerar Tabuada</button>
            <button value="clearTable" name="clearTable" id="clearTable">Limpar Tabuada</button>
        </div>

        <!-- TABUADA -->
        <div class="table">
            <?php echo $table ?>
        </div>
    </form>
</body>

</html>