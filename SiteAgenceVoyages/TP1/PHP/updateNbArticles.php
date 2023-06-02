<?php 
    session_start();
    $nbArticles = $_POST['nbArticles'];
    $_SESSION['nbArticles'] = $nbArticles;
?>