<?php
namespace grenhaz\time;

use Yii;
use yii\widgets\InputWidget;
use yii\helpers\Json;
use yii\bootstrap\Html;

/**
 * Clase para cargar el time.
 * 
 * @author obarcia
 */
class TimeWidget extends InputWidget
{
    /**
     * Base para el identificador del Widget.
     * @var string
     */
    public static $autoIdPrefix = 'wtime';
    /**
     * Valor del widget.
     * @var string
     */
    public $value = null;
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        TimeWidgetAssets::register($this->getView());
        
        Html::addCssClass( $this->options, 'form-control' );
        
        if ( !empty( $this->options[ "id" ] ) ) $this->id = $this->options[ "id" ];
        else $this->options[ "id" ] = $this->id;
        
        $this->options[ "time-widget" ] = "1";
        if ( empty( $this->options[ "plugin" ] ) ) $this->options[ "plugin" ] = [];
        if ( empty( $this->options[ "plugin" ][ "defaultTime" ] ) ) $this->options[ "plugin" ][ "defaultTime" ] = false;
        if ( empty( $this->options[ "plugin" ][ "showMeridian" ] ) ) $this->options[ "plugin" ][ "showMeridian" ] = false;
        if ( empty( $this->options[ "plugin" ][ "template" ] ) ) $this->options[ "plugin" ][ "template" ] = false;
        if ( empty( $this->options[ "plugin" ][ "minuteStep" ] ) ) $this->options[ "plugin" ][ "minuteStep" ] = 1;
        //if ( empty( $this->options[ "plugin" ][ "format" ] ) ) $this->options[ "plugin" ][ "format" ] = "HH:mm";
        //{ 'defaultTime': false, 'showMeridian': false, 'template': false, 'minuteStep': 1, 'icons': { 'up': 'fa fa-chevron-up', 'down': 'fa fa-chevron-down' } }
        if ( !is_null( $this->value ) ) $this->options[ 'value' ] = $this->value;
        
        $plugin = Json::encode( $this->options[ "plugin" ] );
        $this->getView()->registerJs("$('#" . $this->id . "').timepicker(" . $plugin . ");") ;
        
        if ( !empty( $this->model ) ) {
            return '<div class="input-group timepicker-widget-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>'.Html::activeTextInput($this->model, $this->attribute, $this->options).'</div>';
        } else {
            return '<div class="input-group timepicker-widget-group"><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>'.Html::textInput($this->name, $this->value, $this->options).'</div>';
        }
    }
}
?>