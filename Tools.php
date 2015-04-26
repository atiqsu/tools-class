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
 * 1. arrayToCsv
 * 2. csvToArray
 * 2. removeDoubleSpace
 * 2. removeSpace
 * 2. removeSpaceFeed
 * 2. smartClean
 * 2. replaceSpaceWithParam
 * 2. replaceParamWithParam
 * 2. dumps
 * 2. dump
 * 2. csvToArray
 *
 *
 */



class Tools {

    // list all files of a dir....
    // rename file
    // delete file....
    // change attributes of a file...

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
}





