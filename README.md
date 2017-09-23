# DecaptchaBundle

Symfony Decaptcha bundle.

The package is created for standardization of all services on guessing Captcha. Each service has its own characteristics and now you do not need to operate a few packages. It is enough only to familiarize with the available documentation in order to customize each. The package covers all the functionality of the services. If you do not have enough functionality, I'll be happy to hear all the suggestions. Bundle is implemented on the basis of https://github.com/jumper423/decaptcha

### Choose Language
+ [Russian](./README-ru.md)

### Menu
+ [Documentation](https://github.com/jumper423/decaptcha)
+ [Services](#Services)
+ [Installation](#Installation)
+ [Usage](#Usage)

# Services
Captcha Recognition for all popular services

+ [RuCaptcha](https://rucaptcha.com?from=4461711)
+ [2Captcha](https://2captcha.com/)
+ [AntiCaptcha](https://anti-captcha.com/)
+ [Captcha24](http://captcha24.com/)
+ [Pixodrom](http://pixodrom.com/)
+ [R.I.P. Captcha](http://ripcaptcha.com/)

# Installation

## Get the bundle

Let Composer download and install the bundle by running

Or you can run
```sh
composer require omasn/decaptcha-bundle "*"
```
or add
```json
"omasn/decaptcha-bundle": "1.1.*"
```
in file `composer.json`.

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
## Configuration bundle
Configure api_key for those Captcha Recognition services that you want to use.

```yaml
# app/config/config.yml
omasn_decaptcha:
    ru_captcha:
        api_key: '%api_key%'
    anticaptcha:
        api_key: '%api_key%'
    captcha_24:
        api_key: '%api_key%'
    pixodrom:
        api_key: '%api_key%'
    ripcaptcha:
        api_key: '%api_key%'
    socialink:
        api_key: '%api_key%'
    two_captcha:
        api_key: '%api_key%'
```

# Usage

A small example of how on the basis of the RuCaptcha service to get your current balance in the system and by the available url to recognize the captcha.

### Example in the controller action

```php
// src/AppBundle/Controller/DefaultController.php
...
public function indexAction()
{
    $oReCapcha = $this->get('decaptcha.ru_captcha');
    $iBalance = $oReCapcha->getBalance();
    ...
    if ($oReCapcha->recognize('http://site.ru/captcha.jpg')) {
        $code = $oReCapcha->getCode();
        if (!$myApp->validCode($code)) {
            $oReCapcha->notTrue(); // not valid code request in api
        }
    } else {
        $error = $oReCapcha->getError();
    }
}
...
```

### Using an additional configuration

Add additional parameters to the RuCaptcha configuration "[Description of fields](https://github.com/jumper423/decaptcha/blob/master/docs/RuCaptcha-en.md#a-description-of-the-fields)"

```php
// src/AppBundle/Controller/DefaultController.php

use Omasn\DecaptchaBundle\Services\RuCaptcha;

...
public function indexAction()
{
    $oReCapcha = $this->get('decaptcha.ru_captcha');
    $oReCapcha->setParams([
        RuCaptcha::ACTION_FIELD_FILE => '/file/to/path',
    ]);
}
...
```