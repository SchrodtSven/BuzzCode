# Lst
```php
namespace SchrodtSven\BuzzCode\Type;
class Lst implements \Countable, \Iterator, \ArrayAccess, \Stringable {

    public function slice(int $offset, int $length, int $step=1);
    public function head(int $number=5);
    public function tail(int $number=5);
    public function __toString(): string;
    public function __construct(private array  $cnt = []) // Content holding member (attr));
    public function raw(): array;
    public function count(): int;
    public function keys(): static;
    public function pop(): mixed;
    public function push(mixed $val): self;
    public function shift(): mixed;
    public function unshift(mixed $val): self;
    public function unique(int $flags = \SORT_STRING): static;
    public function sum(): int|float;
    public function sort(): static;
    public function sorted(): static;
    public function rmvEmpty(bool $inpl = true, bool $reorder=true): self ;
    public function join(string $glue) : Str;
    public function lstKey(): mixed;
    public function fstKey(): mixed;
    public function map(callable $callback): self;
    public function walk(callable $callback): self;
}
```