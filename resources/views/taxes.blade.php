<!doctype html>

<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tax Rates &#0183; EVE Moon Mining Manager</title>

    </head>

    <body>

        <p>
            <img src="{{ $user->avatar }}" width="40" height="40" alt="{{ $user->name }}" style="border-radius: 20px;">
            Welcome back, {{ $user->name }}! 
            <a href="/logout">Logout</a>
        </p>
        
        <ul>
            <li><a href="/access">Manage Access</a></li>
            <li><a href="/taxes">Manage Tax Rates</a></li>
        </ul>

        <h1>Tax Rates</h1>

        <table>
            <thead>
                <tr>
                    <th>Moon Ore</th>
                    <th>Tax Rate</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tax_rates as $rate)
                    <tr>
                        <td>{{ $rate->type->typeName }}</td>
                        <td>{{ round($rate->tax_rate) }}%</td>
                        <td>
                            <form method="post" action="/taxes/update/{{ $rate->id }}">
                                {{ csrf_field() }}
                                <input type="text" size="3" name="new_tax_rate">
                                <button>Update tax rate</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </body>

</html>