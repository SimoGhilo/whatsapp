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
        @foreach ($messages as $message)
            <div>
                <!-- TODO: HERE we see all messages just sent (By user 1), but we need to see all messages between the two, probably some changes to the model and controller will need to be made -->
                <p>{{ $message->text }}</p>
            </div>
        @endforeach
    </section>
</body>
</html>