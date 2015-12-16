<?php

// Register global error and exception handlers
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());


// Register services.

$app['dao.film'] = $app->share(function ($app) {
    $filmDAO = new MyMovies\DAO\FilmDAO($app['db']);
    $filmDAO->setCategorieDAO($app['dao.categorie']);
    return $filmDAO;
});
// Register services.
$app['dao.categorie'] = $app->share(function ($app) {
    return new MyMovies\DAO\CategorieDAO($app['db']);
});

