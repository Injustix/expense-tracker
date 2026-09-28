<?php

namespace Yaroslav\ExpenseTracker;

class Expense
{
    public function __construct(private float $amount) {}

    public function isValid(): bool
    {
        return $this->amount > 0;
    }
}
