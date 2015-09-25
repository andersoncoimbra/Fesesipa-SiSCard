<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 21/08/2015
 * Time: 00:03
 *
 * $com = mysqli_connect("localhost","parasite_fedesip","fedesipa");
 * mysqli_select_db($com, "parasite_fedesipa");

define('HOST','localhost');
define('USER','parasite_fedesip');
define('PASS','fedesipa');
define('BD','parasite_fedesipa');

$com = mysqli_connect(HOST,USER,PASS);
mysqli_select_db($com, BD);

$com = mysqli_connect("localhost","root","");
mysqli_select_db($com, "fedesipa");
*/

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('BD','fedesipa');

$com = mysqli_connect(HOST,USER,PASS);
mysqli_select_db($com, BD);




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
function depedentes($rg){
    $sqlnumdep = "SELECT * FROM parentesco WHERE id_associado = '".rgToid($rg)."'";

    $querynumdep = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqlnumdep);
    $numdep = mysqli_num_rows($querynumdep);

    return $numdep;
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
    $selectisUsers = mysqli_query(mysqli_connect(HOST,USER,PASS,BD),$sqlIsUsers); //Troca para acesso do servidor
      $IsUser = mysqli_num_rows($selectisUsers);
    if($IsUser == 1){
        return true;
    }else{
        return false;
    }
}
////////////////////////////////
//Verefica o tipo de usuario
///////////////////////////////
function userType($user, $senha){
    $sqlUserType = "SELECT * FROM usuarios WHERE username ='$user' AND senha = '$senha'";
    $queryUserType = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqlUserType);
    $userType = mysqli_num_rows($queryUserType);
    $usernivel = mysqli_fetch_assoc($queryUserType);
    switch($usernivel['nivel']){
        case 1:
            return 1;
        break;
        default:
            return 5;
    }
}
////////////////////////////////
//Identica se é um associado pelo RG
///////////////////////////////
function isAssoc($rg){
    $sqlAssocId = "SELECT * FROM associados WHERE rg = '$rg'";
    $queryRgToId = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqlAssocId);
  //$getAssoc = mysqli_fetch_assoc($queryRgToId);
    $getRes = mysqli_num_rows($queryRgToId);
    if($getRes == 1){
        return true;
    }else{return false;}

}
////////////////////////////////
//Identica o id do associado pelo RG
///////////////////////////////
function rgToid($rg){
    $sqlAssocId = "SELECT * FROM associados WHERE rg = '$rg'";
    $queryRgToId = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqlAssocId);
    $getAssoc = mysqli_fetch_assoc($queryRgToId);
    return $getAssoc['associados_ID'];
}
////////////////////////////////
// Lista os depedente de um associado pelo rg
///////////////////////////////
function getDep($rg){
    $sqldep = "SELECT * FROM parentesco WHERE id_associado = '".rgToid($rg)."'";
    //$queryRgToId = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqldep);
echo " <div class='datagrid'>";
    if($query = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqldep))
    {

        echo "<table><thead><tr><th>ID</th><th>Nome</th><th>Parentesco</th></tr></thead>";
        while($assoc = mysqli_fetch_assoc($query))
        {
            echo    "<tbody><tr><td>".$assoc['id']."</td><td>".$assoc['nome']."</td><td>".$assoc['parentesco']."</td></tr></tbody>";
        }
        echo "</table> </div>";

    }

}

function getAssoc($rg){
    $sqlassoc = "SELECT * FROM associados WHERE rg = '$rg'";
    //$queryRgToId = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqldep);
    echo " <div class='datagrid'>";
    if($query = mysqli_query(mysqli_connect(HOST,USER,PASS,BD), $sqlassoc))
    {

        echo "<table><thead><tr><th>Titular</th><th>Status</th><th>Registro</th><th>Dependentes</th></tr></thead>";
        while($assoc = mysqli_fetch_assoc($query))
        {
            echo    "<tbody><tr><td>".$assoc['nome']."</td><td>".status($assoc['status'])."</td><td>".$assoc['registro']."</td><td>".depedentes($assoc['rg'])."</td></tr></tbody>";
        }
        echo "</table> </div>";

    }

}