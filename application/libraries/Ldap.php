<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ldap {

    function valida_ldap($usr, $pwd) {
        $ldap_server = '172.16.0.1';
        $dominio = 'PMBG\\';
        $auth_user = $dominio . $usr;
        $auth_pass = $pwd;
// Tenta se conectar com o servidor
        if (!($connect = @ldap_connect($ldap_server))) {
            return FALSE;
        }
// Tenta autenticar no servidor
        if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
// se não validar retorna false
            return FALSE;
        } else {

            return TRUE;
        }
    }

}

?>