<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 20/08/2015
 * Time: 03:41
 */
include "conection.inc";

 $query = mysqli_query($com, "SELECT * FROM associados");
$linhas = mysqli_num_rows($query);


echo $linhas;

?>
<h1>Teste 123</h1>
