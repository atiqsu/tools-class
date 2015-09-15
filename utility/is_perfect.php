<!DOCTYPE html>
<html>
<head>
<title> Is Perfect? </title>
</head>
<body>
<h1> Is Perfect! </h1>
<form method="post" focus>
<fieldset><legend>Perfection Check</legend>
<div class="fourty_per"><label> Give The Number :</label><input name="num" type="text" />&nbsp;<input type="submit" value="let me Think!" /></div>
<div id="prime_result" class="sixty_per"><?php if(isset($msg)) echo $msg;?> </div>
</fieldset>
</form>
<br/>
<?php
if(isset($_POST['num']))
{
	if($_POST['num']==NULL)
	{
		echo 'Null Value Given!!!'	;
	}
	elseif($_POST['num']<0)
	echo 'what are you trying to DOOO!!!';
	elseif($_POST['num']==0)
	echo 'Why do you need to know is zero perfect??! while this means nothing!!!';
	elseif($_POST['num']==1)
	echo 'One is not a perfect number but Unique number!!!!';
	elseif($_POST['num']==2)
	echo 'Two is not a perfect number but prime.!!!!';
	elseif($_POST['num']==3)
	echo 'OOOPS....3 is not a perfect but prime!!!';
	else
	{
		$n=$_POST['num'];
		$range=ceil($n/2);
		$result=1;
		for($i=2;$i<=$range;$i++)
		{
			if($n%$i==0)
			$result+=$i;
		} 
		if($n==$result)
			echo $n.' is a Perfect Number!!!';
		else
			echo $n.' is not a Perfect Number.';
	}
}
?>
<form method="post" focus>
<fieldset><legend>Find Perfect</legend>
<div class="fourty_per"><label> Find upto Number :</label><input name="numer" type="text" />&nbsp;<input type="submit" value="let me Think!" /></div>
<div id="prime_result" class="sixty_per"><?php if(isset($msg)) echo $msg;?> </div>
</fieldset>
</form>
<?php
if(isset($_POST['numer']))
{
	if($_POST['numer']==NULL)
		echo 'Null Value Given!!!'	;
	elseif($_POST['numer']<0)
		echo 'what are you trying to DOOO!!!';
	elseif($_POST['numer']==0)
		echo 'What are you saying?!!! Are You a dumb???!!!';
	elseif($_POST['numer']==1)
		echo 'OOOPS....start counting.....!!!';
	elseif($_POST['numer']==2)
		echo 'Sorry I think there is no perfect number upto 2!!';
	elseif($_POST['numer']==3)
		echo 'Sorry not found.';
	else	
	{
		$j=$_POST['numer'];
		for($n=4;$n<=$j;$n++)
		{
			$range=ceil($n/2);
			$result=1;
			for($i=2;$i<=$range;$i++)
			{
				if($n%$i==0)
				$result+=$i;
			} 
			if($n==$result)
				echo '<br/>'.$n.' is a Perfect Number!!!';
		}		
	}
}
?>
</body>
</html>