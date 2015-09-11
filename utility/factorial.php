<!DOCTYPE html>
<html>
<head>
<title> N! Calculating </title>
</head>
<body>
<h1> N! Factorials </h1>
<form method="post" focus>
<fieldset><legend>Factorials Check</legend>
<div class="fourty_per"><label> Give The Number :</label><input name="num" type="text" />&nbsp;<input type="submit" value="let me Calculate!" /></div>
<div id="prime_result" class="sixty_per"><?php if(isset($msg)) echo $msg;?> </div>
</fieldset>
</form>
<br/>
<?php

if(isset($_POST['num']))
{
	if($_POST['num']==NULL)
		echo '<br/>Null Value given!!!';
	elseif($_POST['num']<0)
	{
		echo '<br/>What are you doing here ! FOOL!!! Are you a piece of shit!!!!';
	}
	elseif($_POST['num']==0)
	{
		echo '<br/>Factorials of 0 is : 1';
		echo '<br/>No of total digit in the result : 1';
		echo '<br/>No. of trailling Zero\'s : 0';
	}
	elseif($_POST['num']==1)
	{
		echo '<br/>Factorials of 1 is : 1';
		echo '<br/>No of total digit in the result : 1';
		echo '<br/>No. of trailling Zero\'s : 0';
	}
	elseif($_POST['num']==2)
	{
		echo '<br/>Factorials of 2 is : 2';
		echo '<br/>No of total digit in the result : 1';
		echo '<br/>No. of trailling Zero\'s : 0';
	}
	elseif($_POST['num']==3)
	{
		echo '<br/>Factorials of 3 is : 6';
		echo '<br/>No of total digit in the result : 1';
		echo '<br/>No. of trailling Zero\'s : 0';
	}
	elseif($_POST['num']==4)
	{
		echo '<br/>Factorials of 4 is : 24';
		echo '<br/>No of total digit in the result : 2';
		echo '<br/>No. of trailling Zero\'s : 0';
	}
	elseif($_POST['num']==5)
	{
		echo '<br/>Factorials of 5 is : 120';
		echo '<br/>No of total digit in the result : 3';
		echo '<br/>No. of trailling Zero\'s : 1';
	}
	elseif($_POST['num']==6)
	{
		echo '<br/>Factorials of 6 is : 720';
		echo '<br/>No of total digit in the result : 3';
		echo '<br/>No. of trailling Zero\'s : 1';
	}
	elseif($_POST['num']==7)
	{
		echo '<br/>Factorials of 7 is : 5040';
		echo '<br/>No of total digit in the result : 4';
		echo '<br/>No. of trailling Zero\'s : 1';
	}
	elseif($_POST['num']==8)
	{
		echo '<br/>Factorials of 8 is : 40320';
		echo '<br/>No of total digit in the result : 4';
		echo '<br/>No. of trailling Zero\'s : 1';
	}
	elseif($_POST['num']==9)
	{
		echo '<br/>Factorials of 9 is : 362880';
		echo '<br/>No of total digit in the result : 6';
		echo '<br/>No. of trailling Zero\'s : 1';
	}
	elseif($_POST['num']==10)
	{
		echo '<br/>Factorials of 10 is : 39916800';
		echo '<br/>No of total digit in the result : 8';
		echo '<br/>No. of trailling Zero\'s : 2';
	}
	else
	{
		$number=$_POST['num'];
		$result='';
		$result.=$number;
		
		for($i=$number-1;$i>1;$i--)
		{	
			$temp=0;
			$long=strlen($result);
			//echo $long;
			$res=0;
			for($j=$long-1;$j>=0;$j--)
			{
				$tmp=$result[$j];
				//echo '--> '.$tmp.' <---';
				$mult=$tmp*$i;
				$mult+=$res;
				$res=$mult%10;
				$result[$j]=$res;
				$res=$mult-$res;
				$res=$res/10;
			}
			//echo ' ||-->'.$res;
			$ck=$res;
			if($ck!=0)
			{
				$res.=$result;
				//echo '<br/>'.$res;
				$result=''.$res;
			}	
		}
		
		echo '<br/>Factorial of '.$_POST['num'].' is : '.$result.'';
		//echo '<br/><br/>';
		$a=strlen($result);
		echo '<br/>No of total digit in the result : '.$a.'';
		$count=0;
		while($result[$a-1]==0)
		{
		$count++;
		$a--;
		}
		echo '<br/>No. of trailling Zero\'s : '.$count.'<br/>';
	}
}
?>

</body>
</html>
