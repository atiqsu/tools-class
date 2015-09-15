<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Some test..</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	#search {	
		height:25px;
		vertical-align:center;
		overflow-y:hidden;
	}
	#search input {	
		height:20px;
	}
	#search input[type="image"] {	
		margin: 0px 10px;
	}

	#outp {
		padding:5px 5px 5px 20px; 
		border:2px solid #00ff00; 
		margin:15px
	}

	</style>
	<script type="text/javascript">
    function selectText(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
        }
    }
	</script>
  </head>
  <body>
<div class="container-fluid">
    <div class="row">
		<br/><br/>
		<form method="post" class="form-horizontal">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-6"> 
						<input name="inp" type="text"  />				
					</div>
				</div>
				<div class="form-group">				
					<div class="col-md-6"> 
						<input type="submit" name="sbmt" />
					</div>
				</div>
			</div>
		</form>

	</div>
	<div class="row">
		<div id="outp" onclick="selectText('outp')" >


<?php

if(isset($_POST['sbmt'])){
	

	$output = from_camel_case($_POST['inp']);
	echo $output;

	//echo '<pre>'; 	print_r($_POST); 	echo '</pre>';

}
if(isset($_POST['reverse'])){	
	$ret = explode('_', $_POST['inp']);
	$output='';
	foreach($ret as $rt) $output.= ucfirst($rt);	
	echo $output;	
}

?>
		</div>
	</div>
	<div class="row">
		<br/><br/>
		<form method="post" class="form-horizontal">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-6"> 
						<input name="inp" type="text"  />				
					</div>
				</div>
				<div class="form-group">				
					<div class="col-md-6"> 
						<input type="submit" name="reverse" value="Reverse" />
					</div>
				</div>
			</div>
		</form>

	</div>

</div>
</body></html>

<?php

function from_camel_case($input) {
  preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
  $ret = $matches[0];
  foreach ($ret as &$match) {
    $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
  }
  return implode('_', $ret);
}
//$underscored = strtolower( preg_replace( '/([A-Z])/', '_$1', lcfirst( $camelCase ) ) );



/*


///other best

// from the org
namespace MyNamespace\Utility;
use Zend\Filter\Word\CamelCaseToUnderscore;
use Zend\Filter\Word\UnderscoreToCamelCase;

class String
{
    public function test()
    {
        $underscoredStrings = array(
            'simple_test',
            'easy',
            'html',
            'simple_xml',
            'pdf_load',
            'start_middle_last',
            'a_string',
            'some4_numbers234',
            'test123_string',
        );
        $camelCasedStrings = array(
            'simpleTest',
            'easy',
            'HTML',
            'simpleXML',
            'PDFLoad',
            'startMIDDLELast',
            'AString',
            'Some4Numbers234',
            'TEST123String',
        );
        echo PHP_EOL . '-----' . 'underscoreToCamelCase' . '-----' . PHP_EOL;
        foreach ($underscoredStrings as $rawString) {
            $filteredString = $this->underscoreToCamelCase($rawString);
            echo PHP_EOL . $rawString . ' >>> ' . $filteredString . PHP_EOL;
        }
        echo PHP_EOL . '-----' . 'camelCaseToUnderscore' . '-----' . PHP_EOL;
        foreach ($camelCasedStrings as $rawString) {
            $filteredString = $this->camelCaseToUnderscore($rawString);
            echo PHP_EOL . $rawString . ' >>> ' . $filteredString . PHP_EOL;
        }
    }

    public function camelCaseToUnderscore($input)
    {
        $camelCaseToSeparatorFilter = new CamelCaseToUnderscore();
        $result = $camelCaseToSeparatorFilter->filter($input);
        $result = strtolower($result);
        return $result;
    }

    public function underscoreToCamelCase($input)
    {
        $underscoreToCamelCaseFilter = new UnderscoreToCamelCase();
        $result = $underscoreToCamelCaseFilter->filter($input);
        return $result;
    }
}
//http://framework.zend.com/manual/2.2/en/modules/zend.filter.word.html


*/