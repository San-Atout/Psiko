<?php
namespace Psiko\routeur;
use \AltoRouter;

class Routeur extends \AltoRouter
{
    private $viewpath;
    private $publicpath;
    private $router;
    private $pageName;
    private $app;
    public  $pageData;
    public $langue;

    public function __construct(string $viewpath, string  $publicpath)
    {
        $this->publicpath = "\\" . $publicpath;
        $this->viewpath = $viewpath;
        $this->router = new AltoRouter();
        $this->router->addMatchTypes(array('deleteType' => '[a-zA-Z0-9-_]++'));
    }

    public function get(
        string $url,
        string $view,
        ?string $name = null
    ):self
    {
        try {
            $this->router->map('GET|POST', $url, $view, $name);
        } catch (\Exception $e) {
        }
        return $this;
    }

    public function run():self
    {
        $this->pageName = null;
        $this->langue = explode("/",substr($_SERVER['REQUEST_URI'],1))[0];
        $requestUrl = substr( $_SERVER['REQUEST_URI'], -1) == "/" ? $_SERVER['REQUEST_URI'] : $_SERVER['REQUEST_URI'].'/' ;
        $requestUrl = strtolower($requestUrl);
        $match = $this->router->match($requestUrl);
        $view = $match['target'];
        $params = $match['params'];
        if ($view !== null)
        {
            require $this->viewpath . DIRECTORY_SEPARATOR. $view . '.php' ;
        }else{
            $langue404 = $this->wrongLanguage($requestUrl);
            if (isset($langue404))
            {
                require $this->viewpath . DIRECTORY_SEPARATOR . $langue404.'/erreur/404.php';
            }

        }
        $this->pageName = ($match["name"]);
        return $this;
    }

    public function getUrl(string $urlName, ?array $params = array()):string
    {
        return $this->router->generate($urlName, $params);
    }

    public function getAllPageFrançais():self
    {
        $this->pageData = array();
        $this->get('/', 'index','Acceuil base')
            ->get("/fr/","fr/index", "Acceuil fr")

            ->get("/fr/tickets/","fr/utilisateur/ticketSystem/envoyertickets","EnvoyerTicket fr")
            ->get("/fr/tickets/[i:ticketId]/","fr/utilisateur/ticketSystem/ticketIndividuel","TicketIndividuel fr")
            ->get("/fr/tickets/[i:ticketId]/repondre/","fr/utilisateur/ticketSystem/repondreTicket","TicketUserReponse fr")

            ->get("/fr/admin/tickets/[i:ticketId]/","fr/admin/tickets/consulterTickets","TicketAdminIndividuel fr")
            ->get("/fr/admin/tickets/[i:ticketId]/repondre/","fr/admin/tickets/ajouterReponse","TicketAdminReponse fr")
            ->get("/fr/admin/tickets/[i:ticketId]/rouvrir/","fr/admin/tickets/rouvrir","TicketAdminRouvrir fr")
            ->get("/fr/admin/tickets/[i:ticketId]/changer-niveau-probleme/","fr/admin/tickets/changerLevelPb","ChangerLevelPb fr")
            ->get("/fr/tickets/[i:ticketId]/repondre/","fr/utilisateur/ticketSystem/repondreTicket","RepondreTicket fr")
            ->get("/fr/admin/tickets/[i:idTickets]/fermer/[deleteType:idDelete]/","fr/admin/tickets/cloturerTicket", "fermerAdmin fr")
            ->get("/fr/tickets/[i:idTickets]/fermer/[deleteType:idDelete]/","fr/admin/tickets/fermerUtilisateur", "fermerUtilisateur fr")
            ->get("/fr/mes-tickets/","fr/utilisateur/ticketSystem/mestickets","MesTickets fr")
            /*Partie de l'utilisateur*/
            ->get("/fr/connexion/","fr/utilisateur/connexionSystem/connexion", "Connexion fr")
            ->get("/fr/inscription/","fr/utilisateur/connexionSystem/inscription", "Inscription fr")
            ->get("/fr/utilisateur/profil/","fr/utilisateur/profil", "Profil fr")
            ->get("/fr/utilisateur/resultats/","fr/utilisateur/resultat", "Resultats fr")
            ->get("/fr/deconnexion/","fr/utilisateur/connexionSystem/deconnexion", "Deconnexion fr")
            /*Erreur HTTP*/
            ->get("/fr/404/","fr/erreur/404", "404 fr")
            ->get("/fr/401/","fr/erreur/401", "404 fr")
            /*Partie Generale*/
            ->get("/fr/nous/","fr/general/nous","Nous fr")
            ->get("/fr/mentionlegal/","fr/general/mentionLegal", "mentionLegal fr")
            ->get("/fr/CGU/","fr/general/CGU", "CGU fr")
            ->get("/fr/confidentialite/","fr/general/confidentialite","confidentialite fr")
            ->get("/fr/plan/","fr/general/structureSite","planSite fr")
            ->get("/fr/faq/","/fr/general/FAQ","FAQ fr")
            ->get("/fr/nous-contacter/","/fr/general/contact","NousContacter fr")
            /*Partie de l'administration*/
            ->get("/fr/admin/tickets/","fr/admin/tickets/administrationTicket","AdminTickets fr")
            ->get("/fr/admin/utilisateur/","fr/admin/utilisateurs/consulterUtilisateur","AdminUser fr")
            ->get("/fr/admin/lancer-test/","fr/admin/tests/lancerTest","LancerUnTest fr")
            ->get("/fr/admin/consulterresultat/","fr/admin/tests/consulterResultat","AdminResultat fr")
            /*Administration FAQ*/
            ->get("/fr/admin/faq/","fr/admin/faq/consulterToutesLesQuestions","AdminFAQ fr")
            ->get("/fr/admin/faq/ajouter/","fr/admin/faq/ajouterQuestion","FAQAjouter fr")
            ->get("/fr/admin/faq/[i:questionId]/","fr/admin/faq/consulterUneQuestion","FAQConsulter fr")
            ->get("/fr/admin/faq/[i:questionId]/modifier/","fr/admin/faq/modifQuestion","FAQModif fr")
            ->get("/fr/admin/faq/[i:questionId]/supprimer/[deleteType:idDelete]/","fr/admin/faq/supprimerQuestion", "FAQSupprimer fr")

            /*Description des tests*/
            ->get("/fr/description/frequence-cardiaque/","fr/general/description/testFrequenceCardiaque","frequenceCardiaque fr")
            ->get("/fr/description/memorisation/","fr/general/description/testMemoire","memoire fr")
            ->get("/fr/description/reflexe-auditif/","fr/general/description/testReflexeAuditif","reflexeAuditif fr")
            ->get("/fr/description/reflexe-visuel/","fr/general/description/testReflexeVisuel","reflexeVisuel fr")
            ->get("/fr/description/temperature/","fr/general/description/testTemperature","temperature fr")
            /**Administration utilisateur**/
            ->get("/fr/admin/utilisateur/","fr/admin/utilisateurs/consulterUtilisateur","AdminUser fr")
            ->get("/fr/admin/utilisateur/[i:id]/valider/[deleteType:validerUser]/","fr/admin/utilisateurs/valider","ValidateUser fr")
            ->get("/fr/admin/utilisateur/[i:id]/bannir/[deleteType:bannirUser]/","fr/admin/utilisateurs/bannir","BanUser fr")
            ->get("/fr/admin/utilisateur/[i:id]/","fr/admin/utilisateurs/consulter","consulterProfil fr")
            ->get("/fr/admin/utilisateur/[i:id]/modifier/","fr/admin/utilisateurs/modifier","ModifAdminProfil fr")
            ->get("/fr/resultats/utilisateur/[i:id]/","fr/utilisateur/resultat","ConsulterResultat fr")
        ;

        return $this;
    }

    public function getAllPageAnglais():self
    {
        $this->pageData = array();
        $this
             ->get("/en","en/index", "Acceuil en")
             ->get("/en/","en/index", "Acceuil en")
             ->get("/en/login","en/utilisateur/login", "Connexion en")
             ->get("/en/langageNotSuported","en/erreur/langageNotSuported", "langageNonSupporter en")
            /*Erreur HTTP*/
            ->get("/en/404","en/erreur/404", "404 en")
        ;

        return $this;
    }

    public function getAllPagePolonais():self
    {
        $this->pageData = array();
        $this
             ->get("/pl","pl/index", "Acceuil pl")
             ->get("/pl/","pl/index", "Acceuil pl")
             ->get("/pl/logowania","pl/utilisateur/login", "Connexion pl")
            /*Erreur HTTP*/
             ->get("/pl/404","pl/erreur/404", "404 pl")
        ;

        return $this;
    }

    public function getAllPageArabe():self
    {
        $this->pageData = array();
        $this
             ->get("/ar","ar/index", "Acceuil ar")
             ->get("/ar/","ar/index", "Acceuil ar")
             ->get("/ar/tasjiladokhol","ar/utilisateur/login", "Connexion ar")
            /*Erreur HTTP*/
             ->get("/pl/404","pl/erreur/404", "404 ar")
        ;

        return $this;
    }



    public function getPublicPath()
    {
        return $this->publicpath.DIRECTORY_SEPARATOR;
    }

    private function wrongLanguage($url)
    {
        $langueDispo = ["ar", "fr", "pl", "en"];
        $urlData = explode("/",substr($url,1));
        if (in_array($urlData[0], $langueDispo))
        {
            $urlTest = "";
            for ($i = 1; $i < sizeof($urlData); $i++ )
            {
                $urlTest .= "/".$urlData[$i];
            }
            foreach ($langueDispo as $langue)
            {
                if ($langue !== $urlData[0])
                {
                    $matchTest = $this->router->match("/".$urlTest);
                    if ($matchTest != null)
                    {
                        $this->langue = $langue;
                        header("Location: /".$langue.$urlTest,true, 303);
                        exit();
                    }
                }

            }
            return $urlData[0];
        }
        else
        {
            $this->langue = "en";
            header("Location: /en/langageNotSuported");
            exit();
        }
    }

    public function getPageOtherLanguage()
    {
        $result = array();
        foreach ($this->router->routes as $r)
        {
           if (explode(" ",$r[3])[0] === explode(" ", $this->pageName)[0]) $result[explode(" ",$r[3])[1]] = $this->getUrl($r[3]);
        }
        return $result;
    }

    public function getLangue()
    {
        return $this->langue;
    }
}