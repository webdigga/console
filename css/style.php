<? 
header("Content-type: text/css; charset: UTF-8");
session_start();
include('../dbconnect.php');
$sessusercss = $_SESSION['username'];
$companyidresultcss = mysql_query("SELECT companyid FROM users WHERE username = '$sessusercss'");

while($rowcss = mysql_fetch_array($companyidresultcss)) {
	$companyidcss = $rowcss['companyid'];
	switch ($companyidcss) {		
		case 2:
			$cssImport = "@import url(\"dhl.css\");";
			break;
		case 3:
			$cssImport = "@import url(\"demo.css\");";
			break;	
		case 4:
			$cssImport = "@import url(\"unite.css\");";
			break;
	}	
}
echo $cssImport;
?>

/* =============================================================================
   HTML5 Boilerplate CSS: h5bp.com/css
   ========================================================================== */

article, aside, details, figcaption, figure, footer, header, hgroup, nav, section { display: block; }
audio, canvas, video { display: inline-block; *display: inline; *zoom: 1; }
audio:not([controls]) { display: none; }
[hidden] { display: none; }
html { font-size: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height:100%; }
html, button, input, select, textarea { font-family: Helvetica, Arial, sans-serif; color: #222; }
body { margin: 0; font-size: 1em; line-height: 1.4; }
::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
::selection { background: #fe57a1; color: #fff; text-shadow: none; }
a { color: #00e; }
a:visited { color: #551a8b; }
a:hover { color: #06e; }
a:focus { outline: thin dotted; }
a:hover, a:active { outline: 0; }
abbr[title] { border-bottom: 1px dotted; }
b, strong { font-weight: bold; }
blockquote { margin: 1em 40px; }
dfn { font-style: italic; }
hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
ins { background: #ff9; color: #000; text-decoration: none; }
mark { background: #ff0; color: #000; font-style: italic; font-weight: bold; }
pre, code, kbd, samp { font-family: monospace, serif; _font-family: 'courier new', monospace; font-size: 1em; }
pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; }
q { quotes: none; }
q:before, q:after { content: ""; content: none; }
small { font-size: 85%; }
sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
sup { top: -0.5em; }
sub { bottom: -0.25em; }
ul, ol { margin: 1em 0; padding: 0 0 0 40px; }
dd { margin: 0 0 0 40px; }
nav ul, nav ol { list-style: none; list-style-image: none; margin: 0; padding: 0; }
img { border: 0; -ms-interpolation-mode: bicubic; vertical-align: middle; }
svg:not(:root) { overflow: hidden; }
figure { margin: 0; }
form { margin: 0; }
fieldset { border: 0; margin: 0; padding: 0; }
legend { border: 0; *margin-left: -7px; padding: 0; white-space: normal; }
button, input, select, textarea { font-size: 100%; margin: 0; vertical-align: baseline; *vertical-align: middle; }
button, input { line-height: normal; }
button, input[type="button"], input[type="reset"], input[type="submit"] { cursor: pointer; -webkit-appearance: button; *overflow: visible; }
button[disabled], input[disabled] { cursor: default; }
input[type="checkbox"], input[type="radio"] { box-sizing: border-box; padding: 0; *width: 13px; *height: 13px; }
input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
input[type="search"]::-webkit-search-decoration, input[type="search"]::-webkit-search-cancel-button { -webkit-appearance: none; }
button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
textarea { overflow: auto; vertical-align: top; resize: vertical; }
input:valid, textarea:valid {  }
input:invalid, textarea:invalid { background-color: #f0dddd; }
table { border-collapse: collapse; border-spacing: 0; }
td { vertical-align: top; }
.chromeframe { margin: 0.2em 0; background: #ccc; color: black; padding: 0.2em 0; }

/* ===== Primary Styles ========================================================
   Author: David White
   ========================================================================== */

/* layout */	 
body { 
	text-align: left;
	color: #000; 
}
nav {
	float:left;
}
header {
	overflow:hidden;
}
footer {
	clear: left; 
	text-align: right;
	width: 942px;
	margin: 0 auto;
	font-size: 0.8em;
	font-style: italic;
	padding:10px;
}
nav ul li {
	background: none repeat scroll 0 0 #DDDDDD; 
	float: left;
}
nav ul li a {
	color: #000000;
	display: block;
	padding: 5px 20px;
	text-decoration: none;
}
#login-container {
	margin: 0 auto;
	padding-top: 30px;
	width: 500px;
	color:#000;
}
#container {
	margin: 0 auto; 
	width: 962px;
	overflow:hidden;
}
#container header h1 { 
	height: 65px;
	margin: 15px 0 0 0;
	padding: 0 10px 0 10px;
}
#welcome-container {
	margin: 0 auto;
	padding-top: 5px;
	width: 942px;
	padding: 5px 10px 0 10px;
	overflow:hidden;
}
#welcome-container .welcome {
	width:75%;
	float:left;
	font-style:italic;
}
#welcome-container .logout {
	width:25%;
	float:right;
	text-align:right;
	background:url('/img/door_out.png') no-repeat 100%;
}
#welcome-container .logout a {
	padding-right:25px;
}
.back {
	width:25%;
	float:right;
	text-align:right;
	background:url('/img/arrow_left.png') no-repeat 100%;
}
.back a {
	padding-right:25px;
}
#main {
	padding: 10px; 
	position: relative;
	float: left;
	width:940px;
}

/* tables */
#main table {
	width:100%; 
}
#main th {
	border:1px solid #ccc;
	padding: 3px 15px 3px 3px;
}
#main td {
	border:1px solid #ccc;
	padding:3px;
}
#main .num-rows {
	font-size:0.7em;
	font-style:italic;
}
#main .add-container {
	float: right;
	font-size: 0.9em;
	line-height: 1.15em;
	margin-bottom: 10px;
	clear:both;	
}
#main .add-record {
	float:right;
	text-align:right;
	display:block;
}
#main .add-record-label {
	float:right;
	text-align:right;
	padding-right: 10px;
	display:block;
}

/* forms */
#main form {
	width:50%;
}
#login {
	border: 1px solid #CCCCCC;
	height: 250px;
	overflow: hidden;
	position: relative;
	width: 550px;
	border-radius:10px;
	-webkit-border-radius:10px;
	-moz-border-radius:10px;	
}
.alpha-layer {
	background: none repeat scroll 0 0 #000000;
	height: 250px;
	opacity: 0.25;
	width: 550px;
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
}
#login form {
	left: 13%;
	position: absolute;
	top: 12%;
	width: 410px;
}
#login-container + footer {
	color:#000;
	width:600px;
}
#login input[type="submit"] {
	float: right;
	margin-right: 9px !important;
	width: 50%;
}

#login form input[type="submit"], .register form input[type="submit"], .add-driver form input[type="submit"] {
	margin:20px 0;
}
#login form .error-message, .register form .error-message, .add-driver form .error-message {
	color:red;
	clear:both;
}
#login label, #login input { 
	width:97%;
	border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border: 2px solid transparent;
}
.register label, .register input, .add-driver label, .add-driver input, .register button {
	clear:left;
	width:100%;
}
.buttons button {
	float:right;
	margin: 10px 0 0 0;
}
.register label span {
	font-size: 0.8em;
	font-style: italic;
}

/* table sort */
table.tablesorter {
	font-family: Helvetica, Arial, sans-serif;
	background-color: #CDCDCD;
	margin:10px 0pt 15px;
	font-size: 8pt;
	width: 100%;
	text-align: left;
}
table.tablesorter thead tr th, table.tablesorter tfoot tr th {
	background-color: #e6EEEE;
	border: 1px solid #FFF;
	font-size: 8pt;
	padding: 4px;
}
table.tablesorter thead tr .header {
	background-image: url(/img/bg.gif);
	background-repeat: no-repeat;
	background-position: center right;
	cursor: pointer;
}
table.tablesorter tbody td {
	color: #3D3D3D;
	padding: 4px;
	background-color: #FFF;
	vertical-align: top;
}
table.tablesorter tbody tr.odd td {
	background-color:#F0F0F6;
}
table.tablesorter thead tr .headerSortUp {
	background-image: url(/img/asc.gif);
}
table.tablesorter thead tr .headerSortDown {
	background-image: url(/img/desc.gif);
}
table.tablesorter thead tr .headerSortDown, table.tablesorter thead tr .headerSortUp {
	background-color: #8dbdd8;
}

/* filter */
.filter {
	position: relative;
}
#filter-arrow {
	border-bottom: 5px solid #000000;
	border-left: 5px solid transparent;
	border-right: 5px solid transparent;
	height: 0;
	opacity: 0.9;
	filter: alpha(opacity=90);
	position: absolute;
	right: 48px;
	top: 105px;
	width: 0;
	display:none;
}
#filter {
	background-image: -moz-linear-gradient(top, #000000, #3D3D3D); /* Firefox 3.6 */
	background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #3D3D3D),color-stop(1, #000000)); /* Safari & Chrome */	
	background:#000;
	border-radius: 15px 15px 15px 15px;
	opacity: 0.9;
	filter: alpha(opacity=90);
	padding: 10px;
	position: absolute;
	right: 0;
	top: 110px;
	width: 270px;
	display:none;
}
.text-filter-cont .filter-option {
	color: #FFFFFF;
	float: left;
	margin: 5px;
	width: 125px;
}
.filter-submit {
	border-top: 1px solid #CCCCCC;
	overflow: hidden;
	padding: 5px;
	width: 97%;
}
.filter-submit .submit, .filter-submit .close {
	background-image: -moz-linear-gradient(top, #6D6D6D, #484848); /* Firefox 3.6 */
	background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #484848),color-stop(1, #6D6D6D)); /* Safari & Chrome */
	filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#6D6D6D', endColorstr='#484848'); /* IE6 & IE7 */
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#6D6D6D', endColorstr='#484848')"; /* IE8 */ 
	border-radius: 5px 5px 5px 5px;
	color: #E5EEED;
	cursor: pointer;
	float: left;
	font-size: 0.9em;
	font-weight: bold;
	height: 25px;
	line-height: 2em;
	text-align: center;
	width: 70px;
}
.filter-submit .close {
	background-image: -moz-linear-gradient(top, #F4F4F4, #ECECEC); /* Firefox 3.6 */
	background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #ECECEC),color-stop(1, #F4F4F4)); /* Safari & Chrome */
	filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#F4F4F4', endColorstr='#ECECEC'); /* IE6 & IE7 */
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#F4F4F4', endColorstr='#ECECEC')"; /* IE8 */ 
	color: #838383;
	margin-left: 10px;
}
.filter-submit .not-selected {
	clear: left;
	color: red;
	display: none;
	height: 20px;
	line-height: 2em;
	text-align: center;
}
#filter .filter-option input {
	margin-right: 10px;
}
#filter .filter-option {
	color: #FFFFFF;
	float: left;
	margin: 5px;
	width: 125px;
}

/* accidents table */
#accidents-table .camera, #accidents-table .map {
	text-align:center;
}

/* images */
.images li {
	border: 1px solid #CCCCCC;
	float: left;
	list-style: none outside none;
	margin-bottom: 10px;
	margin-right: 10px;
	padding: 5px;
}

/**
 * jQuery lightBox plugin
 * This jQuery plugin was inspired and based on Lightbox 2 by Lokesh Dhakar (http://www.huddletogether.com/projects/lightbox2/)
 * and adapted to me for use like a plugin from jQuery.
 * @name jquery-lightbox-0.5.css
 * @author Leandro Vieira Pinho - http://leandrovieira.com
 * @version 0.5
 * @date April 11, 2008
 * @category jQuery plugin
 * @copyright (c) 2008 Leandro Vieira Pinho (leandrovieira.com)
 * @license CCAttribution-ShareAlike 2.5 Brazil - http://creativecommons.org/licenses/by-sa/2.5/br/deed.en_US
 * @example Visit http://leandrovieira.com/projects/jquery/lightbox/ for more informations about this jQuery plugin
 */
#jquery-overlay {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 90;
	width: 100%;
	height: 500px;
}
#jquery-lightbox {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 100;
	text-align: center;
	line-height: 0;
}
#jquery-lightbox a img { 
	border: none; 
}
#lightbox-container-image-box {
	position: relative;
	background-color: #fff;
	width: 250px;
	height: 250px;
	margin: 0 auto;
}
#lightbox-container-image {
	padding: 10px;
}
#lightbox-loading {
	position: absolute;
	top: 40%;
	left: 0%;
	height: 25%;
	width: 100%;
	text-align: center;
	line-height: 0;
}
#lightbox-nav {
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	width: 100%;
	z-index: 10;
}
#lightbox-container-image-box > #lightbox-nav { 
	left: 0; 
}
#lightbox-nav a { 
	outline: none;
}
#lightbox-nav-btnPrev, #lightbox-nav-btnNext {
	width: 49%;
	height: 100%;
	zoom: 1;
	display: block;
}
#lightbox-nav-btnPrev { 
	left: 0; 
	float: left;
}
#lightbox-nav-btnNext { 
	right: 0; 
	float: right;
}
#lightbox-container-image-data-box {
	font: 10px Verdana, Helvetica, sans-serif;
	background-color: #fff;
	margin: 0 auto;
	line-height: 1.4em;
	overflow: auto;
	width: 100%;
	padding: 0 10px 0;
}
#lightbox-container-image-data {
	padding: 0 10px; 
	color: #666; 
}
#lightbox-container-image-data #lightbox-image-details { 
	width: 70%; 
	float: left; 
	text-align: left; 
}	
#lightbox-image-details-caption { 
	font-weight: bold; 
}
#lightbox-image-details-currentNumber {
	display: block; 
	clear: left; 
	padding-bottom: 1.0em;	
}			
#lightbox-secNav-btnClose {
	width: 66px; 
	float: right;
	padding-bottom: 0.7em;	
}

/* stats styles */
.stats-holder {
	float:left;
	width:460px;
	position:relative;
	height:480px;
}
.stats-holder svg {
	position:absolute;
	left:0;
	top:-45px;
}
.stats-holder.shr {
	float:right;
}
#driver-stats-holder, #weather-stats-holder {
	text-align:center; 
}
.date-data #holder {
	text-align:center;
}

/* buttons */
.buttons a, .buttons button{
	display:block;    
	background-color:#f5f5f5;
	border:1px solid #dedede;
	border-top:1px solid #eee;
	border-left:1px solid #eee;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	font-size:12px;
	line-height:130%;
	text-decoration:none;
	font-weight:bold;
	color:#565656;
	cursor:pointer;
	padding:5px 10px 6px 7px; /* Links */
}
.buttons button{
	width:auto;
	overflow:visible;
	padding:4px 10px 3px 7px; /* IE6 */
}
.buttons button[type]{
	padding:5px 10px 5px 7px; /* Firefox */
	line-height:17px; /* Safari */
}
*:first-child+html button[type]{
	padding:4px 10px 3px 7px; /* IE7 */
}
.buttons button img, .buttons a img{
	margin:0 3px 2px 0 !important;
	padding:0;
	border:none;
	width:16px;
	height:16px;
}
/* STANDARD */
button:hover, .buttons a:hover{
	background-color:#dff4ff;
	border:1px solid #c2e1ef;
	color:#336699;
}
.buttons a:active{
	background-color:#6299c5;
	border:1px solid #6299c5;
	color:#fff;
}
/* POSITIVE */
button.positive, .buttons a.positive{
	color:#529214;
}
.buttons a.positive:hover, button.positive:hover{
	background-color:#E6EFC2;
	border:1px solid #C6D880;
	color:#529214;
}
.buttons a.positive:active{
	background-color:#529214;
	border:1px solid #529214;
	color:#fff;
}
/* NEGATIVE */
.buttons a.negative, button.negative{
	color:#d12f19;
}
.buttons a.negative:hover, button.negative:hover{
	background:#fbe3e4;
	border:1px solid #fbc2c4;
	color:#d12f19;
}
.buttons a.negative:active{
	background-color:#d12f19;
	border:1px solid #d12f19;
	color:#fff;
}
/* REGULAR */
button.regular, .buttons a.regular{
	color:#336699;
}
.buttons a.regular:hover, button.regular:hover{
	background-color:#dff4ff;
	border:1px solid #c2e1ef;
	color:#336699;
}
.buttons a.regular:active{
	background-color:#6299c5;
	border:1px solid #6299c5;
	color:#fff;
}

/* map */
#main.map {
	width:100%;
	height:472px;
}
#map_canvas { 
	height: 400px;
	width:98%;
	border:1px solid #ccc;
	margin-bottom:10px;
	position:absolute; 
}

/* edit */
#main td.edit {
	width: 60px;
}
#main .edit {
	text-align:center;
}
#main img.edit, #main img.save {
	cursor:pointer;
}
.disabled {
	background:#fff;
	border:3px solid #fff;
}
#main .cancel {
	cursor:pointer;
	padding-left:5px;
}

/* vehicle */
#mot-date, #service-date {
	width:170px;
	margin-right:5px;
}
form[name="addvehicle"] .date, form[name="addvehicle"] .known-issues {
	float: left;
	width: 170px;
}
form[name="addvehicle"] input {
	margin-bottom:15px;
}
#vehicles-table input {
	width: 110px;
}
img.ui-datepicker-trigger {
	cursor:pointer;
}

/* pagination */
#pages {
	width:100%;
	text-align:center;
}
ul.pages {
	list-style: none;
	padding: 5px 10px;
}
ul.pages li {
	margin:1px;
	cursor: pointer;
	color: #A3A3A3;
	border: 1px solid #A3A3A3;
	padding: 2px 5px;
	font-size: 0.7em;
	display:inline;
	text-align:center;
}
ul.pages li.active {
	background-color:#1f8ab5;
	color:#000;
}
.search-background label {
	position:absolute;
	top:10px;
	right:12px;
}

/* generate report */
.date-warning {
	float: right;
	width: 200px;
	color: red;
	font-size: 0.8em;
	font-style: italic;
	text-align: right;
	margin-right: 23px;
	display:none;
}
.stats .report, .accidents .report {
	float: right;
	font-size: 0.6em;
	font-style: italic;
	padding: 4px;
	width: 610px;
}
.stats .report input[type="image"], .accidents .report input[type="image"] {
	padding-top:3px;
}
.stats form, .report form {
	width:auto !important;
}
.stats label, .stats input, .report label, .report input {
	float: left;
	padding-left: 10px;
	display:block;
}

/* further action */
.fa-container {
	border: 1px solid #CCCCCC;
	overflow: hidden;
	margin-bottom:10px;
	clear:right;
}
.fa-container .fa-notes {
	padding:10px;
	width:97.9%;
	resize:none;
	border:none;
}
.fa-date {
	padding: 5px;
	text-align: right;
	width: 88px;
	background: url('/img/calendar.png') 2px 6px no-repeat;
	margin-top: 10px;
	font-size: 0.8em;
	color: white;
	line-height: 1.5em;
}
.further-action select {
	display: inline-block;
	font-size: 0.7em;
}
.further-action .action-status {
	float: right;
}
.further-action .action-status div {
	display: inline-block;
	font-size: 0.7em;
}
#accidents-table .fa-img {
	text-align:center;
}
.further-action h2 {
	clear:both;
}
.further-action .add-note {
	float:right;
	line-height: 3.5em;
}
.further-action .add-note img {
	margin-left:5px;
}
.further-action textarea {
	width:400px;
}
.further-action p {
	display: inline-block;
	margin-left: 20px;
}
.further-action .fa-container.add {
	background:GhostWhite;
}
.add-note .error {
	color:red;
	line-height:0;
	display:none;
}
#no-notes {
	margin-bottom:10px;
}
.add-note-controls {
	float:right;
}
.add-note-controls div {
	margin-left:10px;
	display:inline-block;
}
.add-note-controls .edit, .add-note-controls .delete, .add-note-controls .inline-add-note img {
	cursor:pointer;
}

/* UI */
/*!
 * jQuery UI CSS Framework 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Theming/API
 */

/* Layout helpers
----------------------------------*/
.ui-helper-hidden { display: none; }
.ui-helper-hidden-accessible { position: absolute !important; clip: rect(1px 1px 1px 1px); clip: rect(1px,1px,1px,1px); }
.ui-helper-reset { margin: 0; padding: 0; border: 0; outline: 0; line-height: 1.3; text-decoration: none; font-size: 100%; list-style: none; }
.ui-helper-clearfix:before, .ui-helper-clearfix:after { content: ""; display: table; }
.ui-helper-clearfix:after { clear: both; }
.ui-helper-clearfix { zoom: 1; }
.ui-helper-zfix { width: 100%; height: 100%; top: 0; left: 0; position: absolute; opacity: 0; filter:Alpha(Opacity=0); }
/* Interaction Cues
----------------------------------*/
.ui-state-disabled { cursor: default !important; }
/* Icons
----------------------------------*/
/* states and images */
.ui-icon { display: block; text-indent: -99999px; overflow: hidden; background-repeat: no-repeat; }
/* Misc visuals
----------------------------------*/
/* Overlays */
.ui-widget-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
/*!
 * jQuery UI CSS Framework 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Theming/API
 *
 * To view and modify this theme, visit http://jqueryui.com/themeroller/?ffDefault=Verdana,Arial,sans-serif&fwDefault=normal&fsDefault=1.1em&cornerRadius=5px&bgColorHeader=2191c0&bgTextureHeader=12_gloss_wave.png&bgImgOpacityHeader=75&borderColorHeader=4297d7&fcHeader=eaf5f7&iconColorHeader=d8e7f3&bgColorContent=fcfdfd&bgTextureContent=06_inset_hard.png&bgImgOpacityContent=100&borderColorContent=a6c9e2&fcContent=222222&iconColorContent=0078ae&bgColorDefault=0078ae&bgTextureDefault=02_glass.png&bgImgOpacityDefault=45&borderColorDefault=77d5f7&fcDefault=ffffff&iconColorDefault=e0fdff&bgColorHover=79c9ec&bgTextureHover=02_glass.png&bgImgOpacityHover=75&borderColorHover=448dae&fcHover=026890&iconColorHover=056b93&bgColorActive=6eac2c&bgTextureActive=12_gloss_wave.png&bgImgOpacityActive=50&borderColorActive=acdd4a&fcActive=ffffff&iconColorActive=f5e175&bgColorHighlight=f8da4e&bgTextureHighlight=02_glass.png&bgImgOpacityHighlight=55&borderColorHighlight=fcd113&fcHighlight=915608&iconColorHighlight=f7a50d&bgColorError=e14f1c&bgTextureError=12_gloss_wave.png&bgImgOpacityError=45&borderColorError=cd0a0a&fcError=ffffff&iconColorError=fcd113&bgColorOverlay=aaaaaa&bgTextureOverlay=01_flat.png&bgImgOpacityOverlay=75&opacityOverlay=30&bgColorShadow=999999&bgTextureShadow=01_flat.png&bgImgOpacityShadow=55&opacityShadow=45&thicknessShadow=0px&offsetTopShadow=5px&offsetLeftShadow=5px&cornerRadiusShadow=5px
 */
/* Component containers
----------------------------------*/
.ui-widget { font-family: Helvetica, Arial, sans-serif; font-size: 0.9em; }
.ui-widget .ui-widget { font-size: 1em; }
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: Helvetica, Arial, sans-serif; font-size: 1em; }
.ui-widget-content { border: 1px solid #a6c9e2; background: #fcfdfd url(/img/ui-bg_inset-hard_100_fcfdfd_1x100.png) 50% bottom repeat-x; color: #222222; }
.ui-widget-content a { color: #222222; }
.ui-widget-header { border: 1px solid #4297d7; background: #2191c0 url(/img/ui-bg_gloss-wave_75_2191c0_500x100.png) 50% 50% repeat-x; color: #eaf5f7; font-weight: bold; }
.ui-widget-header a { color: #eaf5f7; }
/* Interaction states
----------------------------------*/
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default { border: 1px solid #77d5f7; background: #0078ae url(/img/ui-bg_glass_45_0078ae_1x400.png) 50% 50% repeat-x; font-weight: normal; color: #ffffff; }
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { color: #ffffff; text-decoration: none; }
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus { border: 1px solid #448dae; background: #79c9ec url(/img/ui-bg_glass_75_79c9ec_1x400.png) 50% 50% repeat-x; font-weight: normal; color: #026890; }
.ui-state-hover a, .ui-state-hover a:hover { color: #026890; text-decoration: none; }
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active { border: 1px solid #acdd4a; background: #6eac2c url(/img/ui-bg_gloss-wave_50_6eac2c_500x100.png) 50% 50% repeat-x; font-weight: normal; color: #ffffff; }
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { color: #ffffff; text-decoration: none; }
.ui-widget :active { outline: none; }
/* Interaction Cues
----------------------------------*/
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight  {border: 1px solid #fcd113; background: #f8da4e url(/img/ui-bg_glass_55_f8da4e_1x400.png) 50% 50% repeat-x; color: #915608; }
.ui-state-highlight a, .ui-widget-content .ui-state-highlight a,.ui-widget-header .ui-state-highlight a { color: #915608; }
.ui-state-error, .ui-widget-content .ui-state-error, .ui-widget-header .ui-state-error {border: 1px solid #cd0a0a; background: #e14f1c url(/img/ui-bg_gloss-wave_45_e14f1c_500x100.png) 50% top repeat-x; color: #ffffff; }
.ui-state-error a, .ui-widget-content .ui-state-error a, .ui-widget-header .ui-state-error a { color: #ffffff; }
.ui-state-error-text, .ui-widget-content .ui-state-error-text, .ui-widget-header .ui-state-error-text { color: #ffffff; }
.ui-priority-primary, .ui-widget-content .ui-priority-primary, .ui-widget-header .ui-priority-primary { font-weight: bold; }
.ui-priority-secondary, .ui-widget-content .ui-priority-secondary,  .ui-widget-header .ui-priority-secondary { opacity: .7; filter:Alpha(Opacity=70); font-weight: normal; }
.ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled { opacity: .35; filter:Alpha(Opacity=35); background-image: none; }
/* Icons
----------------------------------*/
/* states and images */
.ui-icon { width: 16px; height: 16px; background-image: url(/img/ui-icons_0078ae_256x240.png); }
.ui-widget-content .ui-icon {background-image: url(/img/ui-icons_0078ae_256x240.png); }
.ui-widget-header .ui-icon {background-image: url(/img/ui-icons_d8e7f3_256x240.png); }
.ui-state-default .ui-icon { background-image: url(/img/ui-icons_e0fdff_256x240.png); }
.ui-state-hover .ui-icon, .ui-state-focus .ui-icon {background-image: url(/img/ui-icons_056b93_256x240.png); }
.ui-state-active .ui-icon {background-image: url(/img/ui-icons_f5e175_256x240.png); }
.ui-state-highlight .ui-icon {background-image: url(/img/ui-icons_f7a50d_256x240.png); }
.ui-state-error .ui-icon, .ui-state-error-text .ui-icon {background-image: url(/img/ui-icons_fcd113_256x240.png); }
/* positioning */
.ui-icon-carat-1-n { background-position: 0 0; }
.ui-icon-carat-1-ne { background-position: -16px 0; }
.ui-icon-carat-1-e { background-position: -32px 0; }
.ui-icon-carat-1-se { background-position: -48px 0; }
.ui-icon-carat-1-s { background-position: -64px 0; }
.ui-icon-carat-1-sw { background-position: -80px 0; }
.ui-icon-carat-1-w { background-position: -96px 0; }
.ui-icon-carat-1-nw { background-position: -112px 0; }
.ui-icon-carat-2-n-s { background-position: -128px 0; }
.ui-icon-carat-2-e-w { background-position: -144px 0; }
.ui-icon-triangle-1-n { background-position: 0 -16px; }
.ui-icon-triangle-1-ne { background-position: -16px -16px; }
.ui-icon-triangle-1-e { background-position: -32px -16px; }
.ui-icon-triangle-1-se { background-position: -48px -16px; }
.ui-icon-triangle-1-s { background-position: -64px -16px; }
.ui-icon-triangle-1-sw { background-position: -80px -16px; }
.ui-icon-triangle-1-w { background-position: -96px -16px; }
.ui-icon-triangle-1-nw { background-position: -112px -16px; }
.ui-icon-triangle-2-n-s { background-position: -128px -16px; }
.ui-icon-triangle-2-e-w { background-position: -144px -16px; }
.ui-icon-arrow-1-n { background-position: 0 -32px; }
.ui-icon-arrow-1-ne { background-position: -16px -32px; }
.ui-icon-arrow-1-e { background-position: -32px -32px; }
.ui-icon-arrow-1-se { background-position: -48px -32px; }
.ui-icon-arrow-1-s { background-position: -64px -32px; }
.ui-icon-arrow-1-sw { background-position: -80px -32px; }
.ui-icon-arrow-1-w { background-position: -96px -32px; }
.ui-icon-arrow-1-nw { background-position: -112px -32px; }
.ui-icon-arrow-2-n-s { background-position: -128px -32px; }
.ui-icon-arrow-2-ne-sw { background-position: -144px -32px; }
.ui-icon-arrow-2-e-w { background-position: -160px -32px; }
.ui-icon-arrow-2-se-nw { background-position: -176px -32px; }
.ui-icon-arrowstop-1-n { background-position: -192px -32px; }
.ui-icon-arrowstop-1-e { background-position: -208px -32px; }
.ui-icon-arrowstop-1-s { background-position: -224px -32px; }
.ui-icon-arrowstop-1-w { background-position: -240px -32px; }
.ui-icon-arrowthick-1-n { background-position: 0 -48px; }
.ui-icon-arrowthick-1-ne { background-position: -16px -48px; }
.ui-icon-arrowthick-1-e { background-position: -32px -48px; }
.ui-icon-arrowthick-1-se { background-position: -48px -48px; }
.ui-icon-arrowthick-1-s { background-position: -64px -48px; }
.ui-icon-arrowthick-1-sw { background-position: -80px -48px; }
.ui-icon-arrowthick-1-w { background-position: -96px -48px; }
.ui-icon-arrowthick-1-nw { background-position: -112px -48px; }
.ui-icon-arrowthick-2-n-s { background-position: -128px -48px; }
.ui-icon-arrowthick-2-ne-sw { background-position: -144px -48px; }
.ui-icon-arrowthick-2-e-w { background-position: -160px -48px; }
.ui-icon-arrowthick-2-se-nw { background-position: -176px -48px; }
.ui-icon-arrowthickstop-1-n { background-position: -192px -48px; }
.ui-icon-arrowthickstop-1-e { background-position: -208px -48px; }
.ui-icon-arrowthickstop-1-s { background-position: -224px -48px; }
.ui-icon-arrowthickstop-1-w { background-position: -240px -48px; }
.ui-icon-arrowreturnthick-1-w { background-position: 0 -64px; }
.ui-icon-arrowreturnthick-1-n { background-position: -16px -64px; }
.ui-icon-arrowreturnthick-1-e { background-position: -32px -64px; }
.ui-icon-arrowreturnthick-1-s { background-position: -48px -64px; }
.ui-icon-arrowreturn-1-w { background-position: -64px -64px; }
.ui-icon-arrowreturn-1-n { background-position: -80px -64px; }
.ui-icon-arrowreturn-1-e { background-position: -96px -64px; }
.ui-icon-arrowreturn-1-s { background-position: -112px -64px; }
.ui-icon-arrowrefresh-1-w { background-position: -128px -64px; }
.ui-icon-arrowrefresh-1-n { background-position: -144px -64px; }
.ui-icon-arrowrefresh-1-e { background-position: -160px -64px; }
.ui-icon-arrowrefresh-1-s { background-position: -176px -64px; }
.ui-icon-arrow-4 { background-position: 0 -80px; }
.ui-icon-arrow-4-diag { background-position: -16px -80px; }
.ui-icon-extlink { background-position: -32px -80px; }
.ui-icon-newwin { background-position: -48px -80px; }
.ui-icon-refresh { background-position: -64px -80px; }
.ui-icon-shuffle { background-position: -80px -80px; }
.ui-icon-transfer-e-w { background-position: -96px -80px; }
.ui-icon-transferthick-e-w { background-position: -112px -80px; }
.ui-icon-folder-collapsed { background-position: 0 -96px; }
.ui-icon-folder-open { background-position: -16px -96px; }
.ui-icon-document { background-position: -32px -96px; }
.ui-icon-document-b { background-position: -48px -96px; }
.ui-icon-note { background-position: -64px -96px; }
.ui-icon-mail-closed { background-position: -80px -96px; }
.ui-icon-mail-open { background-position: -96px -96px; }
.ui-icon-suitcase { background-position: -112px -96px; }
.ui-icon-comment { background-position: -128px -96px; }
.ui-icon-person { background-position: -144px -96px; }
.ui-icon-print { background-position: -160px -96px; }
.ui-icon-trash { background-position: -176px -96px; }
.ui-icon-locked { background-position: -192px -96px; }
.ui-icon-unlocked { background-position: -208px -96px; }
.ui-icon-bookmark { background-position: -224px -96px; }
.ui-icon-tag { background-position: -240px -96px; }
.ui-icon-home { background-position: 0 -112px; }
.ui-icon-flag { background-position: -16px -112px; }
.ui-icon-calendar { background-position: -32px -112px; }
.ui-icon-cart { background-position: -48px -112px; }
.ui-icon-pencil { background-position: -64px -112px; }
.ui-icon-clock { background-position: -80px -112px; }
.ui-icon-disk { background-position: -96px -112px; }
.ui-icon-calculator { background-position: -112px -112px; }
.ui-icon-zoomin { background-position: -128px -112px; }
.ui-icon-zoomout { background-position: -144px -112px; }
.ui-icon-search { background-position: -160px -112px; }
.ui-icon-wrench { background-position: -176px -112px; }
.ui-icon-gear { background-position: -192px -112px; }
.ui-icon-heart { background-position: -208px -112px; }
.ui-icon-star { background-position: -224px -112px; }
.ui-icon-link { background-position: -240px -112px; }
.ui-icon-cancel { background-position: 0 -128px; }
.ui-icon-plus { background-position: -16px -128px; }
.ui-icon-plusthick { background-position: -32px -128px; }
.ui-icon-minus { background-position: -48px -128px; }
.ui-icon-minusthick { background-position: -64px -128px; }
.ui-icon-close { background-position: -80px -128px; }
.ui-icon-closethick { background-position: -96px -128px; }
.ui-icon-key { background-position: -112px -128px; }
.ui-icon-lightbulb { background-position: -128px -128px; }
.ui-icon-scissors { background-position: -144px -128px; }
.ui-icon-clipboard { background-position: -160px -128px; }
.ui-icon-copy { background-position: -176px -128px; }
.ui-icon-contact { background-position: -192px -128px; }
.ui-icon-image { background-position: -208px -128px; }
.ui-icon-video { background-position: -224px -128px; }
.ui-icon-script { background-position: -240px -128px; }
.ui-icon-alert { background-position: 0 -144px; }
.ui-icon-info { background-position: -16px -144px; }
.ui-icon-notice { background-position: -32px -144px; }
.ui-icon-help { background-position: -48px -144px; }
.ui-icon-check { background-position: -64px -144px; }
.ui-icon-bullet { background-position: -80px -144px; }
.ui-icon-radio-off { background-position: -96px -144px; }
.ui-icon-radio-on { background-position: -112px -144px; }
.ui-icon-pin-w { background-position: -128px -144px; }
.ui-icon-pin-s { background-position: -144px -144px; }
.ui-icon-play { background-position: 0 -160px; }
.ui-icon-pause { background-position: -16px -160px; }
.ui-icon-seek-next { background-position: -32px -160px; }
.ui-icon-seek-prev { background-position: -48px -160px; }
.ui-icon-seek-end { background-position: -64px -160px; }
.ui-icon-seek-start { background-position: -80px -160px; }
/* ui-icon-seek-first is deprecated, use ui-icon-seek-start instead */
.ui-icon-seek-first { background-position: -80px -160px; }
.ui-icon-stop { background-position: -96px -160px; }
.ui-icon-eject { background-position: -112px -160px; }
.ui-icon-volume-off { background-position: -128px -160px; }
.ui-icon-volume-on { background-position: -144px -160px; }
.ui-icon-power { background-position: 0 -176px; }
.ui-icon-signal-diag { background-position: -16px -176px; }
.ui-icon-signal { background-position: -32px -176px; }
.ui-icon-battery-0 { background-position: -48px -176px; }
.ui-icon-battery-1 { background-position: -64px -176px; }
.ui-icon-battery-2 { background-position: -80px -176px; }
.ui-icon-battery-3 { background-position: -96px -176px; }
.ui-icon-circle-plus { background-position: 0 -192px; }
.ui-icon-circle-minus { background-position: -16px -192px; }
.ui-icon-circle-close { background-position: -32px -192px; }
.ui-icon-circle-triangle-e { background-position: -48px -192px; }
.ui-icon-circle-triangle-s { background-position: -64px -192px; }
.ui-icon-circle-triangle-w { background-position: -80px -192px; }
.ui-icon-circle-triangle-n { background-position: -96px -192px; }
.ui-icon-circle-arrow-e { background-position: -112px -192px; }
.ui-icon-circle-arrow-s { background-position: -128px -192px; }
.ui-icon-circle-arrow-w { background-position: -144px -192px; }
.ui-icon-circle-arrow-n { background-position: -160px -192px; }
.ui-icon-circle-zoomin { background-position: -176px -192px; }
.ui-icon-circle-zoomout { background-position: -192px -192px; }
.ui-icon-circle-check { background-position: -208px -192px; }
.ui-icon-circlesmall-plus { background-position: 0 -208px; }
.ui-icon-circlesmall-minus { background-position: -16px -208px; }
.ui-icon-circlesmall-close { background-position: -32px -208px; }
.ui-icon-squaresmall-plus { background-position: -48px -208px; }
.ui-icon-squaresmall-minus { background-position: -64px -208px; }
.ui-icon-squaresmall-close { background-position: -80px -208px; }
.ui-icon-grip-dotted-vertical { background-position: 0 -224px; }
.ui-icon-grip-dotted-horizontal { background-position: -16px -224px; }
.ui-icon-grip-solid-vertical { background-position: -32px -224px; }
.ui-icon-grip-solid-horizontal { background-position: -48px -224px; }
.ui-icon-gripsmall-diagonal-se { background-position: -64px -224px; }
.ui-icon-grip-diagonal-se { background-position: -80px -224px; }
/* Misc visuals
----------------------------------*/
/* Corner radius */
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl { -moz-border-radius-topleft: 5px; -webkit-border-top-left-radius: 5px; -khtml-border-top-left-radius: 5px; border-top-left-radius: 5px; }
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr { -moz-border-radius-topright: 5px; -webkit-border-top-right-radius: 5px; -khtml-border-top-right-radius: 5px; border-top-right-radius: 5px; }
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl { -moz-border-radius-bottomleft: 5px; -webkit-border-bottom-left-radius: 5px; -khtml-border-bottom-left-radius: 5px; border-bottom-left-radius: 5px; }
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br { -moz-border-radius-bottomright: 5px; -webkit-border-bottom-right-radius: 5px; -khtml-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; }
/* Overlays */
.ui-widget-overlay { background: #aaaaaa url(/img/ui-bg_flat_75_aaaaaa_40x100.png) 50% 50% repeat-x; opacity: .30;filter:Alpha(Opacity=30); }
.ui-widget-shadow { margin: 5px 0 0 5px; padding: 0px; background: #999999 url(/img/ui-bg_flat_55_999999_40x100.png) 50% 50% repeat-x; opacity: .45;filter:Alpha(Opacity=45); -moz-border-radius: 5px; -khtml-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }/*!
 * jQuery UI Resizable 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Resizable#theming
 */
.ui-resizable { position: relative;}
.ui-resizable-handle { position: absolute;font-size: 0.1px; display: block; }
.ui-resizable-disabled .ui-resizable-handle, .ui-resizable-autohide .ui-resizable-handle { display: none; }
.ui-resizable-n { cursor: n-resize; height: 7px; width: 100%; top: -5px; left: 0; }
.ui-resizable-s { cursor: s-resize; height: 7px; width: 100%; bottom: -5px; left: 0; }
.ui-resizable-e { cursor: e-resize; width: 7px; right: -5px; top: 0; height: 100%; }
.ui-resizable-w { cursor: w-resize; width: 7px; left: -5px; top: 0; height: 100%; }
.ui-resizable-se { cursor: se-resize; width: 12px; height: 12px; right: 1px; bottom: 1px; }
.ui-resizable-sw { cursor: sw-resize; width: 9px; height: 9px; left: -5px; bottom: -5px; }
.ui-resizable-nw { cursor: nw-resize; width: 9px; height: 9px; left: -5px; top: -5px; }
.ui-resizable-ne { cursor: ne-resize; width: 9px; height: 9px; right: -5px; top: -5px;}/*!
 * jQuery UI Selectable 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Selectable#theming
 */
.ui-selectable-helper { position: absolute; z-index: 100; border:1px dotted black; }
/*!
 * jQuery UI Accordion 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Accordion#theming
 */
/* IE/Win - Fix animation bug - #4615 */
.ui-accordion { width: 100%; }
.ui-accordion .ui-accordion-header { cursor: pointer; position: relative; margin-top: 1px; zoom: 1; }
.ui-accordion .ui-accordion-li-fix { display: inline; }
.ui-accordion .ui-accordion-header-active { border-bottom: 0 !important; }
.ui-accordion .ui-accordion-header a { display: block; font-size: 1em; padding: .5em .5em .5em .7em; }
.ui-accordion-icons .ui-accordion-header a { padding-left: 2.2em; }
.ui-accordion .ui-accordion-header .ui-icon { position: absolute; left: .5em; top: 50%; margin-top: -8px; }
.ui-accordion .ui-accordion-content { padding: 1em 2.2em; border-top: 0; margin-top: -2px; position: relative; top: 1px; margin-bottom: 2px; overflow: auto; display: none; zoom: 1; }
.ui-accordion .ui-accordion-content-active { display: block; }
/*!
 * jQuery UI Autocomplete 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Autocomplete#theming
 */
.ui-autocomplete { position: absolute; cursor: default; }
/* workarounds */
* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
/*
 * jQuery UI Menu 1.8.21
 *
 * Copyright 2010, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Menu#theming
 */
.ui-menu {
	list-style:none;
	padding: 2px;
	margin: 0;
	display:block;
	float: left;
}
.ui-menu .ui-menu {
	margin-top: -3px;
}
.ui-menu .ui-menu-item {
	margin:0;
	padding: 0;
	zoom: 1;
	float: left;
	clear: left;
	width: 100%;
}
.ui-menu .ui-menu-item a {
	text-decoration:none;
	display:block;
	padding:.2em .4em;
	line-height:1.5;
	zoom:1;
}
.ui-menu .ui-menu-item a.ui-state-hover,
.ui-menu .ui-menu-item a.ui-state-active {
	font-weight: normal;
	margin: -1px;
}
/*!
 * jQuery UI Button 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Button#theming
 */
.ui-button { display: inline-block; position: relative; padding: 0; margin-right: .1em; text-decoration: none !important; cursor: pointer; text-align: center; zoom: 1; overflow: visible; } /* the overflow property removes extra width in IE */
.ui-button-icon-only { width: 2.2em; } /* to make room for the icon, a width needs to be set here */
button.ui-button-icon-only { width: 2.4em; } /* button elements seem to need a little more width */
.ui-button-icons-only { width: 3.4em; } 
button.ui-button-icons-only { width: 3.7em; } 
/*button text element */
.ui-button .ui-button-text { display: block; line-height: 1.4;  }
.ui-button-text-only .ui-button-text { padding: .4em 1em; }
.ui-button-icon-only .ui-button-text, .ui-button-icons-only .ui-button-text { padding: .4em; text-indent: -9999999px; }
.ui-button-text-icon-primary .ui-button-text, .ui-button-text-icons .ui-button-text { padding: .4em 1em .4em 2.1em; }
.ui-button-text-icon-secondary .ui-button-text, .ui-button-text-icons .ui-button-text { padding: .4em 2.1em .4em 1em; }
.ui-button-text-icons .ui-button-text { padding-left: 2.1em; padding-right: 2.1em; }
/* no icon support for input elements, provide padding by default */
input.ui-button { padding: .4em 1em; }

/*button icon element(s) */
.ui-button-icon-only .ui-icon, .ui-button-text-icon-primary .ui-icon, .ui-button-text-icon-secondary .ui-icon, .ui-button-text-icons .ui-icon, .ui-button-icons-only .ui-icon { position: absolute; top: 50%; margin-top: -8px; }
.ui-button-icon-only .ui-icon { left: 50%; margin-left: -8px; }
.ui-button-text-icon-primary .ui-button-icon-primary, .ui-button-text-icons .ui-button-icon-primary, .ui-button-icons-only .ui-button-icon-primary { left: .5em; }
.ui-button-text-icon-secondary .ui-button-icon-secondary, .ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary { right: .5em; }
.ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary { right: .5em; }
/*button sets*/
.ui-buttonset { margin-right: 7px; }
.ui-buttonset .ui-button { margin-left: 0; margin-right: -.3em; }
/* workarounds */
button.ui-button::-moz-focus-inner { border: 0; padding: 0; } /* reset extra padding in Firefox */
/*!
 * jQuery UI Dialog 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Dialog#theming
 */
.ui-dialog { position: absolute; padding: .2em; width: 300px; overflow: hidden; }
.ui-dialog .ui-dialog-titlebar { padding: .4em 1em; position: relative;  }
.ui-dialog .ui-dialog-title { float: left; margin: .1em 16px .1em 0; } 
.ui-dialog .ui-dialog-titlebar-close { position: absolute; right: .3em; top: 50%; width: 19px; margin: -10px 0 0 0; padding: 1px; height: 18px; }
.ui-dialog .ui-dialog-titlebar-close span { display: block; margin: 1px; }
.ui-dialog .ui-dialog-titlebar-close:hover, .ui-dialog .ui-dialog-titlebar-close:focus { padding: 0; }
.ui-dialog .ui-dialog-content { position: relative; border: 0; padding: .5em 1em; background: none; overflow: auto; zoom: 1; }
.ui-dialog .ui-dialog-buttonpane { text-align: left; border-width: 1px 0 0 0; background-image: none; margin: .5em 0 0 0; padding: .3em 1em .5em .4em; }
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset { float: right; }
.ui-dialog .ui-dialog-buttonpane button { margin: .5em .4em .5em 0; cursor: pointer; }
.ui-dialog .ui-resizable-se { width: 14px; height: 14px; right: 3px; bottom: 3px; }
.ui-draggable .ui-dialog-titlebar { cursor: move; }
/*!
 * jQuery UI Slider 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Slider#theming
 */
.ui-slider { position: relative; text-align: left; }
.ui-slider .ui-slider-handle { position: absolute; z-index: 2; width: 1.2em; height: 1.2em; cursor: default; }
.ui-slider .ui-slider-range { position: absolute; z-index: 1; font-size: .7em; display: block; border: 0; background-position: 0 0; }
.ui-slider-horizontal { height: .8em; }
.ui-slider-horizontal .ui-slider-handle { top: -.3em; margin-left: -.6em; }
.ui-slider-horizontal .ui-slider-range { top: 0; height: 100%; }
.ui-slider-horizontal .ui-slider-range-min { left: 0; }
.ui-slider-horizontal .ui-slider-range-max { right: 0; }
.ui-slider-vertical { width: .8em; height: 100px; }
.ui-slider-vertical .ui-slider-handle { left: -.3em; margin-left: 0; margin-bottom: -.6em; }
.ui-slider-vertical .ui-slider-range { left: 0; width: 100%; }
.ui-slider-vertical .ui-slider-range-min { bottom: 0; }
.ui-slider-vertical .ui-slider-range-max { top: 0; }/*!
 * jQuery UI Tabs 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Tabs#theming
 */
.ui-tabs { position: relative; padding: .2em; zoom: 1; } /* position: relative prevents IE scroll bug (element with position: relative inside container with overflow: auto appear as "fixed") */
.ui-tabs .ui-tabs-nav { margin: 0; padding: .2em .2em 0; }
.ui-tabs .ui-tabs-nav li { list-style: none; float: left; position: relative; top: 1px; margin: 0 .2em 1px 0; border-bottom: 0 !important; padding: 0; white-space: nowrap; }
.ui-tabs .ui-tabs-nav li a { float: left; padding: .5em 1em; text-decoration: none; }
.ui-tabs .ui-tabs-nav li.ui-tabs-selected { margin-bottom: 0; padding-bottom: 1px; }
.ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a { cursor: text; }
.ui-tabs .ui-tabs-nav li a, .ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a { cursor: pointer; } /* first selector in group seems obsolete, but required to overcome bug in Opera applying cursor: text overall if defined elsewhere... */
.ui-tabs .ui-tabs-panel { display: block; border-width: 0; padding: 1em 1.4em; background: none; }
.ui-tabs .ui-tabs-hide { display: none !important; }
/*!
 * jQuery UI Datepicker 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Datepicker#theming
 */
.ui-datepicker { width: 17em; padding: .2em .2em 0; display: none; }
.ui-datepicker .ui-datepicker-header { position:relative; padding:.2em 0; }
.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next { position:absolute; top: 2px; width: 1.8em; height: 1.8em; }
.ui-datepicker .ui-datepicker-prev-hover, .ui-datepicker .ui-datepicker-next-hover { top: 1px; }
.ui-datepicker .ui-datepicker-prev { left:2px; }
.ui-datepicker .ui-datepicker-next { right:2px; }
.ui-datepicker .ui-datepicker-prev-hover { left:1px; }
.ui-datepicker .ui-datepicker-next-hover { right:1px; }
.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span { display: block; position: absolute; left: 50%; margin-left: -8px; top: 50%; margin-top: -8px;  }
.ui-datepicker .ui-datepicker-title { margin: 0 2.3em; line-height: 1.8em; text-align: center; }
.ui-datepicker .ui-datepicker-title select { font-size:1em; margin:1px 0; }
.ui-datepicker select.ui-datepicker-month-year {width: 100%;}
.ui-datepicker select.ui-datepicker-month, 
.ui-datepicker select.ui-datepicker-year { width: 49%;}
.ui-datepicker table {width: 100%; font-size: .9em; border-collapse: collapse; margin:0 0 .4em; }
.ui-datepicker th { padding: .7em .3em; text-align: center; font-weight: bold; border: 0;  }
.ui-datepicker td { border: 0; padding: 1px; }
.ui-datepicker td span, .ui-datepicker td a { display: block; padding: .2em; text-align: right; text-decoration: none; }
.ui-datepicker .ui-datepicker-buttonpane { background-image: none; margin: .7em 0 0 0; padding:0 .2em; border-left: 0; border-right: 0; border-bottom: 0; }
.ui-datepicker .ui-datepicker-buttonpane button { float: right; margin: .5em .2em .4em; cursor: pointer; padding: .2em .6em .3em .6em; width:auto; overflow:visible; }
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current { float:left; }
/* with multiple calendars */
.ui-datepicker.ui-datepicker-multi { width:auto; }
.ui-datepicker-multi .ui-datepicker-group { float:left; }
.ui-datepicker-multi .ui-datepicker-group table { width:95%; margin:0 auto .4em; }
.ui-datepicker-multi-2 .ui-datepicker-group { width:50%; }
.ui-datepicker-multi-3 .ui-datepicker-group { width:33.3%; }
.ui-datepicker-multi-4 .ui-datepicker-group { width:25%; }
.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header { border-left-width:0; }
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header { border-left-width:0; }
.ui-datepicker-multi .ui-datepicker-buttonpane { clear:left; }
.ui-datepicker-row-break { clear:both; width:100%; font-size:0em; }
/* RTL support */
.ui-datepicker-rtl { direction: rtl; }
.ui-datepicker-rtl .ui-datepicker-prev { right: 2px; left: auto; }
.ui-datepicker-rtl .ui-datepicker-next { left: 2px; right: auto; }
.ui-datepicker-rtl .ui-datepicker-prev:hover { right: 1px; left: auto; }
.ui-datepicker-rtl .ui-datepicker-next:hover { left: 1px; right: auto; }
.ui-datepicker-rtl .ui-datepicker-buttonpane { clear:right; }
.ui-datepicker-rtl .ui-datepicker-buttonpane button { float: left; }
.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current { float:right; }
.ui-datepicker-rtl .ui-datepicker-group { float:right; }
.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header { border-right-width:0; border-left-width:1px; }
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header { border-right-width:0; border-left-width:1px; }
/* IE6 IFRAME FIX (taken from datepicker 1.5.3 */
.ui-datepicker-cover {
    display: none; /*sorry for IE5*/
    display/**/: block; /*sorry for IE5*/
    position: absolute; /*must have*/
    z-index: -1; /*must have*/
    filter: mask(); /*must have*/
    top: -4px; /*must have*/
    left: -4px; /*must have*/
    width: 200px; /*must have*/
    height: 200px; /*must have*/
}/*!
 * jQuery UI Progressbar 1.8.21
 *
 * Copyright 2012, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Progressbar#theming
 */
.ui-progressbar { height:2em; text-align: left; overflow: hidden; }
.ui-progressbar .ui-progressbar-value {margin: -1px; height:100%; }

/* =============================================================================
   Media Queries
   ========================================================================== */

@media only screen and (min-width: 35em) {
	/* Style adjustments for viewports that meet the condition */
}

/* =============================================================================
   Non-Semantic Helper Classes
   ========================================================================== */

.ir { display: block; border: 0; text-indent: -999em; overflow: hidden; background-color: transparent; background-repeat: no-repeat; text-align: left; direction: ltr; *line-height: 0; }
.ir br { display: none; }
.hidden { display: none !important; visibility: hidden; }
.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }
.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus { clip: auto; height: auto; margin: 0; overflow: visible; position: static; width: auto; }
.invisible { visibility: hidden; }
.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { *zoom: 1; }

/* =============================================================================
   Print Styles
   ========================================================================== */
 
@media print {
  * { background: transparent !important; color: black !important; box-shadow:none !important; text-shadow: none !important; filter:none !important; -ms-filter: none !important; } /* Black prints faster: h5bp.com/s */
  a, a:visited { text-decoration: underline; }
  a[href]:after { content: " (" attr(href) ")"; }
  abbr[title]:after { content: " (" attr(title) ")"; }
  .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }  /* Don't show links for images, or javascript/internal links */
  pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
  thead { display: table-header-group; } /* h5bp.com/t */
  tr, img { page-break-inside: avoid; }
  img { max-width: 100% !important; }
  @page { margin: 0.5cm; }
  p, h2, h3 { orphans: 3; widows: 3; }
  h2, h3 { page-break-after: avoid; }
}