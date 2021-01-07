<?php
namespace Santana\Controller;

class UserController {

    /* Inscription */
    public function register(\Santana\Repository\UserRepository $userRepository){
        
        
        if(isset($_POST["name"]) 
        && isset($_POST['email']) 
        && isset($_POST['phone']) 
        && isset($_POST['password']) 
        && isset($_POST['password_con'])  
        ){
            
            $msg = '';
            $msgClass = '';

            $name = $emailFrom = $subject = $phone = $message = "";

            function verifyInput($var){
                $var = trim($var);
                $var = stripslashes($var);
                $var = htmlspecialchars($var);

                return $var;
            }

                $name           = verifyInput($_POST['name']) ; 
                $email          = verifyInput($_POST['email']);
                $phone          = verifyInput($_POST['phone']);
                $password       = verifyInput(sha1($_POST["password"]));
                $password_con   = verifyInput(sha1($_POST["password_con"]));

                if(empty($name) || empty($email) || empty($password) || empty($password_con))
                {
                    $msg = "Veuillez remplir tous les champs";
                    $msgClass = "alert-danger";
                }
                else if(empty($name))
                {
                    $msg = "Veuillez entrer votre nom";
                    $msgClass = "alert-danger";
                }
                else if(empty($password || $password_con))
                {
                    $msg = "Veuillez entrer un mot de passe";
                    $msgClass = "alert-danger";
                }
                else if ($_POST["password"] != $_POST["password_con"])
                {
                    $msg = "Veuillez entrer le même mot de passe";
                    $msgClass = "alert-danger";
                }
                else if(empty($email)) 
                {
                    $msg = "Veuillez entrer un email";
                    $msgClass = "alert-danger";
                }
                else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                {
                    $msg = "Veuillez entrer un email valide";
                    $msgClass = "alert-danger";
                }

                else
                {
                    try {
                    $db = new \PDO('mysql:host=185.98.131.91;charset=utf8mb4;dbname=steph1430804',"steph1430804",'x6oyvyb3hy');
                    echo 'Connected';
                    }catch (PDOExeption $e){
                        echo "Failed ".$e->getMessage;
                    }
                    $userVerify = $db->prepare("SELECT * FROM user WHERE email = ? ");
                    $userVerify->execute(array($email));
                    $exist = $userVerify->rowCount();
                    if($exist){
                        $msg = "email déja utilisé";}
                        $msgClass = "alert-danger";
                    }

                if(empty($msg)){
                    $userReq = $userRepository->registerNewUser($_POST['name'],$_POST['email'],$_POST['phone'],sha1($_POST["password"]),sha1($_POST["password_con"]));
                    
                    $msg = "Votre inscription a bien été enregistrée";
                    $msgClass = "alert-success";
                }
             }
            require_once PROJECT_DIR . "/templates/register.php";
        }

        /* Connexion */

        public function login(\Santana\Repository\UserRepository $loginRepository){
        
        function verifyInput($var){
            $var = trim($var);
            $var = stripslashes($var);
            $var = htmlspecialchars($var);

            return $var;
        }

        if(isset($_POST['email']) && isset($_POST['password'])){

            $emailConnect   = verifyInput($_POST['email']);
            $password       = verifyInput($_POST['password']);
            $passwordHashed = sha1($password);
            
            $userLogin = $loginRepository->loginUser($emailConnect,$passwordHashed);
            if($userLogin && !empty($emailConnect) && !empty($password)){
                $_SESSION['user'] = $userLogin['id'];
                header('Refresh: 1;URL=home');
                $msg = "Bienvenue ". $userLogin['name'];
                $msgClass = "alert-success";
                
            }else {
                $msg = "mail et/où mot de passe incorrect";
                $msgClass = "alert-danger";
            }    
    }
        require_once PROJECT_DIR . "/templates/login.php";
    }
}