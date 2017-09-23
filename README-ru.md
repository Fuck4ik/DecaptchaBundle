# DecaptchaBundle

Symfony Decaptcha bundle.

Пакет создан для стандартизации всех сервисов по разгадыванию капч. У каждого сервиса есть свои особенности и теперь вам не нужно оперировать несколькими пакетами. Достаточно лишь ознакомится с имеющейся документацией для того чтобы настроить каждый. Пакет покрывает всю функциональность сервисов. Если вам будет недостаточно имеющейся функциональности, буду рад выслушать все предложения. Бандл реализован на основе https://github.com/jumper423/decaptcha

### Выбор языка
+ [English](./README.md)

### Меню
+ [Документация](https://github.com/jumper423/decaptcha)
+ [Сервисы](#Сервисы)
+ [Установка](#Установка)
+ [Использование](#Использование)

# Сервисы
Распознование капч по всех популярных сервисах

+ [RuCaptcha](https://rucaptcha.com?from=4461711)
+ [2Captcha](https://2captcha.com/)
+ [AntiCaptcha](https://anti-captcha.com/)
+ [Captcha24](http://captcha24.com/)
+ [Pixodrom](http://pixodrom.com/)
+ [R.I.P. Captcha](http://ripcaptcha.com/)

# Установка

## Скачивание бандла

Предпочтительный способ установить это расширение через [composer](http://getcomposer.org/download/).

Либо запустить
```sh
composer require omasn/decaptcha-bundle "*"
```
или добавить
```json
"omasn/decaptcha-bundle": "1.1.*"
```
в файл `composer.json`.

## Включение бандла

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
## Конфигурация бандла
Настройте api_key у тех сервисов по распознаванию капч, которые вы хотите использовать.

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

# Использование

Небольшой пример того как на основе сервиса RuCaptcha получить ваш текущий баланс в системе и по имеющемуся url распознать капчу.

### Пример в экшене контролллера

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

### Применение дополнительной конфигурации

Добавим в конфиг RuCaptcha дополнительные параметры "[Описание полей](https://github.com/jumper423/decaptcha/blob/master/docs/RuCaptchaInstruction-ru.md#%D0%9E%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5-%D0%BF%D0%BE%D0%BB%D0%B5%D0%B9)"

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