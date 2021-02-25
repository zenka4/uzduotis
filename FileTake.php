<?php

use MyProject\Entity\FileReader;

session_start();
include __DIR__ . '/App.php';

App::upload();
