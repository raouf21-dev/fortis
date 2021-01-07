<?php
    $title = "sing in";
    
    require_once 'header.php' ;
?>

        <div class="register">
            <img src="images/contact.jpg" alt="">
        </div>
    <div class="container register">
        
        <form class="register-form" method="POST" action="">
            <?php if(isset($msg) != ''): ?>
                <div class="alert <?php echo $msgClass; ?>"> <?php echo $msg ?></div>
            <?php endif?>
            <h2>Inscription </h2>
            <div class="register-div">
                <label for="">Nom <span class="etoile">*</span></label>
                <input type="text" id="name" name="name" class="register-input"  placeholder="Votre Nom" value="">
            </div>
            <div class="register-div">
                <label for="">E-mail <span class="etoile">*</span></label>
                <input type="text" id="email" name="email" class="register-input" placeholder="Votre Email"  value="">
            </div>
            <div class="register-div">
                <label for="">Tél (Facultatif)</label>
                <input type="number" id="phone"  name="phone" class="register-input" placeholder="Votre Numéro"  value="">
            </div>
            <div class="register-div">
                <label for="">Mot de passe <span class="etoile">*</span></label>
                <input type="password" id="password"  name="password" class="register-input" placeholder="Mot de passe"  value="">
            </div>
            <div class="register-div">
                <label for="">Confirmation du mot de passe <span class="etoile">*</span></label>
                <input type="password" id="password_con"  name="password_con" class="register-input" placeholder="Confirmez le mot de passe"  value="">
            </div>
            <input type="submit" value="Enregistrer" class="submit-btn" name="submit">
        </form>
    </div>

<?php require_once 'footer.php' ?>