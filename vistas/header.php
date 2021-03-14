<!DOCTYPE html>
<html>
    <head>
        <title><?php 
        
        if(isset($title)) {
            echo $title . " - ";
        }
        //echo $resultado[0]['titulo'] . " - ";
?>0and6.xyz</title>
<link rel="icon" type="image/png" href="/blog/lgicon.png">
        <meta charset="UTF-8">
        <link href="<?php echo $configs['url'];?>/estilos/prism.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Blog personal dirigido a aficionados a la programacion, fisica, electronica y matematicas">
    </head>
    <body>
        <header>
            <h1><a href="<?php echo $configs['url'];?>">0and6</a></h1>
        </header>
