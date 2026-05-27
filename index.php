<?php

require(__DIR__ . '/src/model.php');

$rows = get_infos();

require(__DIR__ . '/templates/home.php');
