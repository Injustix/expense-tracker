<?php

namespace Yaroslav\ExpenseTracker;

class Application
{
    /** @var Expense[] */
    private array $expenses = [];

    public function addExpense(Expense $expense): void
    {
        $this->expenses[] = $expense;
    }

    public function deleteExpense(int $index): void
    {
        if (!isset($this->expenses[$index])) {
            return;
        }

        $this->expenses[$index]->delete();
    }

    /** @return Expense[] */
    public function getExpenses(): array
    {
        return $this->expenses;
    }
}
