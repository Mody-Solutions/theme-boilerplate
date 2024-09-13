<?php

use Timber\Timber;
$context = Timber::context();
Timber::render('templates/pages/single.twig', $context);
