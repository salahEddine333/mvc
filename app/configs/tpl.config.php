<?php
return [
  "head_start"            => TEMPLATES_PATH . DS . 'head_start.php',
  "head_end"              => TEMPLATES_PATH . DS . 'head_end.php',
  "footer"                => TEMPLATES_PATH . DS . 'footer.php',
  "nav"                   => TEMPLATES_PATH . DS . 'navbar.php',
  ":view"                 => "view",
  "parent_container_start"  => TEMPLATES_PATH . DS . 'parent_container_start.php',
  "parent_container_end"  => TEMPLATES_PATH . DS . 'parent_container_end.php',
  "head_ressources" => [
    "all"             => CSS . 'all.min.css',
    "fontawesome"     => CSS . 'fontawesome.min.css',
    "bootstrap"       => CSS . 'bootstrap.min.css',
    "main"            => CSS . 'main.css'
  ],
  "footer_ressources" => [
    "jquery"          => JS . 'jquery.min.js',
    "nicescroll"      => JS . 'jquery.nicescroll.min.js',
    "fontawesome"     => JS . 'fontawesome.min.js',
    "popper"          => JS . 'popper.min.js',
    "bootstrap"       => JS . 'bootstrap.min.js',
    "main"            => JS . 'main.js'
  ]
];
