## Installation

To install talex/helpers run the command:

    composer require talex/helpers

```php
use  Talex\Helpers\Text;
$string = "example"
$text = new Text($string);

echo $text->truncate()->getText();

```
Usage Hash class

```php
use  Talex\Helpers\Hash;

$plain_txt = "This is my plain text";
echo "Plain Text =" .$plain_txt. "\n";
$hash = new Hash($plain_txt);
$hash->setSecretKey("my secret key");
$hash->setSecretIV("my secret IV");

$encrypted_txt = $hash->encrypt();
echo "Encrypted Text = " .$encrypted_txt. "\n";
$decrypted_txt = $hash->decrypt($encrypted_txt);
echo "Decrypted Text =" .$decrypted_txt. "\n";
if ( $plain_txt === $decrypted_txt ) echo "SUCCESS";
else echo "FAILED";
echo "\n";

```