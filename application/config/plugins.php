<?php
return array (
  0 => 
  array (
    'name' => 'LimeSurvey internal database',
    'description' => 'Core: Database authentication + exports.',
    'type' => 'simple',
    'vendor' => 'Limesurvey Development Team',
    'class' => 'ls\\core\\plugins\\AuthDb',
    'path' => '/home/sam/Projects/LimeSurvey/application/core/plugins/Authdb',
    'autoload' => 
    array (
      'psr-4' => 
      array (
        'ls\\core\\plugins\\' => '',
      ),
    ),
    'apiVersion' => '1.0',
  ),
  1 => 
  array (
    'name' => 'LimeSurvey server auth',
    'description' => 'Core: Webserver authentication',
    'type' => 'simple',
    'vendor' => 'Limesurvey Development Team',
    'class' => 'ls\\core\\plugins\\AuthWebServer',
    'path' => '/home/sam/Projects/LimeSurvey/application/core/plugins/Authwebserver',
    'autoload' => 
    array (
      'psr-4' => 
      array (
        'ls\\core\\plugins\\' => '',
      ),
    ),
    'apiVersion' => '1.0',
  ),
  2 => 
  array (
    'name' => 'Demo authentication plugin',
    'description' => 'Core: Demo authentication',
    'type' => 'simple',
    'vendor' => 'Limesurvey Development Team',
    'class' => 'ls\\core\\plugins\\DemoAuth',
    'path' => '/home/sam/Projects/LimeSurvey/application/core/plugins/DemoAuth',
    'autoload' => 
    array (
      'psr-4' => 
      array (
        'ls\\core\\plugins\\' => '',
      ),
    ),
    'apiVersion' => '1.0',
  ),
  3 => 
  array (
    'name' => 'LimeSurvey Authorization db',
    'description' => 'Core: Database authorization.',
    'type' => 'simple',
    'vendor' => 'Limesurvey Development Team',
    'class' => 'ls\\core\\plugins\\PermissionDb',
    'path' => '/home/sam/Projects/LimeSurvey/application/core/plugins/PermissionDb',
    'autoload' => 
    array (
      'psr-4' => 
      array (
        'ls\\core\\plugins\\' => '',
      ),
    ),
    'apiVersion' => '1.0',
  ),
  4 => 
  array (
    'name' => 'Audit Log',
    'description' => 'Core: Create an audit log of changes.',
    'type' => 'simple',
    'vendor' => 'Limesurvey Development Team',
    'class' => 'ls\\AuditLog\\AuditLog',
    'path' => '/home/sam/Projects/LimeSurvey/plugins/AuditLog',
    'autoload' => 
    array (
      'psr-4' => 
      array (
        'ls\\AuditLog\\' => '',
      ),
    ),
    'apiVersion' => '1.0',
  ),
  5 => 
  array (
    'name' => 'ModulePlugin',
    'description' => 'Example plugin that uses a Yii module.',
    'type' => 'module',
    'vendor' => 'Befound',
    'class' => 'befound\\ls\\ModulePlugin\\ModulePlugin',
    'path' => '/home/sam/Projects/LimeSurvey/plugins/befound/ls/ModulePlugin',
    'autoload' => 
    array (
      'psr-4' => 
      array (
        'befound\\ls\\ModulePlugin\\' => '',
      ),
    ),
    'apiVersion' => '1.0',
  ),
);