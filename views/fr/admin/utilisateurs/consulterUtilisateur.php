<?php
if (!isset($_SESSION["auth"]))
{
    header("Location: /fr/connexion/");
    exit();
}
if ($_SESSION["auth"]->getRang() != "administrateur")
{
    header("Location: /fr/401");
    exit();
}
$aleatoire = \Psiko\helper\Helper::chaineAleatoire(20);
$user = new \Psiko\UserSystem();
$userAdmin = $user->getAllUser();
?>
<div class="center">
    <table class="mes-users">
        <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
        <th>Numéro</th>
        <th>Validation</th>		
        <th>Modifier le profil</th>
        <th>Modifier le profil complet</th>
        <th>Bannir l'utilisateur<br>(Suppression du compte)</th>
        </thead>
        <tbody>
        <?php
        $i=0;
       	$contenueAAfficher = "";
        foreach ($userAdmin as $t)
        {
        	$contenueAAfficher .="<tr>";
        	$classCSS = ($i % 2 == 0) ? "mes-users-td-1" : "mes-users-td-2";
        	$contenueAAfficher .= "<td>".htmlspecialchars($t->getNom())." </td>
                                   <td>".htmlspecialchars($t->getPrenom())."</td>
                                   <td>".htmlspecialchars($t->getEmail())."</td>
                                   <td>".htmlspecialchars($t->getTelephone())."</td>";

        if($t->isValider()){
            $contenueAAfficher .= " <td class='user is checked'>Utilisateur Validé
                                    <a href='/fr/admin/utilisateurs/".$t->getId()."'>
                                    </a></td>";
                  
        }
        else {
            $contenueAAfficher .= " <td><a href='/fr/admin/utilisateurs/".$t->getId()."'></a>
                                    <input class='btn btn-good' type='button' value='Valider' ></a> 
                                    </td>";
            }   
                

        	$contenueAAfficher .= " <td><a href='/fr/admin/utilisateurs/".$t->getId()."'></a>
        							<input class='btn btn-black' type='button' value='Modifier' ></a> 
                                    <td>
                                    <a href='/fr/admin/tickets/".$t->getId()."'> 
                                    <input class='btn btn-black' type='button' value='Consulter le profil' ></a> 
                                    <td>
                                    <input class='btn btn-black' type='button' value='Bannir' ></a> 
                                    </td>";                               
        

		}

			$i++;
            echo $contenueAAfficher;

		?>
		</tbody>
	</table>
</div>




