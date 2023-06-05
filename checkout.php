<?php
    require 'connection.php';

    $sql='SELECT cod_bandeira, desc_bandeira FROM bandeiras';
    $result = mysqli_query($conn, $sql);

    if($_GET['idProduto']){
        $sql = 'SELECT * FROM produtos WHERE id='.$_GET['idProduto'];
        $resultProduto = mysqli_query($conn, $sql);
        $produto = mysqli_fetch_assoc($resultProduto);
    } else{
        $sql = 'SELECT * FROM produtos WHERE id=1';
        $resultProduto = mysqli_query($conn, $sql);
        $produto = mysqli_fetch_assoc($resultProduto);
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h1>Ótima escolha!</h1>
            <p>Obrigado por comprar na Mirror Fashion!
Preencha seus dados para efetivar a compra.</p>

            <div class="panel panel-success">
                <div class="panel-heading">
                <h2 class="panel-title">Sua compra</h2>
            </div>
                <div class="panel-body">
                <img src="assets/produtos/foto<?= $produto['id'] ?>-<?=$_GET["cor"]?>.png" class="img-thumbnail img-responsive">
                    <dl>
                        <dt>Produto</dt>
                        <dd>Fuzzy Cardigan</dd>

                        <dt>Cor</dt>
                        <dd>verde</dd>
                        <dt>Tamanho</dt>
                        <dd>40</dd>
                        <dt>Preço</dt>
                        <dd>R$ 129,00</dd>
                    </dl>
                    
                </div>
            </div>

    <form>
            <fieldset>
            <legend>Dados pessoais</legend>
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" value="sim" name="spam" checked>Quero receber spam da Mirror Fashion</label>
 </div>
</fieldset>
            
            <fieldset>
            <legend>Cartão de crédito</legend>
                <div class="form-group">
                    <label for="numero-cartao">Número - CVV</label>
                    <input type="text" class="form-control" id="numero-cartao" name="numero-cartao">
                </div>
                <div class="form-group">
                    <label for="bandeira-cartao">Bandeira</label>
                    <select name="bandeira-cartao" id="bandeira-cartao" class="form-control">
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?= $row['cod_bandeira'];?>"><?= $row['desc_bandeira'];?></option>
                <?php
                    }
                ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="validade-cartao">Validade</label>
                    <input type="month" class="form-control" id="validade-cartao" name="validade-cartao">
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary btn-lg pull-right"><span class="glyphicon glyphicon-thumbs-up"></span> Confirmar Pedido</button>
    </form>

        </div>
     </div>
</body>
</html>