<!DOCTYPE html>
<html>

<head>
    <title>Validation Demo</title>
</head>

<body>
    <h1>Validation Demo</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li style="list-style:none; color:tomato;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/validation-demo">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
            @error('password')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation">
            @error('password_confirmation')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
</body>

</html>