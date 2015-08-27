<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 20/08/2015
 * Time: 03:41
 */
include "conection.inc";
if(isset($_POST['login_id'])){
    $l_login = $_POST['L_user'];
    $l_senha = $_POST['L_Senha'];

    if(isUser($l_login, $l_senha)){
        $acesso = "<p style='color: greenyellow;'>Acesso Permitido</p>";
        header("Location: dashboard.php"); exit;
    }else{
        $acesso = "<p style='color: red;'>Acesso Negado</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>FEDESIPA - ACESSO</title>
    <link rel="stylesheet" type="text/css" href="css/view.css" media="all">
    <script type="text/javascript" src="js/view.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
</head>
<body id="main_body" >

<img id="top" src="img/top.png" alt="">
<img style="position: absolute; margin-left: 100px; width: 189px;" src="img/logo%20fedesipa.png">
<div id="form_container">

    <h1><a>Adicionar Associado</a></h1>
    <form id="form_1044499" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2>Area de Parceiro</h2>
            <p>Login de acesso.</p>
            <?php
            echo @$acesso;
            ?>

        </div>
        <ul >

            <li id="li_1" >
                <label class="description" for="element_1">Username </label>
		<span>
			<input id="element_1_1" name="L_user" class="element text"  maxlength="50" size="37" value="<?php @$l_login?>" placeholder="Nome de usuario" required/>
			<label>Nome completo</label>
            </li>		<li id="li_2" >
                <label class="description" for="element_2">Senha </label>
                <div>
                    <input id="element_2" name="L_Senha" class="element text medium" type="password" maxlength="20" size="20" value="<?php @$l_senha?>" placeholder="Senha" required/>
                </div>
            </li>

            <li class="buttons">
                <input type="hidden" name="login_id" value="666777" />

                <input id="saveForm" class="button_text" type="submit" name="submit" value="Login" />
            </li>
        </ul>
    </form>
    <div id="footer">
    </div>
</div>
<img id="bottom" src="img/bottom.png" alt="">
</body>
</html>
