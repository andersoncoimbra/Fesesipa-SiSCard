<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 20/08/2015
 * Time: 03:41
 */
include "conection.inc";

if(isset($_POST['F_nome'])) { $vnome = $_POST['F_nome'];}
if(isset($_POST['F_registro'])){ $vregistro =$_POST['F_registro'];}
if(isset($_POST['F_nome']) && isset($_POST['F_registro'])) {
    $vdatanasc = $_POST['F_datanascYYYY']."-".$_POST['F_datanascMM']."-".$_POST['F_datanasc'];
    $vsexo = $_POST['F_sexo'];
    $vcpf = $_POST['F_cpf'];
    $vrg = $_POST['F_rg'];
    $vend = $_POST['F_end'];
    $vbairro = $_POST['F_bairro'];
    $vcidade = $_POST['F_cidade'];
    $vcep = $_POST['F_cpf'];
    if(isset($_POST['F_telefoneDDD']) && isset($_POST['F_telefone1']) && isset($_POST['F_telefone2']))
    {
    $vtelefone = $_POST['F_telefoneDDD']."-".$_POST['F_telefone1']."-".$_POST['F_telefone2'];
    }else { $vtelefone = "";}
    $vemail = $_POST['F_email'];
    if(isset($_POST['F_mae']) && isset($_POST['F_mae2']) )
    {
    $vmae = $_POST['F_mae']." ".$_POST['F_mae2'];
    }else { $vmae = "Mae nao infomada";}
}
if(isset($_POST['form_id'])) {
    $insert = "INSERT INTO associados VALUES (NULL, '$vnome','$vregistro','$vdatanasc','$vsexo',
                                               '$vcpf','$vrg','$vend','$vbairro','$vcidade',
                                                   '$vcep','$vtelefone','$vemail','$vmae')";
    $select = "SELECT * FROM associados";
    $queryb = mysqli_query($com, $select);
    $query = mysqli_query($com, $insert);


    $cad = mysqli_affected_rows($com);


    //  echo "Quantidade Inserida $cad";
    $cadb = mysqli_num_rows($queryb);
    //  echo "</br>";

    // echo "Numero de Cadastros $cadb";

}

//echo $linhas;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>FEDESIPA - ADICIONAR ASSOCIADO</title>
    <link rel="stylesheet" type="text/css" href="css/view.css" media="all">
    <script type="text/javascript" src="js/view.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
</head>
<body id="main_body" >

<img id="top" src="img/top.png" alt="">
<div id="form_container">

    <h1><a>Adicionar Associado</a></h1>
    <form id="form_1044499" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2>Adicionar Associado</h2>
            <p>Preenche todos os campos.</p>
            <?php
            if(isset($cad)) {
                if ($cad == 1) {
                    echo "<p style='color: #22a20b;'>Cadastro relizado com sucesso</p>";
                }
            }
            ?>
        </div>
        <ul >

            <li id="li_1" >
                <label class="description" for="element_1">Nome </label>
		<span>
			<input id="element_1_1" name="F_nome" class="element text"  maxlength="255" size="38" value="<?php if(isset($_POST['F_nome'])){ $_POST['F_nome'];} ?>" required/>
			<label>Nome completo</label>
            </li>		<li id="li_2" >
                <label class="description" for="element_2">Registro </label>
                <div>
                    <input id="element_2" name="F_registro" class="element text medium" type="text" maxlength="255" value="" required/>
                </div>
            </li>		<li id="li_3" >
                <label class="description" for="element_3">Data de nascimento </label>
		<span>
            <input id="element_3_2" name="F_datanasc" class="element text" size="2" maxlength="2" value="" type="number"> /
			<label for="element_3_2">DD</label>

		</span>
		<span>
			<input id="element_3_1" name="F_datanascMM" class="element text" size="2" maxlength="2" value="" type="number"> /
			<label for="element_3_1">MM</label>
		</span>
		<span>
	 		<input id="element_3_3" name="F_datanascYYYY" class="element text" size="4" maxlength="4" value="" type="number">
			<label for="element_3_3">YYYY</label>
		</span>

		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="img/calendar.gif" alt="Pick a date.">
		</span>
                <script type="text/javascript">
                    Calendar.setup({
                        inputField	 : "element_3_3",
                        baseField    : "element_3",
                        displayArea  : "calendar_3",
                        button		 : "cal_img_3",
                        ifFormat	 : "%B %e, %Y",
                        onSelect	 : selectDate
                    });
                </script>

            </li>		<li id="li_10" >
                <label class="description" for="element_10">Sexo </label>
                <div>
                    <select class="element select medium" id="element_10" name="F_sexo" required>
                        <option value="" selected="selected"></option>
                        <option value="M" >Masculino</option>
                        <option value="F" >Feminino</option>

                    </select>
                </div>
            </li>		<li id="li_4" >
                <label class="description" for="element_4">CPF </label>
                <div>
                    <input id="element_4" name="F_cpf" class="element text medium" type="number" maxlength="11" value="" required/>
                    <label for="element_6_1">somente numeros</label>
                </div>
            </li>		<li id="li_5" >
                <label class="description" for="element_5">RG</label>
                <div>
                    <input id="element_5" name="F_rg" class="element text medium" type="number" maxlength="11" value="" required/>
                </div>
            </li>		<li id="li_6" >
                <label class="description" for="element_6">Endereço </label>

                <div>
                    <input id="element_6_1" name="F_end" class="element text large" value="" type="text">
                    <label for="element_6_1">Ex: Rua presidente, nº 1000</label>
                </div>

                <div class="left">
                    <input id="element_6_3" name="F_cidade" class="element text medium" value="" type="text">
                    <label for="element_6_3">Cidade</label>
                </div>

                <div class="right">
                    <input id="element_6_4" name="F_bairro" class="element text medium" value="" type="text">
                    <label for="element_6_4">Bairro</label>
                </div>

                <div class="left">
                    <input id="element_6_5" name="F_cep" class="element text medium" maxlength="8" value="" type="text">
                    <label for="element_6_5">CEP - somente numeros</label>
                </div>

                <div class="right">
                    <select class="element select medium" id="element_6_6" name="element_6_6">
                        <option value="" selected="selected"></option>
                        <option value="Brazil" >Brasil</option>

                    </select>
                    <label for="element_6_6">País</label>
                </div>
            </li>		<li id="li_7" >
                <label class="description" for="element_7">Telefone </label>
		<span>
			<input id="element_7_1" name="F_telefoneDDD" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_7_1">(##)</label>
		</span>
		<span>
			<input id="element_7_2" name="F_telefone1" class="element text" size="3" maxlength="5" value="" type="text"> -
			<label for="element_7_2">####</label>
		</span>
		<span>
	 		<input id="element_7_3" name="F_telefone2" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_7_3">####</label>
		</span>

            </li>		<li id="li_8" >
                <label class="description" for="element_8">Email </label>
                <div>
                    <input id="element_8" name="F_email" class="element text medium" type="email" maxlength="50" value=""/>
                </div>
            </li>		<li id="li_9" >
                <label class="description" for="element_9">Mãe </label>
		<span>
			<input id="element_9_1" name= "F_mae" class="element text" maxlength="15" size="25" value=""/>
			<label>Primeiro nome</label>
		</span>
		<span>
			<input id="element_9_2" name= "F_mae2" class="element text" maxlength="15" size="14" value=""/>
			<label>Ultimo nome</label>
		</span>
            </li>

            <li class="buttons">
                <input type="hidden" name="form_id" value="1044499" />

                <input id="saveForm" class="button_text" type="submit" name="submit" value="Cadastar" />
            </li>
        </ul>
    </form>
    <div id="footer">
    </div>
</div>
<img id="bottom" src="img/bottom.png" alt="">
</body>
</html>
