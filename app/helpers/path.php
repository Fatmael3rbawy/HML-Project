<?php

function getModuleName($moduleName)
{
    return app_path('Modules' . DS() . $moduleName . DS());
}

function loadRoutes($moduleName, $fileName)
{
    return (getModuleName($moduleName) . 'routes' . DS() . $fileName . '.php');
}
function loadViews($moduleName)
{
    return (getModuleName($moduleName) . 'resources' . DS() . 'views');
}
function loadMigrations($moduleName)
{
    return (getModuleName($moduleName) . 'database' . DS() . 'Migrations');
}
function DS()
{
    return DIRECTORY_SEPARATOR;
}
