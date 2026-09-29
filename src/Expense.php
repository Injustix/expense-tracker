<?php

namespace Yaroslav\ExpenseTracker;

class Expense
{
    private bool $deleted = false;

    public function __construct(private float $amount) {}

    public function isValid(): bool
    {
        return !$this->deleted && $this->amount > 0;
    }

    public function delete(): void
    {
        $this->deleted = true;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }
}
