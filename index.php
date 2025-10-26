<?php 
// Inclui o conteúdo do arquivo header.php, que contém o <head> com Bootstrap e outras configurações
include('layouts/header.php'); 
?>

<body>
    <!-- Recipiente principal com bordas arredondadas e fundo claro -->
    <div class="container mt-5 p-4 bg-light rounded">
        <!-- Título estilizado com fonte cursiva -->
        <h1 class="text-center mb-4">Zodiac Signs</h1>

        <!-- Formulário que envia a data de nascimento via POST para show_zodiac_sign.php -->
        <form id="signo-form" method="POST" action="show_zodiac_sign.php">
            <div class="mb-3">
                <!-- Rótulo do campo de data -->
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                
                <!-- Campo de entrada de data (formato padrão HTML5) -->
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>

            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn btn-primary">Ver meu signo</button>
        </form>
    </div>
</body>
</html>
