<?php

date_default_timezone_set('America/Bogota');
ini_set("display_errors", '1');

class Util {

    public function __construct() {
        
    }
                            //arnol saavedra

    public function traerurlbase() {
        //si esta en produccion no usar uri
        //si esta en local usar uri
        $host = $_SERVER["HTTP_HOST"];
      // $uri = $_SERVER["REQUEST_URI"];
       $uri ="/";
        $url = "https://" . $host . $uri;
        //$url = explode("/", $url);
        //$folderMain = "";
        // $url = $url[0] . "//" . $url[2] . "/" . $url[3] . "/";
        return $url;
    }

    public function traerPathBase() {
        return realpath( $_SERVER["DOCUMENT_ROOT"]).DIRECTORY_SEPARATOR;
    }

    public function eliminarTildes($cadena) {
        $cadena = str_replace(
                array('ÃƒÂ¡', 'ÃƒÂ ', 'ÃƒÂ¤', 'ÃƒÂ¢', 'Ã‚Âª', 'Ãƒï¿½', 'Ãƒâ‚¬', 'Ãƒâ€š', 'Ãƒâ€ž'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $cadena
        );

        $cadena = str_replace(
                array('ÃƒÂ©', 'ÃƒÂ¨', 'ÃƒÂ«', 'ÃƒÂª', 'Ãƒâ€°', 'ÃƒË†', 'ÃƒÅ ', 'Ãƒâ€¹'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $cadena);

        $cadena = str_replace(
                array('ÃƒÂ­', 'ÃƒÂ¬', 'ÃƒÂ¯', 'ÃƒÂ®', 'Ãƒï¿½', 'ÃƒÅ’', 'Ãƒï¿½', 'ÃƒÅ½'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $cadena);

        $cadena = str_replace(
                array('ÃƒÂ³', 'ÃƒÂ²', 'ÃƒÂ¶', 'ÃƒÂ´', 'Ãƒâ€œ', 'Ãƒâ€™', 'Ãƒâ€“', 'Ãƒâ€�'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $cadena);

        $cadena = str_replace(
                array('ÃƒÂº', 'ÃƒÂ¹', 'ÃƒÂ¼', 'ÃƒÂ»', 'ÃƒÅ¡', 'Ãƒâ„¢', 'Ãƒâ€º', 'ÃƒÅ“'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $cadena);

        $cadena = str_replace(
                array('ÃƒÂ±', 'Ãƒâ€˜', 'ÃƒÂ§', 'Ãƒâ€¡'), array('n', 'N', 'c', 'C'), $cadena
        );
        return $cadena;
    }

    public function crearcarpeta($destino) {
        $flag = false;
        if (!file_exists($destino)) {
           $flag = mkdir($destino, 0777, true);
        }
        return $flag;
    }

    // $archicvo = yo.gif
    // imgUrls/1/
    
    public function subirArchivo($archivo, $destino) {
//        $destino = "../../../../../Archivos/";
        
        if (isset($archivo['name'])) {
            $nombre = $this->eliminarTildes($archivo['name']);
            $tipo = $archivo['type'];
            $tamano = $archivo['size'];
            $tmp = $archivo['tmp_name'];
            $ruta = $destino . $nombre;

            if (!file_exists($destino)) {
                mkdir($destino, 0777, true);
            }
            if (move_uploaded_file($tmp, $ruta)) {
                return $nombre;
            } else {
                //error al consultar
                return "0";
            }
        } else {
            return "0";
        }
    }

    public function eliminarArchivo($dest, $arch) {
        if (file_exists($dest . $arch)) {
            unlink($dest . $arch);
        }
    }

}
