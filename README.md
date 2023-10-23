## Installation

To install talex/helpers run the command:

    composer require talex/helpers

```php
use  Talex\Helpers\Text;
$string = "example"
$text = new Text($string);

echo $text->truncate()->getText();

```