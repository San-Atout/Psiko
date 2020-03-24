<?php
if (!empty($_POST))
{
    $user = new userEntity();
    $_SESSION["notification"] = $user->authentification($_POST["email"],$_POST["password"],"fr");
    if (empty($_SESSION["notification"]))
    {
        $_SESSION["auth"] = $user;
        header("Location: /fr/utilisateur/profil/");
    }
}
$form = new \Psiko\helper\form();

?>
<form class="form_inscription" method="post" action="">
    <?= $form->input("email","Email :","email",true,"John.Doe@isep.fr")?>
    <?= $form->input("password","Mot de Passe :","password",true,"JaimeLesMangarine")?>
    <a href="oublieMDP.html">Mot de passe oublié</a>
    <button type="submit" class="btn-submit">Se connecter</button>

</form>
