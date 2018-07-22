# Google Chart for Yii2 Framework

The extension uses Google library https://www.gstatic.com/charts/loader.js and makes chart from php array of structure defined.

![Google Chart](http://yii2.kadastrcard.ru/uploads/googlechart.jpg)

## Installation

Install with composer:

```bash
composer require slavkovrn/yii2-googlechart
```

or add

```bash
"slavkovrn/yii2-googlechart": "*"
```

to the require section of your `composer.json` file.

Set link to extension in your view:

```php
use slavkovrn\googlechart\GoogleChartWidget;

$data = [
    'SIN' => [
                number_format(0,5) => sin(0),
                number_format(Pi()/4,5) => sin(Pi()/4),
                number_format(Pi()/2,5) => sin(Pi()/2),
                number_format(Pi()/2+Pi()/4,5) => sin(Pi()/2+Pi()/4),
                number_format(Pi(),5) => sin(Pi()),
                number_format(Pi()+Pi()/4,5) => sin(Pi()+Pi()/4),
                number_format(Pi()+Pi()/2,5) => sin(Pi()+Pi()/2),
                number_format(Pi()+Pi()/2+Pi()/4,5) => sin(Pi()+Pi()/2+Pi()/4),
                number_format(2*Pi(),5) => sin(2*Pi()),
             ],
    'COS' => [
                number_format(0,5) => cos(0),
                number_format(Pi()/4,5) => cos(Pi()/4),
                number_format(Pi()/2,5) => cos(Pi()/2),
                number_format(Pi()/2+Pi()/4,5) => cos(Pi()/2+Pi()/4),
                number_format(Pi(),5) => cos(Pi()),
                number_format(Pi()+Pi()/4,5) => cos(Pi()+Pi()/4),
                number_format(Pi()+Pi()/2,5) => cos(Pi()+Pi()/2),
                number_format(Pi()+Pi()/2+Pi()/4,5) => cos(Pi()+Pi()/2+Pi()/4),
                number_format(2*Pi(),5) => cos(2*Pi()),
             ],
];

echo GoogleChartWidget::widget([
    'id' =>'google-chart',
    'title' => 'Google Chart',
    'style' => 'width:100%',
    'data' => $data,
]);
```

