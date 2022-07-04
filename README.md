# Laravel Template

### Dependencies
1. PHP
    - [darkaonline/l5-swagger](https://github.com/DarkaOnLine/L5-Swagger) - OpenApi or Swagger Specification for your project
    - [tcg/voyager](https://voyager.devdojo.com/) - Admin panel
    - [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar) - Debug Bar
    - [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper) - Package generates helper files that enable your IDE to provide accurate autocompletion
    - [nunomaduro/larastan](https://github.com/nunomaduro/larastan) - Static Analyzer
    - [stechstudio/laravel-php-cs-fixer](https://github.com/stechstudio/Laravel-PHP-CS-Fixer) - PHP Coding Style Fixer
2. JS
    - [bootstap 5](https://getbootstrap.com/) - Frontend toolkit

### Common commands
1. Generate api documentation at `api/documentation`
```bash
composer generate-api-doc
```
2. Generate PHPDocs for models
```bash
php artisan ide-helper:models "App\Models\Post"
```
3. Analyze code using `larastan`
```bash
composer larastan
```
4. Coding style fix 
```bash
composer cs-fix
```
