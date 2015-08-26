<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 26/08/2015
 * Time: 00:00
 */

include "../conection.inc";

$sqluser = "SELECT * FROM usuarios";

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>FEDESIPA - PAINEL DE CONTROLE</title>
    <link rel="stylesheet" type="text/css" href="../css/view.css" media="all">
    <script type="text/javascript" src="../js/view.js"></script>
    <script type="text/javascript" src="../js/calendar.js"></script>
    <style>
        .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {margin-top: 20px; font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
    </style>
</head>

<body id="main_body" >

<img id="top" src="../img/top.png" alt="">
<img style="position: absolute; margin-left: 100px; width: 189px;" src="../img/logo%20fedesipa.png">
<div id="form_container">
    <form id="form_1044499" class="appnitro"  method="get" action="">

    <h1><a>Fedesipa SisCad</a></h1>
        <div class="form_description">
            <h2> Painel de Controle de Usuário</h2>
            <p>Area do administrador.</p>
        </div>

        <ul style="list-style: outside none none;">
            <li id="li_1">
                <input type="button" value="Adicionar Usuário" size="30" onclick="window.location='addusuario.php';" style="width: 200px;">
            </li>
            <li>

                <input type="submit" value="Listar Usuário" name="get_user" size="30" style="width: 200px;">
            </li></ul>


        <?php
        if(isset($_GET['get_user'])) {
            echo "<div class='datagrid'>";
            if ($query = mysqli_query($com, $sqluser)) {
                $linhas = 1;
                $rows = mysqli_num_rows($query);
                echo "Total de Usuários: " . $totalUsers . "  " . "Total Ativo: " . $totalUsersAtv;

                echo "<table><thead><tr><th>Nome</th><th>Tipo</th><th>Status</th><th>Username</th><th>Editar</th></tr></thead>";
                while ($assoc = mysqli_fetch_assoc($query)) {
                    echo "<tbody><tr><td>" . $assoc['nome'] . "</td><td>" . nivel($assoc['nivel']) . "</td><td>" . status($assoc['status']) . "</td><td>" . $assoc['user'] . "</td><td>" . "<a href='#'>Atualizar</a>" . "</td></tr></tbody>";
                }
                echo "</table>";
                echo "</div>";

            }
            mysqli_close($com);
        }
        ?>

    </form>
        <div id="footer">
        </div>
</div>

<img id="bottom" src="../img/bottom.png" alt="">
</body>
</html>
</html>
