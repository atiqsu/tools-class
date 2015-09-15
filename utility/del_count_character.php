<!DOCTYPE html>
<html>
<head>
<title> Counting character  </title>

<link href="/css/mycss.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="/js/myscript.js"></script>

</head>
<body>
<div id="main_wrapper">

	<div id="characterCounter">
	<fieldset><legend>Editor</legend>
	<div class="displayit"> Number of character:: </div><div id="withSpaceDivId"></div><div class="displayit"></div><br/><br/><hr/>
	<textarea spellcheck="true" rows="10" cols="80" placeholder='Put Your Code & Edit it' autofocus onkeyup="characterCount(this)" style="width:99%"></textarea>
	</fieldset><br/>
	</div>
</div>

</body>
</html>	
