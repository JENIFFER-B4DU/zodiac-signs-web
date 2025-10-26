<?php 
// Inclui o cabeçalho com Bootstrap e configurações básicas
include('layouts/header.php'); 

// Recebe a data enviada pelo formulário (formato: YYYY-MM-DD)
$data_nascimento = $_POST['data_nascimento'];

// Converte a data para o formato dia/mês (ex: 21/03)
$data_formatada = date('d/m', strtotime($data_nascimento));

// Carrega o arquivo XML com os signos
$signos = simplexml_load_file("signos.xml");

// Inicializa variável para guardar o signo encontrado
$signo_encontrado = null;

// Percorre cada signo do XML
foreach ($signos->signo as $signo) {
    // Extrai as datas de início e fim do signo
    $inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
    $nascimento = DateTime::createFromFormat('d/m', $data_formatada);

    // Ajusta o ano para evitar erro de comparação (usa ano fictício 2000)
    $inicio->setDate(2000, $inicio->format('m'), $inicio->format('d'));
    $fim->setDate(2000, $fim->format('m'), $fim->format('d'));
    $nascimento->setDate(2000, $nascimento->format('m'), $nascimento->format('d'));

    // Verifica se a data de nascimento está dentro do intervalo do signo
    if ($nascimento >= $inicio && $nascimento <= $fim) {
        $signo_encontrado = $signo;
        break; // Para o loop ao encontrar o signo
    }
}

// Se encontrou o signo, exibe as informações
if ($signo_encontrado) {
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-center'>Seu signo é: <strong>{$signo_encontrado->signoNome}</strong></h2>";
    echo "<p class='text-center'>{$signo_encontrado->descricao}</p>";
    echo "<div class='text-center mt-3'><a href='index.php' class='btn btn-secondary'>Voltar</a></div>";
    echo "</div>";
} else {
    // Caso não encontre nenhum signo (erro raro)
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-center text-danger'>Signo não encontrado.</h2>";
    echo "<div class='text-center mt-3'><a href='index.php' class='btn btn-secondary'>Tentar novamente</a></div>";
    echo "</div>";
}
?>
