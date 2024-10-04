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
                    <li><a href="Arenas.php"><img src="img/arena.png" width="20" height="20">Arenas</a></li>
                    <li><a href="teste.php">Testes</a></li>
                    <li><a href="../phpmyadmin/">phpMyAdmin</a></li>
                </ul>
            </nav>
        </header>
        <script src="arquivos/script.js"></script>
        <!-- Fim Menu -->
        <p></p>
        <a href="Arenas.php"><img src="img/arena.png" width="100" height="100"></a>
        <a href="Quadras.php"><img src="img/quadra.png" width="100" height="100"></a>
        <!-- 
        arena.png = https://drive.google.com/file/d/11S8yN8A11qC5YayamKz33_pqUROTHk9O/view?usp=sharing
        quadra.png = https://drive.google.com/file/d/11R-Uqz7IGg0wt6zYRVpR3g06ezXE_lL9/view?usp=sharing
        agenda.png = https://drive.google.com/file/d/11TIYL7wdPe4NJyQu7wg9wXMf-oAhb-Hb/view?usp=sharing
        -->
    <h1>Tabelas Auxiliáres</h1>
    <table width="100px" align="center">
            <!-- SELECT TUDO ESTADOS -->
            <tr>
                <td>
                    Selecione o Estado:
                </td>
                <td>
                    <select name="select_estado">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM estado');
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Estado. '">' .$row->Descricao . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <!-- SELECT TUDO CIDADE -->
            <tr>
                <td>
                    Selecione a Cidade:
                </td>
                <td>
                    <select name="select_cidade">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM cidade');
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->cod_Cidade. '">' .$row->Descricao . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <!-- SELECT TUDO DDD -->
            <tr>
                <td>
                    Selecione o DDD:
                </td>
                <td>
                    <select name="select_ddd">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM ddd');
                        echo '<option value=0 selected>00</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->cod_DDD. '">' .$row->Num . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <!-- SELECT TUDO HORA -->
            <tr>
                <td>
                    Selecione a Hora:
                </td>
                <td>
                    <select name="select_horario">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM horarios');
                        echo '<option value=0 selected>00:00 - 00:00</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Horarios. '">' .$row->Descricao . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <!-- SELECT TUDO SEXO -->
            <tr>
                <td>
                    Selecione o Sexo:
                </td>
                <td>
                    <select name="sexo">
                        <?php
                        //executa um select
                        $rs = $con->query('SELECT * FROM sexo');
                        echo '<option value=0 selected>SELECIONE</option>';
                        while($row = $rs->fetch( PDO::FETCH_OBJ )){
                            echo '<option value="'.$row->Cod_Sexo. '">' .$row->Descricao . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr> 
            <!-- SELECT TUDO TIPO -->
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
    </body>

</html>