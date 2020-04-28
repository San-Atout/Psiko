<?php
if (!empty($_POST))
{
    $userSystem = new \Psiko\UserSystem();
    $r = $userSystem->recherche($_POST, "fr",1);
    var_dump($r);
}

?>


<form class="form-recherche" method="POST" action="">
    <input type="checkbox" name="freqCardiaque" id="freqCardiaque" /> <label for="freqCardiaque">Fréquence cardiaque</label><br />
    <input type="checkbox" name="tempPeau" id="tempPeau" /> <label for="tempPeau">Teampérature de la peau</label><br />
    <input type="checkbox" name="reflexeVisuel" id="reflexeVisuel" /> <label for="reflexeVisuel">Réflexes visuels</label><br />
    <input type="checkbox" name="recoTonalite" id="recoTonalite" /> <label for="recoTonalite">Reconnaissance de tonalité</label><br />
    <input type="checkbox" name="memoCouleur" id="memoCouleur" /> <label for="memoCouleur">Mémorisation de couleurs</label><br />


    <div class="form-group">
        <label for="dateDebut" class="form-control-label">Date de début</label> <br>
        <input id="dateDebut" class="form-control" name="dateDebut" value="<?= date("Y-m-d")?>" min="2020-1-1" max="2100-1-1" type="date">
    </div>
    <div class="form-group">
        <label for="dateFin" class="form-control-label">Date de fin</label> <br>
        <input id="dateFin" class="form-control" name="dateFin" value="<?= date("Y-m-d")?>" min="2020-1-1" max="2100-1-1" type="date">
    </div>

    <button type="submit" class="btn-submit">Rechercher</button>
</form>
