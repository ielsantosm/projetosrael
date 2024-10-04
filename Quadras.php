<!DOCTYPE PHP>
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
        <h1>QUADRAS</h1>
        <h2>CADASTRO DE QUADRAS</h2>
        <h1></h1>
        <!-- Inicio Cadastro - Crud -->
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <h2> Selecione a Arena:
                <select name="Arena">
                    <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM arena');
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Arena. '">' .$row->Nome_Arena. '</option>';
                        }
                    ?>
                </select>
            </h2>
            <h2> Nome da Quadra: 
                <input type="text" name="Desc_Quadra" placeholder="Digite o nome da quadra">
            </h2>
            <h2> Tamanho da Quadra:
                <input type="text" name="Tam_Quadra" placeholder="Digite o tamanho da quadra">        
            </h2>
            <h2> Limite de Jogadores na Quadra: 
                <input type:"text" name="Qtd_Jog" placeholder="00">
            </h2>
            <h2> Valor Fixo da Quadra:
                <input type="text" name="Valor_Quadra" placeholder="000,00">
            </h2>
            <h2> Selecione o Tipo da quadra:
                <select name="Tipo_Quadra">
                    <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM tipoq');
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Tipo. '">' .$row->Descricao. '</option>';
                        }
                    ?>
                </select>
            </h2>
                <input type= "submit" value="Enviar" id = "btEnvia">
        </form>
        <?php
            $Arena = $_POST['Arena'];
            $Desc_Quadra = $_POST['Desc_Quadra'];
            $Tam_Quadra = $_POST['Tam_Quadra'];
            $Qtd_Jog = $_POST['Qtd_Jog'];
            $Valor_Quadra = $_POST['Valor_Quadra'];
            $Tipo_Quadra = $_POST['Tipo_Quadra'];
            //echo 'Arena ='.$Arena.' | Desc = '.$Desc_Quadra. ' | Tam = '.$Tam_Quadra. '  |  Qtd = '.$Qtd_Jog. '  |  Valor = '.$Valor_Quadra. '  |  Tipo = '.$Tipo_Quadra. '  |  ';

            if($Arena == "" || $Desc_Quadra == "" || $Tam_Quadra == "" || $Qtd_Jog == "" || $Valor_Quadra == "" || $Tipo_Quadra == ""){
                //echo 'tem coisa vazia aí!!!';
            }else{
                //echo 'tudo certo, bora cadastrar!';
                //Realiza o cadastro
            $stmt = $con->prepare("INSERT INTO quadra (Descricao, Tamanho, Qtd_Jogadores, Valor_Fixo, Tipo, Arena) VALUES (?,?,?,?,?,?)");
            $stmt->bindParam(1,$Desc_Quadra);
            $stmt->bindParam(2,$Tam_Quadra);
            $stmt->bindParam(3,$Qtd_Jog);
            $stmt->bindParam(4,$Valor_Quadra);
            $stmt->bindParam(5,$Tipo_Quadra);
            $stmt->bindParam(6,$Arena);
            $result = $stmt->execute();

            if(! $result){
            var_dump($stmt->errorInfo());
            exit;
            }
            }

            
        ?>
        <!-- Fim Cadastro -->

        <!-- Inicio Busca - cRud -->
        <h2> BUSCA GERAL DE QUADRAS </h2>
        <table border="1" width="250px" align="center">
            <tr>
                <th><strong>Arena</strong></th>
                <th><strong>Desc</strong></th>
                <th><strong>Tipo</strong></th>
                <th><strong>Tam</strong></th>
                <th><strong>Jogadores</strong></th>
                <th><strong>Valor</strong></th>
            </tr>
            <?php
                //executa um select
                $rs = $con->query('SELECT arena.Nome_Arena AS NomeArena, quadra.Descricao, tipoq.Descricao AS DescTipo, quadra.Tamanho, quadra.Qtd_Jogadores, quadra.Valor_Fixo FROM quadra INNER JOIN tipoq ON Tipo = tipoq.Cod_Tipo INNER JOIN arena ON Arena = arena.Cod_Arena;');  
                while($row = $rs->fetch( PDO::FETCH_OBJ )){
                    echo '<tr>';
                    echo '<td>'.$row->NomeArena. '</td>';
                    echo '<td>'.$row->Descricao. '</td>';
                    echo '<td>'.$row->DescTipo. '</td>';
                    echo '<td>'.$row->Tamanho. '</td>';
                    echo '<td>'.$row->Qtd_Jogadores. '</td>';
                    echo '<td>R$'.$row->Valor_Fixo. '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <!-- Fim Busca -->

        <!-- Inicio Alteração - crUd -->
        <h2> ALTERAÇÃO DE QUADRAS </h2>
        <table>
            <tr>
                <td>
                    Selecione o Tipo:
                </td>
                <td>
                    <select name="tipoQ">
                        <?php
                            //executa um select
                            $rs = $con->query('SELECT * FROM tipoq');
                            echo '<option value=0 selected>SELECIONE</option>';
                            while($row = $rs->fetch( PDO::FETCH_OBJ )){
                                echo '<option value="'.$row->Cod_Tipo. '">' .$row->Descricao . '</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        Continua...
        <!-- Fim Alteração -->

        <!-- Inicio Exclusão - cruD -->
        <h2> EXCLUSÃO DE QUADRAS </h2>
        <table>
            <tr>
                <td>
                    Selecione o Tipo:
                </td>
                <td>
                    <select name="tipoQ">
                        <?php
                            //executa um select
                            $rs = $con->query('SELECT * FROM tipoq');
                            echo '<option value=0 selected>SELECIONE</option>';
                            while($row = $rs->fetch( PDO::FETCH_OBJ )){
                                echo '<option value="'.$row->Cod_Tipo. '">' .$row->Descricao . '</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        Continua...                       
        <!-- Fim Exclusão -->
    </body>
