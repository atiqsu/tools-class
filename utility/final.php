<?php
/**
 * Created by Md. Atiqur Rahman
 * Email: atiq.cse.cu0506.su@gmail.com
 * Skype: atiq.cu
 * Date:  18/05/2015
 * Time: 1:53 AM
 * Last Modified : 18rd month 2015
 *
 */
require_once '../Tools.php';
$tools = new Tools();

//$tools->dump($tools);
//      anchored_text
if(isset($_POST['black_board']) && !empty($_POST['black_board'])){

    $input = $_POST['black_board'];

    if(isset($_POST['allSmall'])){
        $result=strtolower($input);

    }elseif(isset($_POST['all_caps'])){
        $result=strtoupper($input);

    }elseif(isset($_POST['capitalizedWord'])){
        $result=ucwords(strtolower($input));

    }elseif(isset($_POST['revers_me'])){
        $result=strrev($input);

    }elseif(isset($_POST['capitalizedSentence'])){
        $arr = explode('.', $input);
        $result='';
        foreach($arr as $line)
            $result .= ucfirst(trim($line)).'. ';

    }elseif(isset($_POST['br_all_line'])){
        // currently inactive
        $result=nl2br($input);

    }elseif(isset($_POST['replaceHyphenWithUScore'])){
        $result=$tools->replaceParamWithParam($input, '-', '_');

    }elseif(isset($_POST['replaceSpaceWithUScore'])){
        $result=$tools->replaceParamWithParam($input, ' ', '_');

    }elseif(isset($_POST['replaceUScoreWithSpace'])){
        $result=$tools->replaceParamWithParam($input, '_', ' ');

    }elseif(isset($_POST['removeBRTag'])){
        $result = preg_replace('/<(br|BR)[^>]*>/', '', $input );

    }elseif(isset($_POST['removeHtmlTag'])){
        $result = preg_replace('/<[^>]*>/', '', $input );

    }elseif(isset($_POST['flatToCamelCaseClassStyle'])){
        $result=$tools->flatToCamelCase($input);

    }elseif(isset($_POST['CamelCaseToUScore'])){
        $result=$tools->camelCaseToFlat($input);

    }elseif(isset($_POST['flatToCamelCaseVarStyle'])){
        $result=$tools->flatToCamelCase($input);
        $result[0] = strtolower($result[0]);
        var_dump($result[0]);

    }elseif(isset($_POST['extractAnchor'])){
        $DOM = new DOMDocument;
        $DOM->loadHTML($input);
        $items = $DOM->getElementsByTagName('a');

        foreach ($items as $url) {
            $attributes = $url->attributes;
            echo "<br>$url->nodeValue is $attributes->href";
        }

        for ($i = 0; $i < $items->length; $i++){
            $cc[]= $items->item($i)->nodeName;
            $aa[]= $items->item($i)->nodeValue;
            $bb[]= $items->item($i)->attributes;
            $dd[1][]= $items->item($i)->attributes->href;


        }
        $tools->dump($aa,false);
        $tools->dump($bb,false);
        $tools->dump($cc,false);

    }elseif(isset($_POST['extractAnchorText'])){
        $result=$tools->camelCaseToFlat($input);

    }elseif(isset($_POST['extractAnchorLink'])){
        $result=$tools->camelCaseToFlat($input);

    }elseif(isset($_POST['CamelCaseToUScore'])){
        $result=$tools->camelCaseToFlat($input);

    }elseif(isset($_POST['CamelCaseToUScore'])){
        $result=$tools->camelCaseToFlat($input);

    }elseif(isset($_POST['CamelCaseToUScore'])){
        $result=$tools->camelCaseToFlat($input);

    }elseif(isset($_POST['CamelCaseToUScore'])){
        $result=$tools->camelCaseToFlat($input);

    }


    elseif(isset($_POST['base64_decode_fld']))
        $result=base64_decode($input);

    elseif(isset($_POST['md5_fld']))
        $result=md5($input);

    else  $result=$input;
}
else    $result='';


//$tools->dump($result, false);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Utility Tools By Md. Atiqur Rahman</title>
    <link rel="icon" href="./favicon.ico">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/atiq.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Utility Tools</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="top-nav-template col-sm-12">
                <h3>String Formatter</h3>
                <div class="my-style">
                    <form name="stringFormatter" method="post" focus>
                        <fieldset><legend>Editor</legend>
                            <div class="">
                                <label class="control-label">Number of character :: </label>
                                <span id="withSpaceDivId"></span>
                                <span class="displayit"></span>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="black_board" name="black_board" spellcheck="true" rows="10" placeholder='Put Your Code & Edit it' autofocus onKeyUp="characterCounter(this)"><?=$result;?></textarea>
                                </div>
                            </div>

                        </fieldset><br/>

                        <fieldset>
                            <legend>Character formatting</legend>
                            <input name="extractAnchor" type="submit" value="Anchor extractor)" class="btn btn-primary btn-sm " />
                            <input name="flatToCamelCaseClassStyle" type="submit" value="CamelCase (Class)" class="btn btn-primary btn-sm " />
                            <input name="flatToCamelCaseVarStyle" type="submit" value="CamelCase (Variable)" class="btn btn-success btn-sm " />
                            <input name="CamelCaseToUScore" type="submit" value="CamelCase to _score" class="btn btn-primary btn-sm " />
                            <input name="allSmall" type="submit" value="Make me Small!!" class="btn btn-success btn-sm " />
                            <input name="all_caps" type="submit" value="Make me Capital!!" class="btn btn-primary btn-sm " />
                            <input name="capitalizedWord" type="submit" value="Capitalized word!!" class="btn btn-success btn-sm " />
                            <input name="revers_me" type="submit" value="Make me reversed!!" class="btn btn-primary btn-sm " />
                            <!--<input name="htmlsp_char" type="submit" value="Make me plain!!" class="btn btn-success btn-sm " />
                            <input name="br_all_line" type="submit" value="Give br in all line!!" />                    -->
                            <input name="capitalizedSentence" type="submit" value="Capitalized sentence!!" class="btn btn-success btn-sm " />
                            <input name="replaceHyphenWithUScore" type="submit" value="Replace hyphen with uscore!!" class="btn btn-primary btn-sm " />
                            <input name="replaceSpaceWithUScore" type="submit" value="Replace space with uscore!!" class="btn btn-success btn-sm " />
                            <input name="replaceUScoreWithSpace" type="submit" value="Replace uscore with space!!" class="btn btn-primary btn-sm " />
                            <input name="anchored_text" type="submit" value="Pick anchor only!!" class="btn btn-success btn-sm " />
                            <input name="removeBRTag" type="submit" value="Remove all br!!" class="btn btn-primary btn-sm " />
                            <input name="removeHtmlTag" type="submit" value="Remove all HTML tag!!" class="btn btn-success btn-sm " />

                        </fieldset>


                    </form>

                </div>
            </div>
        </div>



    </div><!-- /.container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/atiq.js"></script>
</body>
</html>