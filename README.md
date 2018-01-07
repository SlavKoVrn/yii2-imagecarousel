# Image carousel widget for Yii2 Framework

The Yii2 extension uses jQuery jquery.carousel-1.1.min.js and makes image carousel from php array of structure defined.

[Image galary PHP Array generator](http://yii2.kadastrcard.ru/imagecarousel).

![Image galary](http://yii2.kadastrcard.ru/uploads/imagecarousel.jpg)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run:

```bash
composer require slavkovrn/yii2-imagecarousel
```

or add

```bash
"slavkovrn/yii2-imagecarousel": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Set link to extension in your view:

```php
<?php

use slavkovrn\imagecarousel\ImageCarouselWidget;

?>

<?= ImageCarouselWidget::widget([
    'id' =>'image-carousel',    // unique id of widget
    'width' => 960,             // width of widget container
    'height' => 300,            // height of widget container
    'img_width' => 320,         // width of central image
    'img_height' => 180,        // height of central image
    'images' => [               // images of carousel
        [
                'src' => 'http://yii2.kadastrcard.ru/uploads/prettyphoto/image1.jpg',
                'alt' => 'Image 1',
        ],
        [
                'src' => 'http://yii2.kadastrcard.ru/uploads/prettyphoto/image2.jpg',
                'alt' => 'image 2',
        ],
        [
                'src' => 'http://yii2.kadastrcard.ru/uploads/prettyphoto/image3.jpg',
                'alt' => 'image 3',
        ],
        [
                'src' => 'http://yii2.kadastrcard.ru/uploads/prettyphoto/image4.jpg',
                'alt' => 'image 4',
        ],
    ]
]) ?>
```
<a href="mailto:slavko.chita@gmail.com">write comments to admin</a>
