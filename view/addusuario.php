<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 26/08/2015
 * Time: 00:13
 */
include "../conection.inc";
if(isset($_POST['form_id'])) {
    $unome = $_POST['U_nome'];
    $uuser = $_POST['U_user'];
    $usenha = $_POST['U_senha'];
    $univel = $_POST['U_nivel'];
    $ustatus = $_POST['U_status'];

    $insert = "INSERT INTO usuarios VALUE (null, '$unome', '$uuser', '$univel', '$usenha', '$ustatus' )";

    $userquery = mysqli_query($com, $insert);
    $usercad = mysqli_affected_rows($com);
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>FEDESIPA - ADICIONAR USUÁRIO</title>
    <link rel="stylesheet" type="text/css" href="../css/view.css" media="all">
    <script type="text/javascript" src="../js/view.js"></script>
    <script type="text/javascript" src="../js/calendar.js"></script>
</head>
<body id="main_body" >

<img id="top" src="../img/top.png" alt="">
<img style="position: absolute; margin-left: 100px; width: 189px;" src="../img/logo%20fedesipa.png">
<div id="form_container">

    <h1><a>Adicionar USUÁRIO</a></h1>
    <form id="form_1044499" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2>Adicionar Usuário</h2>
            <p>Preenche todos os campos.</p>
            <?php
            if(isset($usercad)) {
                if ($usercad == 1) {
                    echo "<p style='color: #22a20b;'>Cadastro relizado com sucesso</p>";
                }
            }
            ?>
</div>
<ul >

    <li id="li_1" >
        <label class="description" for="element_1">Nome </label>
		<span>
			<input id="element_1_1" name="U_nome" class="element text"  maxlength="255" size="38" required/>
			<label>Nome completo</label>
    </li>		<li id="li_2" >
        <label class="description" for="element_2">Nome de usuário</label>
        <div>
            <input id="element_2" name="U_user" class="element text medium" type="text" maxlength="255" value="" required/>
        </div>
    </li>
    <li id="li_10" >
        <label class="description" for="element_10">Nível de acesso</label>
        <div>
            <select class="element select medium" id="element_10" name="U_nivel" required>
                <option value="" selected="selected"></option>
                <option value="1" >Parceiro</option>
                <option value="5" >Administrador</option>

            </select>
        </div>
    </li>		<li id="li_4" >
        <label class="description" for="element_4">Senha</label>
        <div>
            <input id="element_4" name="U_senha" class="element text medium" type="password" maxlength="20" value="" required/>
            <label for="element_6_1">somente numeros</label>
        </div>
    </li>


    <li id="li_10" >
        <label class="description" for="element_10">Status </label>
        <div>
            <select class="element select medium" id="element_10" name="U_status" required>
                <option value="1" >Ativo</option>
                <option value="0" selected="selected">Inativo</option>

            </select>
        </div>
    </li>

    <li class="buttons">
        <input type="hidden" name="form_id" value="1044499" />

        <input id="saveForm" class="button_text" type="submit" name="submit" value="Cadastrar" />  <input type="button" value="Listar Usuários" size="30" onclick="window.location='usuarios.php?get_user=Listar+Usu%C3%A1rio';" style="width: 200px;">

    </li>
</ul>
</form>
<div id="footer">
</div>
</div>
<img id="bottom" src="../img/bottom.png" alt="">
</body>
</html>