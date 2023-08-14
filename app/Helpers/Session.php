<?php
 
class Session
{   
    public function __construct()
    {  
        $this->my_session_start();
    }

    //стартуем сессию, если у пользователя она не создана
    private function my_session_start() {
        if (session_status() == PHP_SESSION_NONE) session_start();
    }
     
    // добавление данных в сессию
    public function my_session_set($key, $val) {
        $_SESSION[$key] = $val;
    }
     
    // получение данных из сессии
    public function my_session_get($key) {
        if (isset($_SESSION[$key])) 
            return $_SESSION[$key];
        else
            return null;
    }
     
    // удаление данных из сессии
    public function my_session_clear($key) {
        if (isset($_SESSION[$key])) unset($_SESSION[$key]);
    }

    //Удалить сессию полностью + куки
    public function full_clear_session(){
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
     
    // добавить во flash-сессию
    public function my_session_flash_set($key, $value) {
        $_SESSION['_flash'][$key] = $value;
    }
     
    // получить из flash-сессии
    public function my_session_flash_get($key) {
        if (isset($_SESSION['_flash'][$key])) {
            $data = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            
            return $data;
        }
        else
            return null;
    }

    



}