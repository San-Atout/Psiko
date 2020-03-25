<?php


namespace Psiko;


use Psiko\database\TicketsTable;
use Psiko\helper\Helper;
use Psiko\helper\Notification;

class TicketSystem
{
    private String $fichierSupllementaireLink;
    private TicketsTable $db;

    public function __construct()
    {
        $this->db = new TicketsTable();
    }

    public function createATicket($POST, $FILES, $langue)
    {
        $this->fichierSupllementaireLink = "";
        if (!empty($FILES ["fileOne"]["name"]))
        {
            if (!$this->canUpload($FILES["fileOne"],$langue)) return;
        }

        if (!empty($FILES ["fileTwo"]["name"]))
        {
            if (!$this->canUpload($FILES["fileTwo"],$langue)) return;
        }
        if (!empty($FILES ["fileThree"]["name"]))
        {
            if (!$this->canUpload($FILES["fileThree"],$langue)) return;
        }
        $user = $_SESSION["auth"];
        $this->db->insertNewTicket($POST["titre"],$POST["contenue"], $POST["destinataire"], $user->getId(),$this->fichierSupllementaireLink);
        $this->fichierSupllementaireLink = "";
    }

    private function canUpload($File,$langue)
    {
        $tailleMax= 256000;
        $extensionAutoriser = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        $extensionFichier = strtolower(substr(strrchr($File['name'], '.'),1));
        if (!in_array($extensionFichier,$extensionAutoriser)){
            $_SESSION["notification"] = Notification::errorExtensionNotSupported($langue);
            return false;
        }
        if ($File["size"] > $tailleMax){
            $depassement = ($File["size"] - $tailleMax)/1000;
            $_SESSION["notification"]["error"] = Notification::errorFileTropLourd($langue,$depassement);
            return false;
        }
        $nomfichier = Helper::chaineAleatoire(20).".".$extensionFichier;
        $cheminFichier ="files-admin-tickets/";
        $chemin = $cheminFichier.$nomfichier;
        $this->fichierSupllementaireLink = $this->fichierSupllementaireLink .$chemin." ";
        $resultat = move_uploaded_file($File['tmp_name'],$chemin);
        if ($resultat) return true;
        $_SESSION["notification"]["error"] = Notification::errorUploadFiles($langue);
        return false;
    }
}