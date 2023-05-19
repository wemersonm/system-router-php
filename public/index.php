<?php
session_start();
require 'bootstrap.php';
try {
    
    $returnedInController = router();
    $view = $returnedInController['view'];
    $title = $returnedInController['title'];
    extract($returnedInController);
    require ROOT . '/app/views/template.php';
} catch (Exception $e) {
    echo $e->getMessage();
}
