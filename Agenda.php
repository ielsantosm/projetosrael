<!DOCTYPE php>
<?php
require 'conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>😎 EM EVOLUÇÃO 😎</title>
        <link rel="stylesheet" href="arquivos/style.css">
    <head>
    <body>
        <!-- Inicio Menu -->
        <header id="header">
            <a id="logo" href="index.php">😎 EM EVOLUÇÃO 😎</a>
            <nav id="nav">
                <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                    <span id="hamburger"></span>
                </button>
                <ul id="menu" role="menu">
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="Quadras.php">Quadras</a></li>
                    <li><a href="Arenas.php">Arenas</a></li>
                    <li><a href="teste.php">Testes</a></li>
                    <li><a href="../phpmyadmin/">phpMyAdmin</a></li>
                </ul>
            </nav>
        </header>
        <script src="arquivos/script.js"></script>
        <!-- Fim Menu -->
        <p></p>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <h1>SELECIONE A ARENA: </h1>
            <select name="Arena">
                    <?php
                        $arenaSelecionada = 0;
                        //executa um select
                        $rs = $con->query('SELECT * FROM arena');
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Arena. '">' .$row->Nome_Arena. '</option>';
                        }
                    ?>
                </select>
                <input type= "submit" value="Carregar" id = "btEnvia">
        </form>
        <?php
            $arenaSelecionada = $_POST['Arena'];
            if($arenaSelecionada != 0){
                echo '<select name="Arena">';
                        //executa um select
                        $rs = $con->query('SELECT * FROM quadra WHERE Arena = '.$arenaSelecionada);
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Quadra. '">' .$row->Descricao. '</option>';
                        }
            echo'</select>';
            }
        ?>    
</body>
</html>