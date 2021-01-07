<?php
namespace Santana\Repository;

class UserRepository{

    public function registerNewUser($name,$email,$phone,$password,$password_con){
        try {
            $db = new \PDO('mysql:host=185.98.131.91;charset=utf8mb4;dbname=steph1430804',"steph1430804",'x6oyvyb3hy');
        }catch (PDOExeption $e){
            echo "Failed ".$e->getMessage;
        }

        $userReq = $db->prepare("INSERT INTO user (name,email,phone,password) VALUES (:name,:email,:phone,:password)");
        
        $userReq->execute([ ':name'         => $name,
                            ':email'        => $email,
                            ':phone'        => $phone,
                            ':password'     => $password
                    ]);
        
        return $userReq;
    }

    public function loginUser($emailConnect,$passwordHashed){
        try {
            $db = new \PDO('mysql:host=185.98.131.91;charset=utf8mb4;dbname=steph1430804',"steph1430804",'x6oyvyb3hy');
        }catch (PDOExeption $e){
            echo "Failed ".$e->getMessage;
        }

        $userVerify = $db->prepare("SELECT * FROM user WHERE email = ? AND password = ?");

        $userVerify->execute(array($emailConnect, $passwordHashed));
        
        $findUser = $userVerify->fetch();

        return $findUser;    
    }
}