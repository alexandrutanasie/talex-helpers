## Installation

To install Utils run the command:

    composer require talex/utils

```php
use  Talex\Utils\Text;
$string = "example"
$text = new Text($string);

echo $text->truncate()->getText();

```