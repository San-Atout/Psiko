<?php
$userSystem = new \Psiko\UserSystem();

if (isset($_FILES["profilPicture"]))
{
    $r = $userSystem->changeProfilPicture($_FILES["profilPicture"],$_SESSION["auth"]->getId(),"fr");
}
$salutation = [];
$user = $userSystem->getUserById($_SESSION["auth"]->getId());
$form = new \Psiko\helper\form();

?>
    <div class="modif-profil">

            <div class="bienvenueprofil">
                <h1> Bienvenue  </h1>
                <img src="/avatar/<?=$user->getPhotoPicture()?>"  width="300px" height="300px" style="border-radius: 150px; padding: 25px; ">
            </div>
            <form method="post" action="" enctype="multipart/form-data" class="changement-image-modif-profil" >
                <?=$form->inputFile("profilPicture","Photo de profil :",".png,.jpg")?>
                <input type="submit" class="btn btn-neutral" value="Changer Votre photo de profil">
            </form>
            <div class="bienvenueprofil">

                <input class="boutonbienvenueprofil " name="upload" type="submit" value=" Ajouter Une Nouvelle Image"/>
            </div>


            <div class="id">
                <p>
                    <label for="id">Identifiant</label><input class="id" type="text" name="id" id="id" placeholder="123456789" required/>
                </p>
            </div>
            <div class="noms">
                <p>
                    <label for="email">Email</label><input class="email" type="email" name="email" id="email" placeholder="jean.dupont10321@isep.fr"/>
                </p>
            </div>

            <p>
                <label for="adresse">Adresse</label> <input type="text" name="adresse" id="nom" placeholder="52 rue Jean Moulin - Paris 75005 " >
            </p>

            <p>
                <label for="sexe">Sexe</label>
                <input type="text" name="sexe" id="nom" placeholder="M / F" >
            </p>

            <p>
                <label for="telephone">Téléphone</label> <input type="text" name="telephone" id="telephone" placeholder="06.01.02.03.04"/>
            </p>
            <div class="motpasse">
                <p>
                    <label for="motpasse">Mot de passe</label> <input type="password" name="password" id="motpasse" placeholder="motpasse1234"/>
                </p>
            </div>

            <p class="indication">Assurez vous de bien saisir les données que vous souhaitez modifier. </p>

            <p>
                <input class="bouton_2" name="update" type="submit" value=" Modifier"/>
            </p>
        </fieldset>
    </div>

