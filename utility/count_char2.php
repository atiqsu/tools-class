<!DOCTYPE html>
<html>
<head>
<title> Counting character  </title>
<style type="text/css">
textarea {
resize: none;
}
div.displayit {
width:160;
height:25px;
padding:5px;
float:left;
}
#withSpaceDivId {
float:left;
width:20px;
left:200px;
padding:5px;
}
</style>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
function characterCount(textarea) 
{
	var result_space = document.getElementById("withSpaceDivId");
	var result_space_no = document.getElementById("withoutSpaceDivId");
	try
	{ 
	var num_of_enter=textarea.value.match(/[^\n]*\n[^\n]*/gi).length;
	//result_space_no.innerHTML =num_of_enter;
	var num_of_char=textarea.value.length;
	result_space.innerHTML = num_of_char-num_of_enter;
	}
	catch(err)
	{
	//result_space_no.innerHTML =err.message;
	var num_of_char=textarea.value.length;
	result_space.innerHTML = num_of_char;
	//result_space_no.innerHTML ="0";
	}

}

function make_change(optn) 
{ 
//alert(optn);
try{
	if(document.textArea.black_board.value!="") 
		if(optn=="all_small")
		alert("sdfsdf");
		//document.textArea.black_board.value=document.textArea.black_board.value.toLowerCase();
		else
		alert("inner if");
	else
		alert("outer if");
}
catch(e){
alert(e.message);
}		
} 
</script>
</head>
<body>

<?php

if(isset($_POST['black_board']) && !empty($_POST['black_board']))
{
	if(isset($_POST['all_small']))
		$result=strtolower($_POST['black_board']);

	elseif(isset($_POST['all_caps']))
		$result=strtoupper($_POST['black_board']);

	elseif(isset($_POST['flcw']))
		$result=ucwords(strtolower($_POST['black_board']));

	elseif(isset($_POST['revers_me']))
		$result=strrev($_POST['black_board']);

	elseif(isset($_POST['br_all_line']))
		$result=nl2br($_POST['black_board']);

	elseif(isset($_POST['br_all_rplc']))
	{
		$result=strtoupper($_POST['black_board']);
	}
	elseif(isset($_POST['strip_all_tags']))
		$result=strip_tags($_POST['black_board']);

	elseif(isset($_POST['all_caps']))
		$result=strtoupper($_POST['black_board']);

	elseif(isset($_POST['all_caps']))
		$result=strtoupper($_POST['black_board']);

	elseif(isset($_POST['all_caps']))
		$result=strtoupper($_POST['black_board']);

	elseif(isset($_POST['base64_decode_fld']))
		$result=base64_decode($_POST['black_board']);

	elseif(isset($_POST['md5_fld']))
		$result=md5($_POST['black_board']);

	else
	;
}	
else
;



?>
<form method="post" focus>
<fieldset><legend>Editor</legend>
<div class="displayit"> Number of character:: </div><div id="withSpaceDivId"></div><div class="displayit"></div><br/><br/><hr/>
<textarea name="black_board" spellcheck="true" rows="10" cols="80" placeholder='Put Your Code & Edit it' autofocus onKeyUp="characterCount(this)" style="width:99%"><?php 
if(isset($result))
echo $result;
else
echo $_POST['black_board'];
?></textarea>
</fieldset><br/>

<fieldset>
<legend>Character formatting</legend>
<label> Desired Output option :</label>
<input name="all_small" type="submit" value="Make me Small!!" />
<input name="all_caps" type="submit" value="Make me Capital!!" />
<input name="flcw" type="submit" value="Capitalized word!!" />
<input name="revers_me" type="submit" value="Make me reversed!!" /><br/><br/>
<!--<input name="htmlsp_char" type="submit" value="Make me plain!!" />
<input name="br_all_line" type="submit" value="Give br in all line!!" />
   -->
<input name="flcs" type="submit" value="Capitalized sentence!!" />
<input name="rhpn_usc" type="submit" value="Replace hyphen with uscore!!" />
<input name="rsp_usc" type="submit" value="Replace space with uscore!!" />
<input name="rusc_sp" type="submit" value="Replace uscore with space!!" />
<input name="anchored_text" type="submit" value="Pick anchor only!!" />
<input name="br_all_rplc" type="submit" value="vanish all br!!" />
<input name="strip_all_tags" type="submit" value="Remove all html tag!!" onClick="caution()"/>
<input name="all_small" type="submit" value="Make me Small!!" />
<input name="all_small" type="submit" value="Make me Small!!" />
<input name="all_small" type="submit" value="Make me Small!!" />
<input name="all_small" type="submit" value="Make me Small!!" />
</fieldset>


</form>


<br/>

<?php
echo 'heheheeh';

?>	
</body>
</html>	
