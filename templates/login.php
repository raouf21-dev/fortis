<?php
$title = 'login';
require_once 'header.php';
?>
        <div class="register">
            <img src="images/contact.jpg" alt="">
        </div>
    <div class="container register">
        
        <form class="register-form" method="POST">
            <?php if(isset($msg) != '') : ?>
                <div class="alert <?php echo $msgClass ?>"><?php echo $msg ?></div>
            <?php endif ?>
            <h2>Connexion </h2>
            <div class="register-div">
                <label for="">E-mail:</label>
                <input type="text" id="email" name="email" class="register-input" placeholder="Votre Email" value="<?php isset($emailConnect) ? $emailConnect : '' ?>">
            </div>
            <div class="register-div">
                <label for="">Mot de passe:</label>
                <input type="password" id="password"  name="password" class="register-input" placeholder="Mot de passe">
            </div>
            <input type="submit" value="Se connecter" class="submit-btn" name="submit">
        </form>
    </div>

<?php require_once 'footer.php' ?>