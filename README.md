[Русский](#русский) | [English](#english)

---

[![Latest Stable Version](https://img.shields.io/packagist/v/rosgear/rg-wd-kcaptcha.svg)](https://packagist.org/packages/rosgear/rg-wd-kcaptcha)
[![Total Downloads](https://img.shields.io/packagist/dt/rosgear/rg-wd-kcaptcha.svg)](https://packagist.org/packages/rosgear/rg-wd-kcaptcha)
[![Author](https://img.shields.io/badge/author-anton.tivonenko@gmail.com-blue.svg)](mailto:anton.tivonenko@gmail)
[![Source Code](https://img.shields.io/badge/source-rosgear/rg--wd--kcaptcha-blue.svg)](https://github.com/rosgear/rg-wd-kcaptcha)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/rosgear/rg-wd-kcaptcha/blob/main/LICENSE)
![Component type: widget](https://img.shields.io/badge/component%20type-widget-green.svg)
![Component ID: gm-wd-kcaptcha](https://img.shields.io/badge/component%20id-rg.wd.kcaptcha-green.svg)
![php 8.2+](https://img.shields.io/badge/php-min%208.2-red.svg)

<a name="русский"></a>
## <img src="https://raw.githubusercontent.com/rosgear/rg-wd-kcaptcha/refs/heads/main/assets/images/icon.svg" width="64px" height="64px" align="absmiddle"> Виджет «Капча KCaptcha»

Виджет предназначен для защиты веб‑форм от автоматизированного спама посредством интеграции системы верификации KCaptcha.

### Пример применения
#### с менеджером виджетов:
```
$captcha = Ge::$app->widgets->get('rg.wd.kcaptcha', ['width' => 100, 'height' => 70]);
$captcha->run();
```
#### в шаблоне:
```
echo $this->widget('rg.wd.kcaptcha', ['width' => 100, 'height' => 70]);
```
#### с namespace:
```
use Rg\Widget\KCaptcha\Widget as KCaptcha;
(new KCaptcha(['width' => 100, 'height' => 70]))->render();
```
если namespace ранее не добавлен в PSR, необходимо выполнить:
```
Ge::$loader->addPsr4('Rg\Widget\KCaptcha\\', Ge::$app->modulePath . '/rg/rg.wd.kcaptcha/src');
```
#### вывод в тег изображения:
```
$captcha = Ge::$app->widgets->get('rg.wd.kcaptcha', ['toHtml' => true]);
$captcha->run();
// результат: <img src="data:image/png;base64..." />
```
#### с плохой реализацией:
```
use Rg\Widget\KCaptcha\Widget as KCaptcha;
echo KCaptcha::widget(['width' => 100, 'height' => 70]);
```
т.к. используется буферизация вывода при рендере виджета. 

### Установка

Для добавления виджета в ваш проект, вы можете просто выполнить команду ниже:

```
$ composer require rosgear/rg-wd-kcaptcha
```

или добавить в файл composer.json вашего проекта:
```
"require": {
    "rosgear/rg-wd-kcaptcha": "*"
}
```
или скачать архив на [странице виджета](https://rosgear.ru/component/rg-wd-kcaptcha/) в каталоге приложений RosGear.

После добавления виджета в проект выполните его установку в редакцию веб‑приложения с помощью Панели управления GePanel.

<a name="english"></a>
## <img src="https://raw.githubusercontent.com/rosgear/rg-wd-kcaptcha/refs/heads/main/assets/images/icon.svg" width="64px" height="64px" align="absmiddle"> Widget «KCaptcha»

The widget is designed to protect web forms from automated spam by integrating the KCaptcha verification system.

### Installation

To add the widget to your project, you can simply run the command below:

```
$ composer require rosgear/rg-wd-kcaptcha
```

or add to your project's composer.json file:
```
"require": {
    "rosgear/rg-wd-kcaptcha": "*"
}
```
or download the archive from the [widget page](https://rosgear.ru/component/rg-wd-kcaptcha/) in the RosGear application catalog.

After adding the widget to the project, install it into the web application edition using the GePanel Control Panel.