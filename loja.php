<?php
include "connection.php";

if ($_POST) {
    $txtBusca = $_POST("TxtBusca");
    echo("Busca: ".$txtBusca);
}

//Novidades:
$sql = "SELECT * FROM produtos ORDER BY RAND() LIMIT 6";
$resultNovidades = mysqli_query($conn, $sql);
//var_dump($resultNovidades);

//Mais vendidos:
$sql = "SELECT * FROM produtos ORDER BY vendas DESC LIMIT 6";
$resultMaisVendidos = mysqli_query($conn, $sql);

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loja.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Castoro+Titling&family=Open+Sans&display=swap" rel="stylesheet">
    <script src="js/loja.js" defer></script>
    <title>Compre na Mirror Fashion!</title>
</head>
<body>
    <header>
        <div class="logo"><img src="assets/logo.png" alt="Logo Mirror Fashion">
        </div>
        <div class="nav-container">
        <p class="sacola">Sua sacola de compras está vazia</p>
        <nav class="navbar">
        <ul>
        <li><a href=""><span>Sua conta</span></a></li>
        <li><a href=""><span>Lista de desejos</span></a></li>
        <li><a href=""><span>Cartão Fidelidade</span></a></li>
        <li><a href=""><span>Sobre</span></a></li>
        <li><a href=""><span>Ajuda</span></a></li>
        </ul>
        </nav></div>
    </header>
    <main>
        <section id="main">
            <aside>
                <header>
                    <p>Busca</p>
                    <div class="busca"><input type="text" placeholder="Pesquise aqui...">
                    <input type="image" src="assets/busca.png">
                    </div>
                </header>
                    <button class="nav">Departamentos</button>
                <ul class="categorias">
                    <li>BLUSAS E CAMISAS</li>
                    <li>CALÇAS</li>
                    <li>SAIAS</li>
                    <li>VESTIDOS</li>
                    <li>SAPATOS</li>
                    <li>BOLSAS E CARTEIRAS</li>
                    <li>ACESSÓRIOS</li>
                </ul>
        </aside>
            <img class="img-main" src="assets/destaque-home.png" alt="">
        </section>
        <div id="destaques">
            <section class="novidades">
                <header><h1>&loz; Novidades</h1></header>
                <main>
                    <ul class="destaques-li">
                <?php
                    while($row = mysqli_fetch_assoc($resultNovidades)) {
                ?>
                <li>
                    <img src="assets/produtos/miniatura<?=$row["id"]?>.png" alt="">
                    <figcaption>
                        <?=$row["nome"]?> por <?=$row["preco"]?>
                    </figcaption>
                </li>
                <?php
                    }
                ?>
                </ul>
                </main>
                <footer><button class="btn-main">Mais produtos</button></footer>
            </section>
            <section class="vendidos">
                <header><h1>&loz; Mais vendidos</h1></header>
                <main>
                    
                <ul class="destaques-li">
                <?php
                    while($row = mysqli_fetch_assoc($resultMaisVendidos)) {
                ?>
                <li>
                    <img src="assets/produtos/miniatura<?=$row["id"]?>.png" alt="">
                    <figcaption>
                        <?=$row["nome"]?> por <?=$row["preco"]?>
                    </figcaption>
                </li>
                <?php
                    }
                ?>
                </ul>
                </main>
                <footer><button class="btn-main">Mais produtos</button></footer>
            </section>
        </div>
    </main>
    <footer id="down-footer">
        <h1>
            <img src="assets/logo.png" alt="">
        </h1>
    </footer>
</body>
</html>