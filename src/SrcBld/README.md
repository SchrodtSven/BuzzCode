# ```namespace SchrodtSven\BuzzCode\SrcBld```

## 
```php
use SchrodtSven\BuzzCode\SrcBld\TplRndr;

$prsr = new TplRndr('tpl/Class.tpl');
$prsr->ns="\\Foo";
$prsr->info="Best class ever!!!";
$prsr->cn="TechMeck";
$prsr->FOO="\$a = 23;";

```

Generates Source code Block:

```php
/**
 * Best class ever!!!
 * 
 */
namespace SchrodtSven\Foo;

 class TechMeck
 {
    $a = 23;
 }

```