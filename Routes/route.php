<?php
use FastRoute\RouteCollector;

$router->map('GET', '/resultats', 'ResultatController#afficherResultats');

return function (RouteCollector $r) {

    $r->addRoute('GET', '/', ['QuestionController', 'afficherAccueil']);
    $r->addRoute('GET', '/quiz', ['QuestionController', 'afficherQuiz']);
    $r->addRoute('POST', '/verifier-reponse', ['ReponseController', 'verifierReponse']);
    $r->addRoute('GET', '/resultat', ['ResultatController', 'afficherResultat']);
    $r->addRoute('GET', '/erreur', ['Vue', 'genererVue', ['erreur']]);
};

// Chargement de FastRoute
require_once 'vendor/autoload.php';

// Création du routeur
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'afficherAccueil');
    $r->addRoute('GET', '/quiz', 'afficherQuiz');
    $r->addRoute('POST', '/verifier-reponse', 'verifierReponse');
    $r->addRoute('GET', '/resultat', 'afficherResultat');
});

// Récupération de la méthode HTTP et de l'URL
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Suppression de la query string et du slash final éventuel
$pos = strpos($uri, '?');
if ($pos !== false) {
    $uri = substr($uri, 0, $pos);
}
$uri = rtrim($uri, '/');

// Récupération de la route correspondante
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// Traitement de la route correspondante
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        throw new Exception("Page non trouvée");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        throw new Exception("Méthode HTTP non autorisée");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        switch ($handler) {
            case 'afficherAccueil':
                Vue::genererVue('accueil');
                break;
            case 'afficherQuiz':
                QuestionController::afficherQuiz();
                break;
            case 'verifierReponse':
                if (isset($_POST['id_question']) && isset($_POST['id_reponse'])) {
                    ReponseController::verifierReponse($_POST['id_question'], $_POST['id_reponse']);
                } else {
                    throw new Exception("Impossible de vérifier la réponse : les identifiants de la question et de la réponse ne sont pas définis");
                }
                break;
            case 'afficherResultat':
                ResultatController::afficherResultat();
                break;
            default:
                throw new Exception("Action non valide");
                break;
        }
        break;
    default:
        throw new Exception("Erreur inattendue");
        break;
}
