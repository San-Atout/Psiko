<p>Veuillez entrer un ou plusieurs critères dans votre recherche</p>

<form class="form-recherche" method="POST" action="rechercheMultiple.php">
    <input type/>
    <?= $form->input("nom", "Nom de Famille :", "text", true, "DOE") ?>
    <?= $form->input("prenom", "Prénom :", "text", true, "John") ?>
    <?= $form->input("email", "Email :", "email", true, "John.Doe@isep.fr") ?>
    <?= $form->input("adresse", "Votre adresse", "text", true, "JaimeLesMangarine") ?>
    <?= $form->input("numeroTelephone", "Votre Numero de téléphone", "text", true, "0601020304") ?>
    <?= $form->inputDate("birthday", "Date de naissance", "1900-1-1", "2100-1-1") ?>
    <?= $form->inputSelect("sexe", "Sexe", array("H" => "Homme", "F" => "Femme", "NR" => "non renseigné"), "NR") ?>
    <button type="submit" class="btn-submit">Rechercher</button>
</form>