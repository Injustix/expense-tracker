<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Expenses</title>
</head>
<body>

    <h1>Расходы</h1>
    @if (session('success'))
    <p>{{ session('success') }}</p>
@endif
    <a href="/expenses/create">+ Добавить расход</a>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Сумма</th>
            <th>Дата</th>
        </tr>
        @foreach ($expenses as $expense)
    <tr>
        <td>{{ $expense->id }}</td>
        <td>{{ $expense->title }}</td>
        <td>{{ $expense->amount }}</td>
        <td>{{ $expense->created_at }}</td>
        <td><a href="/expenses/{{ $expense->id }}">Посмотреть</a></td>
        <td><a href="/expenses/{{ $expense->id }}/edit">Изменить</a></td>
        <td>
            <form method="POST" action="/expenses/{{ $expense->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        </td>
    </tr>
@endforeach
    </table>

    <p>Итого: {{ $expenses->sum('amount') }}</p>

</body>
</html>