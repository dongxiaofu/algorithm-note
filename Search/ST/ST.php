<?php
declare(strict_types=1);

namespace App\Search\ST;

interface ST
{
    public function put(string $key, string $val): bool;

    public function get(string $key): ?string;

    public function delete(string $key): bool;

    public function contains(string $key): bool;

    public function isEmpty(): bool;

    public function size(): int;

    public function min(): string;

    public function max(): string;

    public function floor(string $key): ?string;

    public function ceiling(string $key): ?string;

    public function rank(string $key): int;

    public function select(int $k): ?string;

    public function deleteMin(): void;

    public function deleteMax(): void;

    public function sizeOfChild(string $lo, string $hi): int;

    public function keysOfChild(string $lo, string $hi): ?array;

    public function keys(): ?array;
}