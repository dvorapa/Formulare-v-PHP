<?php
/* ___                            ______ __  */
/*  _/ _  _ _  _ _    _/ _ /  |__| |  | |__) */
/* /__|_)| (_|(_(_)\/(_|| )|  |  | |  | |    */
/*    |                                      */
session_start();
$_SESSION["PoleHodnot"]=array(
/*Úvod*/
"AkadRok","Program","Forma","Jazyk",
/*Vysoká škola*/
"VSkola","VFakulta","VProgram","VOborA","VOborB","VOborC",
/*Osobní údaje*/
"Jmeno","Prijmeni","Rodne","Tituly","Pohlavi","StatniPris",
/*Narození*/
"DatumNar","MistoNar","OkresNar","CisloOP","RCislo","CisloP",
/*Adresa trvalého bydliště*/
"TUlice","TCislo","TCast","TObec","TOkres","TPSC","TTel","TPosta","TStat",
/*Kontaktní adresa*/
"KUlice","KCislo","KCast","KObec","KOkres","KPSC","KTel","KPosta","KStat",
/*Střední škola*/
"SSkola","SAdresa","SJObor","SJKOV","SKObor","SKKOV","SIZO","SRokMat",
/*Uchazeč se hlásí*/
"Odkud",
/*Zájmová činnost*/
"Zajmy",
/*Průběh zaměstnání*/
"Zamestnavatel","Zarazeni","ZOd","ZDo",
/*Předchozí vysoká škola*/
"PSkola","PFakulta","PProgram","PObor","POd","PDo","PTitul"
);
/*Prospěch*/
for($i=1;$i<28;$i++){
$_SESSION["PoleHodnot"][]="Predmet".$i;
$_SESSION["PoleHodnot"][]="Maturita".$i;
for($j=1;$j<6;$j++){
$_SESSION["PoleHodnot"][]="Predmet".$i."Rocnik".$j;
}}

/*  __                                    */
/* |__)_˅_ _ . _   _| _    _ _ _ _. _  _  */
/* |  | (-|_)|_)  (_|(_)  _)(-_)_)|(_)| ) */
/*        |                               */
if(!empty($_POST)){
foreach($_SESSION["PoleHodnot"] as $Promenna){
if(!empty($_POST[$Promenna])){
$_SESSION[$Promenna]=$_POST[$Promenna];
}}}

/*                               */
/* \  / /|_  _˅_  |  _ | _|  _ _ */
/*  \/ \/|_)(-|   |((_)|(-|((_(- */
/*     /                         */
foreach($_POST as $Kolekce){
if((is_array($Kolekce))&&(array_key_exists("Kam",$Kolekce))){

/* ___                                 */
/*  _/ _/ _ . _   _| _    _ _  _ | . _ */
/* /__(_||_)|_)  (_|(_)  (_(_)(_)|(|(- */
/*       |                             */
if(array_key_exists("Cookie",$Kolekce)){
$_SESSION["d"]=time()+60*60*24*$Kolekce["Cookie"];
foreach($_SESSION["PoleHodnot"] as $Promenna){
if(!empty($_POST[$Promenna])){
setcookie($Promenna,$_SESSION[$Promenna],$_SESSION["d"]);
}}}

/* ___                                         */
/*  _/ _/ _ . _   _| _    _| _ |_ _ |_  _/_  _ */
/* /__(_||_)|_)  (_|(_)  (_|(_||_(_||_)(_|/_(- */
/*       |                                     */
if(array_key_exists("Databaze",$Kolekce)){
$Databaze=mysqli_connect("localhost","dvorapa","cepetauhacac","databazeprihlasek");
$Sklad="insert into Prihlasky set ";
foreach($_SESSION["PoleHodnot"] as $Promenna){
if(!empty($_POST[$Promenna])){
$_SESSION[$Promenna]=mysqli_real_escape_string($Databaze,$_SESSION[$Promenna]);### Chyba v kódování
$Sklad.="$Promenna='{$_SESSION[$Promenna]}',";
}}
$Sklad.="PHPSESSID='".session_id()."'";
mysqli_query($Databaze,$Sklad);
mysqli_close($Databaze);
}

/* ___                                       */
/*  _/ _/ _ . _   _| _    _ _    |_  _  _    */
/* /__(_||_)|_)  (_|(_)  _)(_)|_||_)(_)| |_| */
/*       |                                   */
if(array_key_exists("Soubor",$Kolekce)){
$Sklad=file_get_contents("predloha.php");
$Funkce=fopen("../export/".session_id().".php".$_SESSION["c"],"w+");
fwrite($Funkce,$Sklad);
fclose($Funkce);
}

/*  __                          */
/* |__)_˅_ _ _  _˅_ _    _/ _ / */
/* |  | (-_)|||(-| (_)\/(_|| )| */
/*                              */
header("Location: ".$Kolekce["Kam"].$_SESSION["c"]);
}}
?>