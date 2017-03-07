<?php
class Security {

    function __construct() {

    }
    
    function __destruct() {

    }

    public static function logged(){
        if (isset($_SESSION['user']))
            { return true; }
        return false;
    }

    public function isAdmin() {
    if (Security::logged())
    {
        //TODO: curl to know if user is admin
        $user = unserialize($_SESSION['user']);

        return ($user->getAdministrateur() == 1);
    }
    return false;
    }

}
