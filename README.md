# DecaptchaBundle
Symfony Decaptcha bundle, распознавание капч для всех популярных сервисов rucaptcha.com, 2captcha.com, pixodrom.com, captcha24.com, socialink.ru, anti-captcha.com

# Installation

## Get the bundle

Let Composer download and install the bundle by running

```sh
php composer.phar require omasn/decaptcha-bundle: 1.1
```

## Enable the bundle

```php
// in app/AppKernel.php
public function registerBundles() {
	$bundles = [
		...
		new Omasn\DecaptchaBundle\DecaptchaBundle(),
	];
	...
}
```

# Usage

This example shows how to call the RuCapcha service and request a balance

### Open Controller

```php
// src/AppBundle/Controller/DefaultController.php
...
public function indexAction()
{
    $oReCapcha = $this->get('decaptcha.ru_captcha');
    $iBalance = $oReCapcha->getBalance();
}
...
```
