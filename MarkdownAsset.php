<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\bootstrap\markdown;

use yii\web\AssetBundle;

class MarkdownAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@vendor/xutl/yii2-bootstrap-markdown-widget/assets';

	/**
     * @inherit
     */
    public $css = [
        'css/bootstrap-markdown.min.css',
    ];

    /**
     * @inherit
     */
    public $js = [
        'js/bootstrap-markdown.js',
    ];

	/**
     * @var boolean whether to automatically generate the needed language js files.
     * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
     * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
     */
    public $autoGenerate = true;

    /**
     * @var string language to register translation file for
     */
    public $language;

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];

	/**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        if ($this->autoGenerate) {
            $language = $this->language;
            $fallbackLanguage = substr($this->language, 0, 2);
            if ($fallbackLanguage !== $this->language && !file_exists(Yii::getAlias($this->sourcePath . "locale/bootstrap-markdown.{$language}.js"))) {
                $language = $fallbackLanguage;
            }
            $this->js[] = "locale/bootstrap-markdown.$language.js";
        }
        parent::registerAssetFiles($view);
    }
}