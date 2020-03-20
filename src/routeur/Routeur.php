<?php
namespace Psiko;
use \AltoRouter;

class Routeur extends \AltoRouter
{
    private $viewpath;
    private $publicpath;
    private $router;
    private $pageName;
    private $app;
    public  $pageData;

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
        if (!isset($this->pageName))$this->pageName = $match['name'];
        return $this;
    }

    public function getUrl(string $urlName, ?array $params = array()):string
    {
        return $this->router->generate($urlName, $params);
    }

    public function getAllPageFrench():self
    {
        $this->pageData = array();
        $this->get('/', 'index','Acceuil')

            ->get("/fr/","fr/index", "Acceuil")
            ->get("/fr/connexion","fr/utilisateur/login", "Connexion Fr")

            ->get("/en/","en/index", "Acceuil")
            ->get("/en/login","en/utilisateur/login", "Connexion English")
            ->get("/en/","en/index", "Acceuil")
            ->get("/en/langageNotSuported","en/erreur/langageNotSuported", "Connexion English")

            ->get("/ar/","ar/index", "Acceuil")
            ->get("/ar/tasjiladokhol","ar/utilisateur/login", "Connexion Arabe")

            ->get("/pl/","pl/index", "Acceuil")
            ->get("/pl/logowania","pl/utilisateur/login", "Connexion Polonais")

        ;

        return $this;
    }

    public function getTitre()
    {
        return $this->pageName;
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
}