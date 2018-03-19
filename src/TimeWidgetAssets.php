<?php
namespace grenhaz\time;

use yii\web\AssetBundle;

/**
 * Clase para cargar los recursos del TimePicker.
 * 
 * @author obarcia
 */
class TimeWidgetAssets extends AssetBundle
{
    /**
     * JavaScript's
     * @var array
     */
    public $js = [
        'js/bootstrap-timepicker.min.js',
    ];
    /**
     * Dependencias
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . "/assets";
        
        parent::init();
    }
}