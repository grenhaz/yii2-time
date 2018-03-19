# Time input wrapper Extension for Yii 2

For license information check the [LICENSE](LICENSE.md)-file.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist grenhaz/yii2-time
```

or add

```json
"grenhaz/yii2-time": "~1.0.0"
```

to the `require` section of your composer.json.

Basic Usage
-----------

```php
<?= $form->field( $model, 'time' )->widget( TimeWidget::classname() ) ?>
```
