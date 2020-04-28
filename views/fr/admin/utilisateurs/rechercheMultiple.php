<?php
if (!empty($_POST))
{
    $user = new \Psiko\UserSystem();
    $_SESSION["notification"] = $user->recherche($_POST,"fr");
}

?>


<form class="form-recherche" method="POST" action="rechercheMultiple.php">
    <input type="checkbox" name="freqCardiaque" id="freqCardiaque" /> <label for="freqCardiaque">Fréquence cardiaque</label><br />
    <input type="checkbox" name="tempPeau" id="tempPeau" /> <label for="tempPeau">Teampérature de la peau</label><br />
    <input type="checkbox" name="reflexeVisuel" id="reflexeVisuel" /> <label for="reflexeVisuel">Réflexes visuels</label><br />
    <input type="checkbox" name="recoTonalite" id="recoTonalite" /> <label for="recoTonalite">Reconnaissance de tonalité</label><br />
    <input type="checkbox" name="memoCouleur" id="memoCouleur" /> <label for="memoCouleur">Mémorisation de couleurs</label><br />


    <div class="form-group">
        <label for="dateDebut" class="form-control-label">Date de début</label> <br>
        <input id="dateDebut" class="form-control" name="dateDebut" value="2020-04-27" min="2020-1-1" max="2100-1-1" type="date">
    </div>
    <div class="form-group">
        <label for="dateFin" class="form-control-label">Date de fin</label> <br>
        <input id="dateFin" class="form-control" name="dateFin" value="2020-04-27" min="2020-1-1" max="2100-1-1" type="date">
    </div>

    <button type="submit" class="btn-submit">Rechercher</button>
</form>

<?php
    if(isset($_POST)){
        if(isset($_POST['freqCardiaque'])){
            $dateDebut=$_POST['dateDebut'];
            $dateFin=$_POST['dateDebut'];
            $reponse = $pdo->query('SELECT freqCardiaque FROM resultat_examen WHERE dateDebut=$dateDebut AND dateFin=$dateFin');
            while($donnees=$reponse->fetch()){
                echo $donnees['freqCardiaque'];
            }
        }

        if(isset($_POST['tempPeau'])){
            $reponse = $pdo->query('SELECT tempPeau FROM resultat_examen WHERE dateDebut=$dateDebut AND dateFin=$dateFin');
            while($donnees=$reponse->fetch()){
                echo $donnees['tempPeau'];
            }
        }

        if(isset($_POST['reflexeVisuel'])){
            $reponse = $pdo->query('SELECT reflexeVisuel FROM resultat_examen WHERE dateDebut=$dateDebut AND dateFin=$dateFin');
            while($donnees=$reponse->fetch()){
                echo $donnees['reflexeVisuel'];
            }
        }

        if(isset($_POST['recoTonalite'])){
            $reponse = $pdo->query('SELECT recoTonalite FROM resultat_examen WHERE dateDebut=$dateDebut AND dateFin=$dateFin');
            while($donnees=$reponse->fetch()){
                echo $donnees['recoTonalite'];
            }
        }

        if(isset($_POST['memoCouleur'])){
            $reponse = $pdo->query('SELECT memoCouleur FROM resultat_examen WHERE dateDebut=$dateDebut AND dateFin=$dateFin');
            while($donnees=$reponse->fetch()){
                echo $donnees['memoCouleur'];
            }
        }
    }

    else{
        echo "erreur";
    }
?>