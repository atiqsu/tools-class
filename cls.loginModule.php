<?php
/**
 * Created by Md. Atiqur Rahman
 * Email: atiq.cse.cu0506.su@gmail.com
 * Skype: atiq.cu
 * Date:  29/04/2015
 * Time: 1:53 AM
 * Last Modified : 29rd month 2015
 *
 */


namespace loginModule;


class LoginModule {

    private $internalDbLink = true;
    private $externalDbLink = false;

    private $dbHost = "";  // Host Name
    private $dbPort = "";  // Port
    private $dbUser = "";  // MySQL Database Username
    private $dbPass = "";  // MySQL Database Password
    private $dbName = "";  // Database Name
    private $domain = "";  // Your Users Table

    private $secureKey = "";  // A Secure Key For Cookie Encryption. Don't make this public
    private $passwordSalt = "";  // Secret Password Salt. Only change once before making user registration public.
    private $company = "Automation Solutions";  // Company for name for including in emails

    protected $phpSessionStart = false;
    protected $emailLogin = true;  // Make Login With Username & E-Mail Possible
    public $rememberMe = true;  // Add Remember Me Feature.
    private $blockBruteForce = true; // Deny login for $LS->bfTime seconds after incorrect login tries of 5
    public $bfTime = 300; // The time IN SECONDS for which block from login action should be done after 5 incorrect login attempts. Use http://www.easysurf.cc/utime.htm#m60s for converting minutes to seconds. Default : 5 minutes

    //for registering user.... todo - will implement later
    public $staticPages = array(
        "/", "/reset.php", "/register.php"
    );

    private $siteUrl = "http://www.atiqurrahman.com"; // The login page. ex : /login.php or /accounts/login.php
    private $loginPage = "/login.php"; // The login page. ex : /login.php or /accounts/login.php
    private $homePage = "/home.php";  // The home page. The main page for logged in users. Redirects to here when logs in

    public $isLoggedIn = false;
    public $userName = 'Guest';
    public $userRole = 'Guest';
    protected $loggedTime = false;
    protected $sessionId = false;
    protected $dbLink = null;
    public $lastError = '';
    public $log = array();


    public function __construct($sessionStart=false){

        $this->phpSessionStart = boolval($sessionStart);
        if($this->phpSessionStart == true){
            session_start();
        }
        $this->isLoggedIn = false;
        $this->dbLink = null;
        $this->passwordSalt = 'atiqur';
        $this->log[]= 'Module initiated at -'.date('Y-m-d H:i:s');

        $this->cookie  = isset($_COOKIE['loginModule']) ? $_COOKIE['loginModule'] : array();
        $this->session  = isset($_SESSION['loginModule']) ? $_SESSION['loginModule'] : array();
        $this->remCookie  = isset($_COOKIE['loginModuleRemMe']) ? $_COOKIE['loginModuleRemMe'] : array();

    }


    public function login($userName, $password, $redirect =false){
        if($this->isLoggedIn) return true;
        if($this->dbLink == null){
            $this->lastError = 'Database not initiated';
            return false;
        }
        $stored =  $this->dbLink->readUser($userName);
        if($stored== false){
            $this->lastError = 'Data retrieve failed from database.';
            return false;
        }
        $id = $stored['id'];
        $pass= $stored['password'];
        $saltedPass = hash('sha256', "{$password}{$this->passwordSalt}{$id}");
        if($pass != $saltedPass){
            $this->lastError = 'Username of password wrong!';
            // todo - update attempts
            return false;
        }

        $this->session['name'] = $this->userName = $stored['name'];
        $this->session['role'] = $this->userRole = $stored['role'];
        $this->session['loggedTime'] = $this->loggedTime = date('Y-m-d H:i:s');
        $this->session['isLoggedIn'] = $this->isLoggedIn = true;

        $this->updateSession();

    }

    private function updateSession(){
        $_SESSION['loginModule'] = $this->session;
        return true;
    }

    public function checkLoginStatus(){
        if($this->isLoggedIn){
            return 'Logged : '.$this->userName.' as '.$this->userRole.' since '.$this->loggedTime;
        }
        return 'Not logged in - '.$this->loginUrl();
    }

    public function loginUrl(){
        return '/login.php';
    }

    public function logoutUrl(){
        return '/logout.php';
    }


    /**
     * Setter for phpSessionStart
     * @param bool $flag
     * @return bool
     */
    public function setSession($flag=true){
        $this->phpSessionStart = $flag;
        return true;
    }

    /**
     * Getter for phpSessionStart
     * @return bool
     */
    public function getSession(){
        return $this->phpSessionStart;
    }







} 