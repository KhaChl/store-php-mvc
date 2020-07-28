<?php

function controllersAutoLoad($classname)
{
  include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllersAutoLoad');
