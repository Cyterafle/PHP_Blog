<?php
include 'db_connect.php';

class LoginModel {
    public function login(){
        try{
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
                $result = $conn->query("SELECT `Login` FROM `comptes` WHERE 1;");
            }
        } catch (mysqli_sql_exception $e) {
            return 0;
    }
    return NULL;
    }

    public function register(){
            $username = $_POST['login'];
            $password = md5($_POST['pass']);
            $biography = $_POST['biography'];
            try{
                if (($conn = connection_init()) == NULL){
                    return NULL;
                } else {
                    $result = $conn->query("INSERT INTO `comptes`(`Login`, `MotDePasse`,`Résumé`) VALUES (  '" . $username ."','" . $password ."','" . $biography ."');");
                    $conn->close();
					return $result;
                }
            }catch (mysqli_sql_exception $e) {
                    return 0;
            }
            return NULL;
    }

    public function connect(){
        $username = $_POST['login'];
        $password = md5($_POST['pass']);
        try{
            if (($conn = connection_init()) == NULL){
                return NULL;
            } else {
				$result = $conn->query("SELECT `Id`, `Login`, `DateCreation`, `Résumé`, `MotDePasse` FROM `comptes` WHERE `Login` = '". $username . "';");
				$rows = $result->fetch_assoc();
				if ($rows['MotDePasse'] == $password){
				    $conn->close();
                    foreach (array_slice($rows, 0, 4) as $key => $value){
                        $_SESSION[$key]=$value;
                    }
                	return true;
				}
                else {
                    return false;
                }
            }
        } catch (mysqli_sql_exception $e) {
                return $e->getMessage();
        }
	}
}