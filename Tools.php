<?php
/**
 * Created by Md. Atiqur Rahman
 * Email: atiq.cse.cu0506.su@gmail.com
 * Skype: atiq.cu
 * Date: 4/22/2015
 * Time: 8:25 PM
 * Last Modified : 24th April 2015
 * Features : Mainly static type functions
 *
 * ******** Method list *******************
 * 1.  arrayToCsv
 * 2.  csvToArray
 * 3.  removeDoubleSpace
 * 4.  removeSpace
 * 5.  removeSpaceFeed
 * 6.  smartClean
 * 7.  replaceSpaceWithParam
 * 8.  replaceParamWithParam
 * 9.  dumps
 * 10. dump
 * 11. csvToArray
 * 12. processKendoFilters
 * 13. processKendoClause
 * 14. camelCaseToFlat
 * 15. flatToCamelCase
 * 16. average
 * 17. sum
 *
 */



class Tools {

    // list all files of a dir....
    // rename file
    // delete file....
    // change attributes of a file...
    // raw function need to edit for fit in this class

    // for ftp class : ftp_mkdir , ftp_chdir, ftp_rmdir, ftp_delete, ftp_cdup
    // why not a class fileManager!

    function check_for_directory()
    {
        //use real_path function
        if (!file_exists($this->directory_name))
        {
            mkdir($this->directory_name,0777);
        }
        @chmod($this->directory_name,0777);
    }

    function listChr(){
        for ($i = 0; $i < 256; ++$i) {
            static $genNum;
            $genNum++;
            echo "chr($genNum) will output '";
            echo (chr($genNum));
            echo "'< br>\n";
        }
    }
    function Encode($txtData,$Level){
        for ($j = 0;$j<$Level;$j++){
            $tmpStr = '';
            for ($i = 0;$i<strlen($txtData);$i++)
                $tmpStr .= ord(substr(strtoupper($txtData), $i, 1));
            $txtData = $tmpStr;
        }
        return (strlen($Level)).$Level.$txtData;
    }

    function Decode($txtData){
        $intLevel = substr($txtData, 1, substr($txtData, 0, 1));
        $startStr = substr($txtData, substr($txtData, 0, 1)+1, strlen($txtData));
        for ($j = 0;$j<$intLevel;$j++){
            for ($i = 0;$i<strlen($startStr);$i+=2)
                $tmpStr .= chr(intval(substr($startStr, $i, 2)));
            $startStr = $tmpStr;

            $tmpStr = "";
        }
        return $startStr;
    }

    function ascii2str($str) {
        $arr=array(
            "&#32;"=>' ', "&#33;"=>'!', "&#34;"=>'"', "&#35;"=>'#', "&#36;"=>'$',
            "&#37;"=>'%', "&#38;"=>'&', "&#39;"=>"'", "&#40;"=>'(', "&#41;"=>')',
            "&#42;"=>'*', "&#43;"=>'+', "&#44;"=>',', "&#45;"=>'-', "&#46;"=>'.',
            "&#47;"=>'/', "&#48;"=>'0', "&#49;"=>'1', "&#50;"=>'2', "&#51;"=>'3',
            "&#52;"=>'4', "&#53;"=>'5', "&#54;"=>'6', "&#55;"=>'7', "&#56;"=>'8',
            "&#57;"=>'9', "&#58;"=>':', "&#59;"=>';', "&#60;"=>'<', "&#61;"=>'=',
            "&#62;"=>'>', "&#63;"=>'?', "&#64;"=>'@', "&#65;"=>'A', "&#66;"=>'B',
            "&#67;"=>'C', "&#68;"=>'D', "&#69;"=>'E', "&#70;"=>'F', "&#71;"=>'G',
            "&#72;"=>'H', "&#73;"=>'I', "&#74;"=>'J', "&#75;"=>'K', "&#76;"=>'L',
            "&#77;"=>'M', "&#78;"=>'N', "&#79;"=>'O', "&#80;"=>'P', "&#81;"=>'Q',
            "&#82;"=>'R', "&#83;"=>'S', "&#84;"=>'T', "&#85;"=>'U', "&#86;"=>'V',
            "&#87;"=>'W', "&#88;"=>'X', "&#89;"=>'Y', "&#90;"=>'Z', "&#91;"=>'[',
            "&#92;"=>'\\', "&#93;"=>']', "&#94;"=>'^', "&#95;"=>'_', "&#96;"=>'`',
            "&#97;"=>'a', "&#98;"=>'b', "&#99;"=>'c', "&#100;"=>'d', "&#101;"=>'e',
            "&#102;"=>'f', "&#103;"=>'g', "&#104;"=>'h', "&#105;"=>'i', "&#106;"=>'j',
            "&#107;"=>'k', "&#108;"=>'l', "&#109;"=>'m', "&#110;"=>'n', "&#111;"=>'o',
            "&#112;"=>'p', "&#113;"=>'q', "&#114;"=>'r', "&#115;"=>'s', "&#116;"=>'t',
            "&#117;"=>'u', "&#118;"=>'v', "&#119;"=>'w', "&#120;"=>'x', "&#121;"=>'y',
            "&#122;"=>'z', "&#123;"=>'{', "&#124;"=>'|', "&#125;"=>'}', "&#126;"=>'~'
        );
        return strtr($str,$arr);
    }

    function utfCharToNumber($char) {
        $i = 0;
        $number = '';
        while (isset($char{$i})) {
            $number.= ord($char{$i});
            ++$i;
        }
        return $number;
    }

    //echo Encode('123',4).'<br>';
    //echo Decode(Encode('123',5));

    // end of raw functions...............................
    //==============================================================================================

    /**
     * Get intersecting as wel as subtracting element of two array
     * @author  Md. Atiqur Rahman
     * @param $arr1
     * @param $arr2
     * @return array
     */
    public function arrayCompare($arr1, $arr2){

        $ret =array();
        $ret['count']['arr1']=count($arr1);
        $ret['count']['arr2']=count($arr2);
        $ret['unique']['arr1']=array_diff($arr1, $arr2);
        $ret['unique']['arr2']=array_diff($arr2, $arr1);
        $ret['given']['arr1']=$arr1;
        $ret['given']['arr2']=$arr2;

        if(count($ret['unique']['arr1'])>0){

            foreach($ret['unique']['arr1'] as $key=>$val){

                unset($arr1[$key]);

            }
            $ret['unique']['common']= $arr1;
        }
        else $ret['unique']['common']= $ret['given']['arr1'];

        $ret['count']['common']=count($ret['unique']['common']);

        return $ret;

    }

    /**
     * Calculate sum of given numbers
     * Example : sum(3,2,1); sum(false,array(),5,5); // will return 10
     * @return int|string
     */
    public static function sum(){
        $s=0;
        foreach(func_get_args() as $a) $s+= is_numeric($a)? $a: 0;
        return $s;
    }

    /**
     * Calculates average of some given number
     * Example : average(10, 15, 20, 25);
     * @return float
     */
    public static function average(){
        return array_sum(func_get_args())/func_num_args();
    }

    /**
     * For more perfect case conversion see below
     * http://framework.zend.com/manual/2.2/en/modules/zend.filter.word.html
     * @param array $input
     * @param string $sap
     * @return string
     */
    public static function flatToCamelCase($input='', $sap='_'){
        $ret = explode($sap, $input);
        $output='';
        foreach($ret as $rt) $output.= ucfirst($rt);
        return $output;
    }

    /**
     * @param $string
     * @param string $sap
     * @return string
     */
    public static function camelCaseToFlat($string, $sap='_'){

        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode($sap, $ret);
    }

    /**
     * @param array $arr
     * @param string $separator - default is ', ' (comma+space)
     * @return string
     */
    public static function arrayToCsv($arr=array(), $separator=', '){

        if(is_array($arr) and count($arr)>0){
            $sap='';
            $return='';
            foreach($arr as $r){
                $return.=$sap.$r;
                $sap=$separator;
            }
            return $return;

        }else return '';
    }

    /**
     * @param string $str
     * @param string $sap - default is ', ' (comma+space)
     * @return array
     */
    public static function csvToArray($str='', $sap=', '){

        if(strlen($str)>0){
            $return = explode($sap, $str);
            return $return;

        }else return array();
    }



    //white space removing..

    /**
     * @param null $string
     * @param string $rep
     * @return mixed
     */
    public static function removeDoubleSpace($string = null, $rep=' '){
        return  $ret = preg_replace('/([\s])\1+/', $rep, $string);
    }

    /**
     * @param null $string
     * @param string $rep
     * @return mixed
     */
    public static function removeSpace($string = null, $rep=''){
        return $ret = preg_replace('/[\s]+/', $rep, $string );
    }

    /**
     * @param null $s
     * @param string $rep
     * @return mixed
     */
    public static function removeSpaceFeed( $s = null, $rep=''){
        return $ret = preg_replace('/[\t\n\r\0\x0B]/', $rep, $s);
    }

    /**
     * @param null $s
     * @return string
     */
    public static function smartClean($s = null){
        return $ret = trim( self::removeDoubleSpace( self::removeSpaceFeed($s) ) );
    }

    /**
     * @param null $string
     * @param string $rep
     * @return mixed
     */
    public static function replaceSpaceWithParam($string = null, $rep='_'){
        $ret = trim(self::removeSpaceFeed($string));
        return self::replaceParamWithParam($ret, ' ', $rep);
    }

    /**
     * @param $string
     * @param $replace
     * @param string $with
     * @return mixed
     */
    public static function replaceParamWithParam($string, $replace, $with=' '){
        return str_replace($replace, $with, $string);
    }



    /**
     * dumping multiple vars
     * @param bool $die
     */
    public static function dumps($die=true){
        echo '<pre>';
        $args = func_get_args();
        foreach ($args as $arg){
            if(is_array($arg) && count($arg)>0) print_r($arg);
            elseif(is_object($arg)) print_r($arg);
            else var_dump($arg);

        }
        echo "</pre>";
        if($die===true)	die('Died from dumps helper...');
    }

    /**
     * @author  Md. Atiqur Rahman
     * @param string $var
     */
    public function println($var =''){

        echo $var.'<br/>';
    }

    /**
     * @author  Md. Atiqur Rahman
     * @param $var
     * @param bool $die
     * @param null $die_msg
     */
    public static function dumpInPre($var, $die=false, $die_msg=NULL){

        echo '<pre>'.$var.'</pre>';
        if($die===true)	die('Died from dumper'.$die_msg);
    }

    /**
     * Dumping variable for debugging
     * @param $var
     * @param bool $die
     * @param null $die_msg
     * @param bool $varDump
     */
    public static function dump($var, $die=true, $die_msg=NULL, $varDump=false){

        if('comment'===$die){   echo '<!-- ';}
        echo '<pre>';

        if($varDump===true)  var_dump($var);
        elseif(is_array($var) && count($var)>0) print_r($var);
        elseif(is_object($var)) print_r($var);
        else var_dump($var);

        echo '</pre>';
        if($die==='comment') echo '-->';
        if($die===true)	die('Died from dump helper...'.$die_msg);
    }

    /**
     * @param $conf - An associative array with value as Index/key and label text as array value $arr['car']= 'Select Car'
     * @param $elementName  - name of the select element
     * @param string $selected  - any item should be selected when created pass the value here createSelectBox($arr, 'trans', 'car', , 'class="primary"');
     * @param null $elementId
     * @param null $attributes - extra attributes like class , style etc.
     * @return bool|string
     */
    public static function createSelectBox($conf, $elementName, $selected='', $elementId=NULL, $attributes=NULL){

        if(is_array($conf)){
            $return='<select name="'.$elementName.'" size="1" '.(NULL!=$elementId?' id="'.$elementId.'" ':'').$attributes.' >';
            foreach($conf as $value=>$labelText){
                $return.='<option value="'.$value.'" ';
                if($value== $selected) $return.=' selected ';
                $return.=' >'.$labelText.'</option>';
            }
            $return.='</select>';
            return $return;
        }
        return false;
    }

    /**
     * todo - need to improve
     * @param $arrFilter
     * @return string
     */
    function processKendoFilters($arrFilter){
        $logic= strtolower($arrFilter['logic']);
        $clause=' ';
        switch($logic){

            case 'and':
                $clause .= self:: processKendoClause($arrFilter['filters']);
                break;
            default :
                die('something wrong happened!');
        }
        return $clause ;
    }

    /**
     * todo - need to improve
     * @param $filters
     * @param string $logic
     * @return string
     */
    function processKendoClause($filters, $logic='AND'){

        $separator ='';
        $clause = '';
        foreach($filters as $flt){
            switch($flt['operator']){
                case 'contains': $clause .= $separator."$flt[field] LIKE '%$flt[value]%'"; break;
                case 'doesnotcontain': $clause .= $separator."$flt[field] NOT LIKE '%$flt[value]%'"; break;
                case 'startswith': $clause .= $separator."$flt[field] LIKE '$flt[value]%'"; break;
                case 'endswith': $clause .= $separator."$flt[field] LIKE '%$flt[value]'"; break;

                case 'eq': $clause .= $separator."$flt[field] = '$flt[value]'"; break;
                case 'gte': $clause .= $separator."$flt[field] >= '$flt[value]'"; break;
                case 'lt': $clause .= $separator."$flt[field] < '$flt[value]'"; break;
                case 'lte': $clause .= $separator."$flt[field] <= '$flt[value]'"; break;
                case 'neq': $clause .= $separator."$flt[field] != '$flt[value]'"; break;
            }
            $separator = " $logic ";
        }
        return $clause;
    }

}





