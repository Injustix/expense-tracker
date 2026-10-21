<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit expense</title>
</head>
<body>
    <h1>Edit expense #{{ $expense->id }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/expenses/{{ $expense->id }}">
        @csrf
        @method('PUT')

        <div>
            <label>Title:</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $expense->title) }}"
            >
        </div>

        <div>
            <label>Amount:</label>
            <input
                type="number"
                name="amount"
                step="0.01"
                min="0"
                value="{{ old('amount', $expense->amount) }}"
            >
        </div>

        <button type="submit">Save changes</button>
    </form>

    <a href="/expenses">Back to expenses</a>
</body>
</html>