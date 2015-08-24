<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 23/08/2015
 * Time: 04:57
 */
include "../conection.inc";

$sql = "SELECT * FROM associados";



//$array = mysqli_fetch_array($query);

function status($status){
    if($status == 0){
        return "Inativo";
    }
    elseif($status == 1){
        return "Ativo";
    }
    else{
        return "Inativo";
    }
}
function depedentes($dep){
    return $dep;
}


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
        .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
    </style>
</head>

<body id="main_body" >

<img id="top" src="../img/top.png" alt="">
<img style="position: absolute; margin-left: 100px; width: 189px;" src="../img/logo%20fedesipa.png">
<div id="form_container">

    <h1><a>Fedesipa SisCad</a></h1>
    <form id="form_1044499" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2> Painel de Controle</h2>
            <p>Lista de Associados.</p>
        </div>
        <div class="datagrid">
            <?php
        if($query = mysqli_query($com, $sql))
        {$linhas = 1;
            $rows = mysqli_num_rows($query);
            echo "Total de Associados: ".$rows. "  "."Total Ativo: ".$totalAtivos;
echo "<table><thead><tr><th>Nome</th><th>Status</th><th>Nº Cartão</th><th>Dep</th><th>Mensalidades</th><th>Editar</th></tr></thead>";
        while($assoc = mysqli_fetch_assoc($query))
        {
      echo    "<tbody><tr><td>".$assoc['nome']."</td><td>".status($assoc['status'])."</td><td>".$assoc['registro']."</td><td>".depedentes(0)."</td><td>"."<a href='#'>Mensalidades</a>"."</td><td>"."<a href='#'>Atualizar</a>"."</td></tr></tbody>";
        }
echo "</table>";

        }
        mysqli_close($com);
?>
        </div>
        <div id="footer">
    </div>
    </form>
</div>

<img id="bottom" src="../img/bottom.png" alt="">
</body>
</html>
</html>