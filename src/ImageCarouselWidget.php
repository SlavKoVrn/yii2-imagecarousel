<?php

namespace slavkovrn\imagecarousel;

use yii\base\Widget;
use yii\web\JqueryAsset;

class ImageCarouselWidget extends Widget {
    
    public $id = 'image-carousel';
    public $images = [];
    public $width = 960;
    public $height = 300;
    public $img_width = 320;
    public $img_height = 180;

    public function init() {

        parent::init();

    }

    public function run() {

        parent::run();

        $this->registryScript();

        return $this->render('imagecarousel',[
            'id' =>$this->id,
            'images' =>$this->images,
            'img_width' =>$this->img_width,
            'img_height' =>$this->img_height,
        ]);
    }

    protected function registryScript()
    {
        $path = \Yii::$app->getAssetManager()->publish(__DIR__ . '/assets/');

        $left=$path[1].'/images/left.png';
        $right=$path[1].'/images/right.png';

        $style = '
            #'.$this->id.' {
                width:'.$this->width.'px;
                margin: 60px auto;
                height:'.$this->height.'px;
                position:relative;
                clear:both;
                overflow:hidden;
                background:#FFF;
            }
            #'.$this->id.' img {
                visibility:hidden;
                cursor:pointer;
            }
            #'.$this->id.' .prevButton {
            	background: url('.$left.') no-repeat;
                width: 60px;
                height: 54px;
                cursor: pointer;
                position: absolute;
                left: 0;
                top: 50%;
                margin-top: -30px;
                z-index: 100;
            	left: auto; right: 0; background-position: 0px 0;
            }
            #'.$this->id.' .nextButton {
            	background: url('.$right.') no-repeat;
                width: 60px;
                height: 54px;
                cursor: pointer;
                position: absolute;
                left: 0;
                top: 50%;
                margin-top: -30px;
                z-index: 100;
            }
        ';
        $this->getView()->registerCss($style);

        $this->getView()->registerJsFile(
            $path[1] . '/js/jquery.waterwheelCarousel.js',
            [
                'position' => \yii\web\View::POS_END,
                'depends'  => [
                    '\yii\web\JqueryAsset',
                ],
            ]
        );

        $script = ' 
        $(function() {

            var carousel = $("#'.$this->id.'").waterwheelCarousel({
              flankingItems: 3,
              movingToCenter: function ($item) {
                $("#callback-output").prepend("movingToCenter: " + $item.attr("id") + "<br/>");
              },
              movedToCenter: function ($item) {
                $("#callback-output").prepend("movedToCenter: " + $item.attr("id") + "<br/>");
              },
              movingFromCenter: function ($item) {
                $("#callback-output").prepend("movingFromCenter: " + $item.attr("id") + "<br/>");
              },
              movedFromCenter: function ($item) {
                $("#callback-output").prepend("movedFromCenter: " + $item.attr("id") + "<br/>");
              },
              clickedCenter: function ($item) {
                $("#callback-output").prepend("clickedCenter: " + $item.attr("id") + "<br/>");
              }
            });
    
            $("#'.$this->id.'.prevButton").bind("click", function () {
              carousel.prev();
              return false
            });
    
            $("#'.$this->id.'.nextButton").bind("click", function () {
              carousel.next();
              return false;
            });

       	});
        ';

        $this->getView()->registerJs($script,\yii\web\View::POS_END);

    }

}


