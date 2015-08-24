<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>FEDESIPA 4 - PAINEL DE CONTROLE</title>
    <link rel="stylesheet" type="text/css" href="css/view.css" media="all">
    <script type="text/javascript" src="js/view.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
</head>

<body id="main_body" >

<img id="top" src="img/top.png" alt="">
<img style="position: absolute; margin-left: 100px; width: 189px;" src="img/logo%20fedesipa.png">
<div id="form_container">

    <h1><a>Fedesipa SisCad</a></h1>
    <form id="form_1044499" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2> Painel de Controle</h2>
            <p> Area do administrador.</p>
        </div>

<ul>
    <li id="li_1">
        <input type="button" value="Adicionar Associado" size="30" onclick="window.location='addassociado.php';" style="width: 200px;">

    </li>
    <li id="li_2">
        <input type="button" value="Adicionar Dependentes " size="30" style="width: 200px;" >
    </li>
    <li id="l1_3">
    <li id="l1_6">
        <input type="button" value="Lista de associados " size="30" style="width: 200px;" onclick="window.location='view/listadeassociados.php';">
    </li>
    <li id="l1_4">
        <input type="button" value="Mensalidades " size="30" style="width: 200px;">
    </li>
    <li id="l1_5">
        <input type="button" value="Usuarios " size="30" style="width: 200px;">
    </li>
</ul>
    <div id="footer">
    </div>
    </form>
</div>

<img id="bottom" src="img/bottom.png" alt="">
</body>
</html>
</html>