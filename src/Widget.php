<?php
/**
 * Виджет веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Widget\KCaptcha;

use Ge;
use Ge\Helper\Html;
use Ge\View\WidgetResourceTrait;
use Rg\Widget\KCaptcha\Provider\KCaptcha;

/**
 * Виджет "KCaptcha".
 * 
 * Пример использования с менеджером виджетов:
 * ```php
 * $captcha = Ge::$app->widgets->get('rg.wd.kcaptcha', ['width' => 100, 'height' => 70]);
 * $captcha->run();
 * // вывод капчи в тег изображения
 * $captcha = Ge::$app->widgets->get('rg.wd.kcaptcha', ['toHtml' => true]);
 * $captcha->run();
 * // результат: <img src="data:image/png;base64..." />
 * ```
 * 
 * Пример использования в шаблоне:
 * ```php
 * echo $this->widget('rg.wd.kcaptcha', ['width' => 100, 'height' => 70]);
 * ```
 * 
 * Пример использования с namespace:
 * ```php
 * use Rg\Widget\KCaptcha\Widget as KCaptcha;
 * 
 * (new KCaptcha(['width' => 100, 'height' => 70]))->render();
 * ```
 * если namespace ранее не добавлен в PSR, необходимо выполнить:
 * ```php
 * Ge::$loader->addPsr4('Rg\Widget\KCaptcha\\', Ge::$app->modulePath . '/rg/rg.wd.kcaptcha/src');
 * ```
 * 
 * Пример с плохой реализацией:
 * ```php
 * use Rg\Widget\KCaptcha\Widget as KCaptcha;
 * 
 * echo KCaptcha::widget(['width' => 100, 'height' => 70]);
 * ```
 * т.к. используется буферизация вывода при рендере виджета. 
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Widget\KCaptcha
 * @since 1.0
 */
class Widget extends \Ge\View\Widget
{
    use WidgetResourceTrait;

    /**
     * @see Widget::getCaptcha()
     * 
     * @var KCaptcha
     */
    protected KCaptcha $captcha;

    /**
     * Возвращает Капчу.
     *
     * @return KCaptcha
     */
    public function getCaptcha(): KCaptcha
    {
        if (!isset($this->captcha)) {
            $this->captcha = new KCaptcha($this->getSettings());
            $this->captcha->generate();
        }
        return $this->captcha;
    }

    /**
     * {@inheritdoc}
     */
    public function run(): mixed
    {
        $captcha = $this->getCaptcha();

        Ge::$app->session->open();
        Ge::$app->session->set('kcaptcha', $captcha->getKey());

        // если необходимо использовать тег изображения
        if ($this->settings->toHtml) {
            echo Html::img($captcha->renderEncode(), [], false);
            return null;
        } else
        if ($this->settings->toString)
            return $captcha->renderToString();
        else {
            $captcha->render();
            return null;
        }
    }
}