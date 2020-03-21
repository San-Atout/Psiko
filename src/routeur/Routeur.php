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
    private $langue;

    public function __construct(string $viewpath, string  $publicpath)
    {
        $this->publicpath = "\\" . $publicpath;
        $this->viewpath = $viewpath;
        $this->router = new AltoRouter();
        $this->router->addMatchTypes(array('animeSlug' => '[a-zA-Z0-9-_]++'));
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
        $match = $this->router->match();
        $view = $match['target'];
        $params = $match['params'];
        if ($view !== null)
        {
            require $this->viewpath . DIRECTORY_SEPARATOR. $view . '.php' ;
        }else{
            $langue404 = $this->wrongLanguage($_SERVER['REQUEST_URI']);
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
            ->get("/fr/connexion","fr/utilisateur/login", "Connexion fr")
            /*Erreur HTTP*/
            ->get("/fr/404","fr/erreur/404", "404 fr")

            ->get("/fr/test","fr/index", "test fr")
        ;

        return $this;
    }

    public function getAllPageAnglais():self
    {
        $this->pageData = array();
        $this->get("/en/","en/index", "Acceuil en")
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
        $this->get("/pl/","pl/index", "Acceuil pl")
             ->get("/pl/logowania","pl/utilisateur/login", "Connexion pl")
            /*Erreur HTTP*/
            ->get("/pl/404","pl/erreur/404", "404 pl")
        ;

        return $this;
    }

    public function getAllPageArabe():self
    {
        $this->pageData = array();
        $this->get("/ar/","ar/index", "Acceuil ar")
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
                    $matchTest = $this->router->match("/".$langue.$urlTest);
                    if ($matchTest != null)
                    {
                        header("Location: /".$langue.$urlTest);
                        exit();
                    }
                }

            }
            return $urlData[0];
        }
        else
        {
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
        return explode("/",substr($_SERVER['REQUEST_URI'],1))[0];
    }
}