<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @package yii2-widgets
 * @subpackage yii2-widget-select2
 * @version 2.1.2
 */

namespace kartik\select2;

use kartik\base\AssetBundle;

/**
 * Asset bundle for the bootstrap theme for [[Select2]] widget.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class ThemeBootstrapAsset extends ThemeAsset
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/select2-bootstrap']);
        parent::init();
    }
}
