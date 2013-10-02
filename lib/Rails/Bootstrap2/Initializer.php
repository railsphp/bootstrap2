<?php
namespace Rails\Bootstrap2;

class Initializer
{
    public function initialize()
    {
        \Rails::assets()->addPaths([
            realpath(__DIR__ . '/../../../vendor/assets/javascripts'),
            realpath(__DIR__ . '/../../../vendor/assets/stylesheets'),
            realpath(__DIR__ . '/../../../vendor/assets/images'),
        ]);
    }
}
