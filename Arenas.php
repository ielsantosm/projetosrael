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
        <h1>ARENAS</h1>
        <h2>CADASTRO DE ARENAS</h2>
        <h1></h1>
        <!-- Inicio Cadastro - Crud -->
         
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            </h2>
            <h2> Nome da Arena: 
                <input type="text" name="Nome_Arena" placeholder="Digite o nome da Arena">
            </h2>
            <h2> Endereço:</h2>
                <h3><input type="text" name="Rua" placeholder="Rua/Avenida">
                    <input type="text" name="Bairro" placeholder="Bairro">
                </h3>
                <h3><input type="text" name="Num" placeholder="S/N">
                    <input type="text" name="Complemento" placeholder="Complemento">
                </h3>
                <h3>
                    <select name="Estado">
                        <?php
                            //executa um select
                            $rs = $con->query('SELECT * FROM estado');
                            echo '<option value=0 selected>Estado</option>';
                            while($row = $rs->fetch( PDO::FETCH_OBJ )){
                                echo '<option value="'.$row->Cod_Estado. '">' .$row->Descricao. '</option>';
                            }
                        ?>
                    </select>
                    <select name="Cidade">
                        <?php
                            //executa um select
                            $rs = $con->query('SELECT * FROM cidade');
                            echo '<option value=0 selected>Cidade</option>';
                            while($row = $rs->fetch( PDO::FETCH_OBJ )){
                                echo '<option value="'.$row->Cod_Cidade. '">' .$row->Descricao. '</option>';
                            }
                        ?>
                    </select>
                </h3>
            </h2>
            <h2> Contato 
                <p><input type="text" name="Responsavel" placeholder="Responsável"></p>
                <p>
                    <select name="ddd1">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM ddd');
                        echo '<option value=0 selected>00</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->cod_DDD. '">' .$row->Num . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="Telefone1" placeholder="Telefone Principal">
                </p>
                <p>
                    <select name="ddd2">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM ddd');
                        echo '<option value=0 selected>00</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->cod_DDD. '">' .$row->Num . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="Telefone2" placeholder="Telefone Secundário">
                </p>
            </h2>
                <input type= "submit" value="Enviar" id = "btEnvia">
        </form>
        <?php
            $Nome_Arena = $_POST['Nome_Arena'];
            $Rua = $_POST['Rua'];
            $Bairro = $_POST['Bairro'];
            $Num = $_POST['Num'];
            $Complemento = $_POST['Complemento'];
            $Estado = $_POST['Estado'];
            $Cidade = $_POST['Cidade'];
            $Responsavel = $_POST['Responsavel'];
            $ddd1 = $_POST['ddd1'];
            $Tel1 = $_POST['Telefone1'];
            $ddd2 = $_POST['ddd2'];
            $Tel2 = $_POST['Telefone2'];
            $DDD_Tel1 = "( {$ddd1} ) {$Tel1}";
            //$DDD_Tel2 = $ddd2 + $Tel2;
            echo $DDD_Tel1;
            /*echo 'Arena = '.$Nome_Arena .'  |  
                '. $Rua . $Bairro . $Num . $Complemento . $Estado . $Cidade . '  |  
                '. $Responsavel . '(' . $ddd1 . ')' . $Tel1 . '  |  
                '. '(' . $ddd2 . ')' . $Tel2;
            
            if($Nome_Arena == "" || $Rua == "" || $Bairro == "" || $Num == "" || $Complemento == "" || $Estado == "" || $Cidade == "" || $Responsavel == "" || $ddd1 = "" || $Tel1 == "" || $ddd2 = "" || $Tel2 == ""){
                //echo 'tem coisa vazia aí!!!';
            }else{
                //echo 'tudo certo, bora cadastrar!';
                    //Realiza o cadastro
                $stmt = $con->prepare("INSERT INTO arena (Nome_Arena, Rua, Bairro, Num, Complemento, Estado, Cidade, Responsavel, Telefone1, Telefone2) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1,$Nome_Arena);
                $stmt->bindParam(2,$Rua);
                $stmt->bindParam(3,$Bairro);
                $stmt->bindParam(4,$Num);
                $stmt->bindParam(5,$Complemento);
                $stmt->bindParam(6,$Estado);
                $stmt->bindParam(7,$Cidade);
                $stmt->bindParam(8,$Responsavel);
                $stmt->bindParam(9,$DDD_Tel1);
                $stmt->bindParam(10,$DDD_Tel2);
                $result = $stmt->execute();

                if(! $result){
                var_dump($stmt->errorInfo());
                exit;
                }
            }*/

        ?>
    </body>
