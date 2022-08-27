[![Latest Stable Version](http://poser.pugx.org/gilclei/check-cns/v)](https://packagist.org/packages/gilclei/check-cns) [![Total Downloads](http://poser.pugx.org/gilclei/check-cns/downloads)](https://packagist.org/packages/gilclei/check-cns) [![Latest Unstable Version](http://poser.pugx.org/gilclei/check-cns/v/unstable)](https://packagist.org/packages/gilclei/check-cns) [![License](http://poser.pugx.org/gilclei/check-cns/license)](https://packagist.org/packages/gilclei/check-cns) [![Size](https://img.shields.io/github/repo-size/gilcleis/check-cns)]() [![Size](https://img.shields.io/github/stars/gilcleis/check-cns)]()

Check-CNS
=======
Projeto de uma biblioteca para validar numero do CPF

## Necessário
[![PHP Version Require](http://poser.pugx.org/gilclei/check-cns/require/php)](https://packagist.org/packages/gilclei/check-cns)


Instalação
------------

Use o composer para gerenciar suas dependências e baixar check-cns:

```bash
composer require gilclei/check-cns
```

Example
-------
```php
<?php

use Gilclei\CheckCns\CheckCNS;

require_once "vendor/autoload.php";

$cns = '703404696479515';

if (CheckCNS::isValid($cns)){
    echo 'ok';
}
?>

```
```
php exemple.php
```
```
vendor/bin/phpunit tests/
```
