<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 21/08/2015
 * Time: 00:03
 *
 * $com = mysqli_connect("localhost","parasite_fedesip","fedesipa");
 * mysqli_select_db($com, "parasite_fedesipa");
 */
$com = mysqli_connect("localhost","root","");
mysqli_select_db($com, "fedesipa");

////////////////
//Total Ativos
///////////////
$sqlStatus = "SELECT * FROM associados WHERE status = 1";
$selectStatus = mysqli_query($com,$sqlStatus);
$totalAtivos = mysqli_num_rows($selectStatus);

////////////////////////////////
//Verefique o status do associado
///////////////////////////////
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