<?php
/* ___                                 */
/*  _/ _  _ _  _ _    _/ _  /  _| _ |_ */
/* /__|_)| (_|(_(_)\/(_|| )|  (_|(_||_ */
/*    |                                */
if(!empty($_POST["ID"])){
session_id($_POST["ID"]);
session_start();
if(!isset($_COOKIE["Cookie"])){
$_SESSION["c"]="?".htmlspecialchars(SID)."&Cookie";
}else{
$_SESSION["c"]="?Cookie";
}}else{
header("Location: /prihlaska/chyba.php?Kod=2");
}
/*                                 */
/* \  / / _ . _  _    _ _  _ | . _ */
/*  \/ \/|_)|_)  /_  (_(_)(_)|(|(- */
/*     / |                         */
$Pole=array(
/*Úvod*/"AkadRok","Program","Forma","Jazyk",
/*Vysoká škola*/"VSkola","VFakulta","VProgram","VOborA","VOborB","VOborC",
/*Osobní údaje*/"Jmeno","Prijmeni","Rodne","Tituly","Pohlavi","StatniPris",
/*Narození*/"DatumNar","MistoNar","OkresNar","CisloOP","RCislo","CisloP",
/*Adresa trvalého bydliště*/"TUlice","TCislo","TCast","TObec","TOkres","TPSC","TPosta","TStat",
/*Kontaktní adresa*/"KUlice","KCislo","KCast","KObec","KOkres","KPSC","KPosta","KStat",
/*Střední škola*/"SSkola","SAdresa","SObor","SKKOV","SIZO","SRokMat",
/*Uchazeč se hlásí*/"Odkud",
/*Zájmová činnost*/"Zajmy",
/*Průběh zaměstnání*/"Zamestnavatel","Zarazeni","ZOd","ZDo",
/*Předchozí vysoká škola*/"PSkola","PFakulta","PProgram","PObor","POd","PDo","PTitul",
/*Kontakt*/"Telefon","Email"
);
/*Prospěch*/
for($i=1;$i<=27;$i++){
$Pole[]="Predmet".$i;
$Pole[]="Maturita".$i;
for($j=1;$j<=5;$j++){
$Pole[]="Predmet".$i."Rocnik".$j;
}}
if(!empty($_COOKIE)){
foreach($Pole as $Promenna){
if(!empty($_COOKIE[$Promenna])){
$_SESSION[$Promenna]=$_COOKIE[$Promenna];
}}}else{
header("Location: /prihlaska/chyba.php?Kod=3");
}
/*  __                          */
/* |__)_˅_ _ _  _˅_ _    _/ _ / */
/* |  | (-_)|||(-| (_)\/(_|| )| */
/*                              */
header("Location: /prihlaska/nova/".$_SESSION["c"]);
?>