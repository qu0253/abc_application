<?php

class AclComponent extends object {
    var $components = array('Session', 'Auth');
    function check($users, $path) {
        $arrPath = explode('/', $path);
        if (is_array($arrPath) && count($arrPath) > 1) {
            $action = explode('_', $arrPath[1]);
        } else {
            $action[0] = '';
        }
        if (empty($this->params['prefix']) && $action[0] == $this->Session->read('Auth.Role.name')) {
            $this->Auth->allow('*');
            return true;
        }
        return false;
    }
    function __call($name, $arguments) {
        echo "<br/>$name";
    }
}

?>