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

////////////////
//Total Usuarios
///////////////
$sqlUsers = "SELECT * FROM usuarios";
$selectUsers = mysqli_query($com,$sqlUsers);
$totalUsers = mysqli_num_rows($selectUsers);

////////////////
//Total Usuarios Ativos
///////////////
$sqlUsersAtv = "SELECT * FROM usuarios WHERE status = 1";
$selectUsersAtv = mysqli_query($com,$sqlUsersAtv);
$totalUsersAtv = mysqli_num_rows($selectUsersAtv);

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
////////////////////////////////
//Verefique o numero de depedente
///////////////////////////////
function depedentes($dep){
    return $dep;
}
////////////////////////////////
//Indentifica o nivel do usuario
///////////////////////////////
function nivel($nivel){
    switch($nivel){
        case 1:
            return "Parceiro";
            break;
        case 5:
            return "Administrador";
            break;
    }
    }
////////////////////////////////
//Verefica as credencias do usuario
///////////////////////////////
function isUser($user, $senha){

    $sqlIsUsers = "SELECT * FROM usuarios WHERE username = '$user' AND senha = '$senha'";
    $selectisUsers = mysqli_query(mysqli_connect("localhost","root","","fedesipa"),$sqlIsUsers); //Troca para acesso do servidor
      $IsUser = mysqli_num_rows($selectisUsers);
    if($IsUser == 1){
        return true;
    }else{
        return false;
    }
}