Component for work with google translate api + save in mysql db
===================================

Partly wrapper over powerful official package from google — google/apiclient

* [google/apiclient](https://github.com/google/google-api-php-client)
* [google/apiclient-services](https://github.com/google/google-api-php-client-services)
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

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](http://skeeks.com) | [en.cms.skeeks.com](http://en.cms.skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)


