<?php
$_SESSION["SesID"]=session_id()
session_start();
?>
<!Doctype Html>
<Html Lang="Cs">
<Head>
<Meta Charset="Utf-8">
<Meta Name="Application-name" Content="Přihláška na VŠ">
<Meta Name="Author" Content="Pavel Dvořák, 8.O">
<Meta Name="Description" Content="Online přihláška ke studiu na vysoké škole vytvořená ke zjednodušení vyplňování, tisku a následném zasílání">
<Meta Name="Keywords" Content="přihláška,VŠ,formuláře,PHP,vysoké školy">
<Meta Name="Robots" Content="Follow,index">
<Meta Name="Viewport" Content="width=device-width">
<Link Type="Image/x-icon" Rel="Shortcut icon" Href="/favicon.ico">
<Link Rel="Stylesheet" Href="/aplikace/mfglabs_iconset.css">
<Link Type="Text/css" Rel="Stylesheet" Href="http://fonts.googleapis.com/css?family=Ubuntu|Open+Sans&subset=latin,latin-ext">
<Style Type="Text/css">
Body{Background-color:#FFBF00;Color:#242424;Font-family:Ubuntu,"Open Sans",sans-serif;Margin:0}
A{Color:#242424;Text-decoration:none}
Button{Background-color:#242424;Border:0;Border-radius:0.25em;Color:#FFBF00;Cursor:pointer;Font-size:1em;Margin:1em 0;Padding:0.5em 2em;Text-transform:uppercase}
A:hover,A:active,Button:hover,Button:active{Text-shadow:0 0 0.5em}
Button:hover,Button:active{Box-shadow:0 0 0.5em #242424}
Form{Margin:auto;Position:absolute;Left:10%;Right:10%}
Header H1{Margin:0.5em 0}
Input{Border:1px solid silver;Border-radius:0.25em;Box-shadow:inset 0 1px 1px rgba(0,0,0,0.1);Padding:0.5em;Width:18em}

@media (orientation:landscape){
Form{Left:18%;Right:18%}
Footer{Margin:auto;Position:absolute;Z-index:-1;Left:0;Bottom:0;Right:0}
}
</Style>
<!--[if lt IE 10]><Script Src="/aplikace/html5shiv.js"></Script><![endif]-->
<Title>Přihláška</Title>
</Head>
<Body>

<Form Action="/nova/zpracovani.php<?php echo $_SESSION["c"]; ?>" Method="Post">
<Header>
<H1><I Class="icon-magnifying icon3x"></I><Br>Upravit</H1>
Vložte prosím svůj kód:
<Br>
<Input Name="" Type="Text" Value="<?php echo !empty($_SESSION["SesID"])?$_SESSION["SesID"]:""; ?>">
<Input Name="" Type="Text" Value="<?php echo !empty($_SESSION["RCislo"])?$_SESSION["RCislo"]:""; ?>">
<Button Name="" Type="Submit" Value="nova/?">Načíst</Button>
</Header>
</Form>

<Footer>
<Endora>
</Footer>
</Body>
</Html>