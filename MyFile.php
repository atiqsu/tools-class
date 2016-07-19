<?php

/**
 * Created by Md. Atiqur Rahman
 * Email: atiq.cse.cu0506.su@gmail.com
 * Skype: atiq.cu
 * Date: 19/07/2016
 * Time: 1:35 PM
 */
class MyFile
{

    /**
     * Mods : R+W+A+X+C+ :
     * @author Md. Atiqur Rahman <atiqur@shaficonsultancy.com, atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param string $name
     * @param string $mode
     * @return void
     */
    public function createFile($name='NewFile', $mode='w+'){

        $myFile = fopen($name, $mode);
        fclose($myFile);
    }

    public function openAndWrite($name, $data, $truncate=false){

        $mode = 'a+';
        if($truncate) $mode = 'w+';
        $myFile = fopen($name, $mode);
        fwrite($myFile, $data);
        fclose($myFile);
    }

    function fwrite_stream($fp, $string) {
        for ($written = 0; $written < strlen($string); $written += $fwrite) {
            $fwrite = fwrite($fp, substr($string, $written));
            if ($fwrite === false) {
                return $written;
            }
        }
        return $written;
    }


    function chkServer($host, $port)
    {
        $hostip = @gethostbyname($host); // resloves IP from Hostname returns hostname on failure

        if ($hostip == $host) // if the IP is not resloved
        {
            echo "Server is down or does not exist";
        }
        else
        {
            if (!$x = @fsockopen($hostip, $port, $errno, $errstr, 5)) // attempt to connect
            {
                echo "Server is down";
            }
            else
            {
                echo "Server is up";
                if ($x)
                {
                    @fclose($x); //close connection
                }
            }
        }
    }

}