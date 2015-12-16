<?php

use Symfony\Component\HttpFoundation\Request;

// Page d'accueil
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})->bind('home');

// Détails sur un médicament
$app->get('/film/{id}', function($id) use ($app) {
    $film = $app['dao.film']->find($id);
    return $app['twig']->render('film.html.twig', array('film' => $film));
})->bind('film');

// Liste de tous les médicaments
$app->get('/film/', function() use ($app) {
    $films = $app['dao.film']->findAll();
    return $app['twig']->render('films.html.twig', array('films' => $films));
})->bind('films');

