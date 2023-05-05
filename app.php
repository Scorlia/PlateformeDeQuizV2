<?php

class App
{
    public function run()
    {
        // Récupération de l'URL courante
        $url = $_SERVER['REQUEST_URI'];

        // Définition de la liste des routes
        $routes = [
            '/quiz' => 'QuizController@index',
            '/quiz/start' => 'QuizController@start',
            '/quiz/submit' => 'QuizController@submit',
            '/quiz/result' => 'QuizController@result',
        ];

        // Recherche de la route correspondante à l'URL courante
        $controller = null;
        $action = null;
        foreach ($routes as $route => $handler) {
            if ($url === $route) {
                list($controller, $action) = explode('@', $handler);
                break;
            }
        }

        // Si la route n'a pas été trouvée, on affiche une erreur 404
        if (!$controller || !$action) {
            header('HTTP/1.0 404 Not Found');
            echo 'Page not found';
            return;
        }

        // Inclusion du contrôleur correspondant à la route
        require __DIR__ . '/controllers/' . $controller . '.php';

        // Création de l'objet contrôleur
        $controllerClass = ucfirst($controller) . 'Controller';
        $controllerObject = new $controllerClass();

        // Appel de la méthode correspondant à l'action de la route
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $controllerObject->$action($_REQUEST, $_SERVER[$method]);
    }
}
