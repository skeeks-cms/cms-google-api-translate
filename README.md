Component for work with google translate api + save in mysql db
===================================

Partly wrapper over powerful official package from google — google/apiclient

* [google/apiclient](https://github.com/google/google-api-php-client)
* https://console.cloud.google.com/home/dashboard

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-google-translate "*"
```

or add

```
"skeeks/cms-google-translate": "*"
```


How to use
----------

### Configuration app
```php
//App config
[
    'components'    =>
    [
    //....
        'googleApi' =>
        [
            'class'                 => '\skeeks\yii2\googleApi\GoogleApiComponent',
            'developer_key'         => 'YOUR_GOOLE_API_KEY',
        ],
    //....
    ]
]

```

### An example of the Api transliteration

https://cloud.google.com/translate/v2/using_rest

```php

try
{
    $result = \Yii::$app->googleTranslate->translate('Яблоко', 'en');
    print_r($result);
} catch (\Exception $e)
{
    print_r("Ошибка");
    print_r($e->getMessage());
}

```


___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)
