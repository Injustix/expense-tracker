<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add expense</title>
</head>
<body>

    <h1>Add expense</h1>
    
    @if ($errors->any())
    <div>
        <strong>Исправь ошибки:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="/expenses">

        @csrf

        <div>
            <label>Title:</label>
            <input type="text" name="title">
        </div>

        <div>
            <label>Amount:</label>
            <input type="number" name="amount" step="0.01">
        </div>

        <button type="submit">
            Save
        </button>

    </form>

</body>
</html>