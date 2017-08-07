Класс View.
=====================

Простейший класс для подключения шаблонов.

Требования:
-----------------------------------
- PHP 5.4+

Как работать
-----------------------------------

Создаём объект View, в конструтор передаём абсолютный путь к папке с шаблонами:

```php
$v = new Programulin\View(__DIR__ . '/v/');
```

Для получения html из php файла, лежащего в .../v/common/template.php, делаем так:

```php
$html = $v->get('common/template');
```

Если в шаблон нужно подставить переменные, передаём их вторым параметром:

```php
$params = [
	'title' => 'Заголовок сайта',
	'content' => 'Длинный текст статьи'
];

$html = $v->get('common/template', $params);
```

Теперь можно собирать страницу по кусочкам:

```php
// Допустим, мы получили товары из базы данных
$products = [];

// Передаём массив с товарами, получаем html-шаблон с товарами.
$products_html = $v->get('products/table', ['products' => $products]);

// Передаём html товаров как контент в базовый шаблон
echo $v->get('common/template', ['title' => 'Заголовок', 'content' => $products_html]);
```