A mini blog written in PHP with Symfony
====
http://symfony.com/doc/current/book/index.html

Bootstrap theme from http://www.bootswatch.com

```
1. composer install
2. php bin/console doctrine:schema:update
->2.5. if running in prod use assetic to dump assets
3. php bin/console server:run

Directory Structure:
├── app
│   ├── Resources
│   └── config
├── bin
├── src
│   └── AppBundle
├── tests
│   └── AppBundle
├── var
│   ├── cache
│   ├── logs
│   └── sessions
├── vendor
│   ├── behat
│   ├── bin
│   ├── composer
│   ├── doctrine
│   ├── incenteev
│   ├── jdorn
│   ├── knplabs
│   ├── kriswallsmith
│   ├── leafo
│   ├── monolog
│   ├── paragonie
│   ├── patchwork
│   ├── psr
│   ├── sensio
│   ├── sensiolabs
│   ├── swiftmailer
│   ├── symfony
│   └── twig
└── web
    ├── bundles
    ├── css
    ├── fonts
    └── js


