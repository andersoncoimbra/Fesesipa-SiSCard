<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 21/08/2015
 * Time: 00:03
 */
$com = mysqli_connect("localhost","root","");
mysqli_select_db($com, "fedesipa");

////////////////
//Total Ativos
///////////////
$sqlStatus = "SELECT * FROM associados WHERE status = 1";
$selectStatus = mysqli_query($com,$sqlStatus);
$totalAtivos = mysqli_num_rows($selectStatus);