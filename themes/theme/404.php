<?php

use Timber\Timber;
$context = Timber::context();
Timber::render('templates/pages/404.twig', $context);
