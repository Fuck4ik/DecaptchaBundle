# DecaptchaBundle
Symfony Decaptcha bundle. Сделана на основе https://github.com/jumper423/decaptcha
Пакет создан для стандартизации всех сервисов по разгадыванию капч. У каждого сервиса есть свои особенности и теперь Вам надо будет всего лишь взглянуть на документацию конкретного сервиса чтобы правильно всё сделать. Так же пакет покрывает всю функциональсть сервисов. Если же Вам будет чего-то нехватать или будут предложения, я буду только рад их услышать.

###Выбор языка
+ [English](./README.md)

###Меню
+ [Документация](https://github.com/jumper423/decaptcha)
+ [Сервисы](#Сервисы)
+ [Установка](#Установка)
+ [Использование](#Использование)

#Сервисы
Распознование капч по всех популярных сервисах

+ [RuCaptcha](https://rucaptcha.com?from=4461711)
+ [2Captcha](https://2captcha.com/)
+ [AntiCaptcha](https://anti-captcha.com/)
+ [Captcha24](http://captcha24.com/)
+ [Pixodrom](http://pixodrom.com/)
+ [R.I.P. Captcha](http://ripcaptcha.com/)

#Установка

## Скачивание бандла

Предпочтительный способ установить это расширение через [composer](http://getcomposer.org/download/).

Либо запустить
```sh
composer require omasn/decaptcha-bundle "*"
```
или добавить
```json
"omasn/decaptcha-bundle": "dev-master"
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
##Конфигурация бандла
Настройте api_key у тех сервисов по распознованию капч, которые вы хотите использовать.

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

#Использование

Небольшой пример того как на основе сервиса RuCaptcha получить ваш текущий баланс в системе и по ссылке на распознать капчу.

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
