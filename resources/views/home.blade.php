<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's app</title>
</head>
<body>
    <section>
        <h2>Chats</h2>
        <ol>
            @foreach ($contacts as $contact)
                <li>
                    {{ $contact->contact->name }}
                    <br/>
                    {{ $contact->contact->mobile}}
                </li>
            @endforeach
        </ol>
    </section>
    <section>
        <!-- The actual chat -->
    </section>
</body>
</html>