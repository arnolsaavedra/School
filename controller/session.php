<?php

class session
{
    public static function existsAttribute($name)
    {
        $rpta = false;
        if (isset($_SESSION[$name])) {
            $rpta = true;
        }
        return $rpta;
    }

    public static function getAttribute($name)
    {
        $rpta = null;
        if (self::existsAttribute($name)) {
            $rpta = $_SESSION[$name];
        }
        return $rpta;
    }

    public static function setAttribute($name, $valor)
    {
        $_SESSION[$name] = $valor;
    }

    public static function removeAttribute($name)
    {
        if (self::existsAttribute($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function valida()
    {
        $ultima              = session::getAttribute("ULTIMA");
        $ahora               = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora) - strtotime($ultima));
        if ($tiempo_transcurrido >= 3600) {
            session_destroy();
            return false;
        }
        return true;
    }

    public static function logout()
    {
        @session_start();
        unset($_SESSION["LOGUIADO"]);
        unset($_SESSION["ID_ROL"]);
        unset($_SESSION["EMAIL"]);
        unset($_SESSION["NOMBRES"]); 
        unset($_SESSION["APELLIDOS"]); 
        
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
