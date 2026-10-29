<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Expense details</title>
</head>
<body>
    <h1>Expense #{{ $expense->id }}</h1>

    <p>Title: {{ $expense->title }}</p>
    <p>Amount: {{ $expense->amount }}</p>
    <p>Date: {{ $expense->created_at }}</p>

    <a href="/expenses">Back to expenses</a>
</body>
</html>