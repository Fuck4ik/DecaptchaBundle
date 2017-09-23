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
####Initialization
Configure your api_key in the parameters from your used service for capturing the captcha. You can configure several services at once.

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

Example how to call the RuCapcha of obtaining a balance and recognizing Captcha from a link to a picture

### Open Controller

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
