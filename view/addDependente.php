<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 01/09/2015
 * Time: 07:59
 */

include ("../conection.inc");

if(isset($_POST['form_id'])) {
    $dNome = $_POST['D_nome'];
    $dNasc = $_POST['D_datanascYYYY']."-".$_POST['D_datanascMM']."-".$_POST['D_datanascDD'];
    $dParent = $_POST['D_parentesco'];
    $dAssoc = rgToid($_GET['D_assoc']);

    $insert = "INSERT INTO parentesco VALUES (NULL, '$dAssoc', '$dNome', '$dNasc', '$dParent')";
    $query = mysqli_query($com, $insert);
    $depcad = mysqli_affected_rows($com);
}


?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title> FEDESIPA - ADICIONAR DEPENDENTE</title>
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

    
    <h1><a> Adicionar USUÁRIO</a></h1>
        <div class="form_description">
            <h2> Adicionar Dependente</h2>
            <p> Preenche todos os campos.</p>
            <?php
            if(isset($depcad)) {
                if ($depcad == 1) {
                    echo "<p style='color: #22a20b;'>Cadastro relizado com sucesso</p>";
                }
            }
            ?>
        </div>

        <form method="get" class="appnitro" action="">
            <label for="D_assoc">Selecionar Associado</label>
            <input id="D_assoc" type="text" name="D_assoc" placeholder="RG do associado" value="<?php echo @$_GET['D_assoc']?>">
            <input type="submit" value="BUSCA">
        </form>
    <form id="form_1044499" class="appnitro"  method="post" action="">
        <?php
if(isAssoc(@$_GET['D_assoc'])){

    getDep($_GET['D_assoc']);

       print("
 <form id='form_1044499' class='appnitro'  method='post' action=''>
 <ul >
             <li id='li_1' >
                <label class='description' for='element_1'>Nome </label>
		<span>
			<input id='element_1_1' name='D_nome' class='element text'  maxlength='255' size='38' required/>
			<label>Nome completo</label>
            </li>
        <li id='li_3' >
            <label class='description' for='element_3'>Data de nascimento </label>
		<span>
            <input id='element_3_2' name='D_datanascDD' class='element text' size='2' maxlength='2' value='' type='number'> /
			<label for='element_3_2'>DD</label>

		</span>
		<span>
			<input id='element_3_1' name='D_datanascMM' class='element text' size='2' maxlength='2' value='' type='number'> /
			<label for='element_3_1'>MM</label>
		</span>
		<span>
	 		<input id='element_3_3' name='D_datanascYYYY' class='element text' size='4' maxlength='4' value='' type='number'>
			<label for='element_3_3'>YYYY</label>
		</span>

		<span id='calendar_3'>
			<img id='cal_img_3' class='datepicker' src='../img/calendar.gif' alt='Pick a date.'>
		</span>
            <script type='text/javascript'>
                Calendar.setup({
                    inputField	 : 'element_3_3',
                    baseField    : 'element_3',
                    displayArea  : 'calendar_3',
                    button		 : 'cal_img_3',
                    ifFormat	 : '%B %e, %Y',
                    onSelect	 : selectDate
                });
            </script>

        </li>
        <li id='li_10' >
                <label class='description' for='element_10'>Grau de Parentesco </label>
                <div>
                    <select class='element select medium' id='element_10' name='D_parentesco' required>
                        <option value='Mâe' >Mae</option>
                        <option value='Pai' selected='selected'>PAI</option>
                        <option value='Filho' >Filho</option>
                        <option value='Filha'>Filha</option>
                        <option value='Sobrinho' >Sobrinho</option>
                        <option value='Sobrinha' >Sobrinha</option>
                        <option value='Tio' >Tio</option>
                        <option value='Tia' >Tio</option>
                        <option value='Marido' >Marido</option>
                        <option value='Esposa' >Esposa</option>
                        <option value='Irmão' >Irmão</option>
                        <option value='Irmã' >Irmã</option>
                        <option value='Primo' >Primo</option>
                        <option value='Prima' >Prima</option>
                        <option value='Sogro' >Sogro</option>
                        <option value='Sogra' >Sogra</option>
                        <option value='Outros' >Outros</option>

                    </select>
                </div>
            </li>

            <li class='buttons'>
                <input type='hidden' name='form_id' value='677' />

                <input id='saveForm' class='button_text' type='submit' name='submit' value='Cadastrar' />
            </li>
        </ul>
        </form>
");  }else{echo "<p style='color: #22a20b;'>Busque por um associado para adicionar dependentte</p>";}
?>

    <div id="footer">
    </div>
</div>
<img id="bottom" src="../img/bottom.png" alt="">
</body>
</html>