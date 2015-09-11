<?php

if(isset($_POST['num']))
{
	$flag=false;
	if($_POST['num']== NULL)
	{
		$msg='<br/>Input not Found!! NULL!!!';
	}
	elseif($_POST['num']==1)
	{
		$msg='<br/>What kind of fool you are!!! Learn this for future you dumb :D heheheee...khihzzz...<br/>';
	}
	elseif($_POST['num']==2)
	{
			$msg='<br/>What should I say! you dumb!!! 2 is the only even prime number!!!<br/>';
	}
	elseif($_POST['num']==3)
	{
		$msg='<br/>?!!! For your kind information This is a PRIME number .... also this is the first odd prime number. Am I a babbler??<br/>';
	}
	elseif($_POST['num']==5)
	{
		$msg='<br/>This is a PRIME number !!!<br/>';
	}
	elseif($_POST['num'] > 9223372036854775807)
	{
		$msg='This overflows the maximum integer value in 64-bit operation system';
	}
	elseif($_POST['num']>2147483647)
	{
		$msg='This overflows the maximum integer value in 32-bit operation system<br/> 64-bit OS Calculation will be add later.';
	}
	else
	{
		$divise=sqrt($_POST['num']);
		$divise=ceil($divise);
		$i=2;
		//echo $divise;
		while($i<=$divise)
		{
			if($_POST['num']%$i==0)
			{
				$msg='<br/> Foooh This is not a Prime number!!<br/>';
				$msg.=$_POST['num'].' is divided by '.$i;
				$divise--;
				$flag=true;
				break;
			}
			$i++;
		}
		/* with for loop......
		for($i=2;$i<=$divise;$i++)
		{
			if($_POST['num']%$i==0)
			{
				echo $$_POST['num'].' is not a prime number<br/>';
				echo $i.' is the first divisor of this number...';  
				$flag=true;
				break;
			}
		}
		*/
		if($flag!==true)
		{
		$msg='<br/><h3> Wow '.$_POST['num'].' is a Prime number!!!</h3>';
		//echo $msg;
		}
	}
}
else
	echo '';
?>
<!DOCTYPE html>
<html>
<head>
<title> Prime and Factors calculation  </title>
<style type="css/text">
div.fourty_per {
width:40%;
padding:5px;
float:left;
}
div.sixty_per {
width:60%;
padding:5px;
float:left;
}
</style>
</head>
<body>
<h1> Is Prime ? </h1>
<form method="post" width="50%">
<fieldset><legend>Prime Check</legend>
<div class="fourty_per"><label> Give The Number :</label><input name="num" type="text" />&nbsp;<input type="submit" value="let me Think!" /></div>
<div id="prime_result" class="sixty_per"><?php if(isset($msg)) echo $msg;?> </div>
</fieldset>
</form>
<br/>
<?php
// factors......
function is_factor($a,$b){
if($a>$b)
return ($a%$b);
elseif($b>$a)
return ($b%$a);
else
return 0;
}

if(isset($_POST['numb']))
{
	$factors='';
	$flag=true;
	
	if($_POST['numb']!=NULL)
	{
		if($_POST['numb']==0)
		{
			$factors='0 !!! are you dumb!!! Or blind!! This is nothing but a symbol.<br/> It is invented in south Asia hmmmm specifically in india<br/>';
		}
		elseif($_POST['numb']==1)
		{
			$factors='1 is a unique number.<br/>';
		}
		elseif($_POST['numb']==2)
		{
			$factors='2 is a prime number. Its factors are 1 and itself<br/>';
		}
		elseif($_POST['numb']==3)
		{
			$factors='3 is a prime number. Its factors are 1 and itself<br/>';
		}
		elseif($_POST['numb']==5)
		{
			$factors='5 is a prime number. Its factors are 1 and itself<br/>';
		}
		elseif($_POST['numb']==7)
		{
			$factors='7 is a prime number. Its factors are 1 and itself<br/>';
		}
		else
		{
			$factors='1, ';
			$divise=$_POST['numb']/2;
			$divise=floor($divise);
			for($i=2;$i<=$divise;$i++)
			{
			//echo $i.' - '.$_POST['numb']. ' | ';
				if(is_factor($_POST['numb'],$i)==0)
				{
					$factors.=$i.', ';
					$flag=false;
				}
			}
			if($flag==false)
			{
				$factors.=$_POST['numb'];
				$i='The factors of '.$_POST['numb'].' are : '.$factors;
				$factors=$i;
			}	
			else
				$factors=$_POST['numb'].' is a prime number. Its factors are 1 and itself.';
		}
	}
	else
		$factors='Null Value Given!!! Can\'t Calculate. ';
}
else
{
$factors='';
}
?>
<h1> Factors of a number ? </h1>
<form method="post">
<fieldset><legend>Prime Check</legend>
<div class="fourty_per"><label> Give The Number :</label><input name="numb" type="text" />&nbsp;<input type="submit" value="let me Think!" /></div>
<div id="factor_result" class="sixty_per"><?php if(isset($factors)) echo $factors;?> </div>
</fieldset>
</form>
<?php
if(isset($_POST['number']))
{
	$factorize='';
	$flag=true;
	
	if($_POST['number']!=NULL)
	{
		if($_POST['number']==0)
		{
			$factorize='0 !!! Are you dumb!!! Or blind!! This is nothing but a symbol. It means HORSE EGG !!<br/> It is invented in south Asia hmmmm specifically in india<br/>';
		}
		elseif($_POST['number']==1)
		{
			$factorize='1 = 1*1*1*1*1*1......<br/>It is a unique number.<br/>';
		}
		elseif($_POST['number']==2)
		{
			$factorize='2 is a prime number. Its factors are 1 and itself<br/> 2= 1 * 2;';
		}
		elseif($_POST['number']==3)
		{
			$factorize='3 is a prime number. Its factors are 1 and itself<br/> 3= 1 * 3;';
		}
		elseif($_POST['number']==5)
		{
			$factorize='5 is a prime number. Its factors are 1 and itself<br/> 5= 1 * 5;';
		}
		elseif($_POST['number']==7)
		{
			$factorize='7 is a prime number. Its factors are 1 and itself<br/> 7= 1 * 7;';
		}
		else
		{
			$factorize='1 * ';
			$divise=sqrt($_POST['number']);
			$divise=floor($divise);
			$n=$_POST['number'];
			for($i=2;$i<=$divise;$i++)
			{
			//echo $i.' - '.$_POST['number']. ' | ';
				if($n==$i)
				{
					$factorize.=$i.' ;';
					$n=1;
					break;
				}
		
				while(is_factor($n,$i)==0)
				{
					$factorize.=$i.' * ';
					$flag=false;
					$n=$n/$i;
					if($n==$i)
					{
						$factorize.=$i.' ;';
						$n=1;
						break 2;
					}
					//echo '('.is_factor($n,$i).')';
				}
				//echo $i.' - '.$n.' | '; flush();
			}
			if($flag==false)
			{
				if($n==1)
				;
				else
				$factorize.=$n.'; ';
				$i='The factorization of '.$_POST['number'].' is : <br/>'.$_POST['number'].' = '.$factorize;
				$factorize=$i;
			}	
			else
				$factorize=$_POST['number'].' is a prime number. Its factors are 1 and itself.';
		}
	}
	else
		$factorize='Null Value Given!!! How dare you!. ';
}
else
{
$factors='Input not found.... variable empty!!!';
}

?>
<h1> Factorization of a number ? </h1>
<form method="post">
<fieldset><legend>Factorization</legend>
<div class="fourty_per"><label> Give The Number :</label><input name="number" type="text" />&nbsp;<input type="submit" value="Let me do it!" /></div>
<div id="factor_result" class="sixty_per"><?php if(isset($factorize)) echo $factorize;?> </div>
</fieldset>
</form>

</body>
</html>