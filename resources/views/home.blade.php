<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="outer-div">
        <section class="contact-list">
            <div class="title">
                <h2>Chats</h2>
            </div>
            <form method="GET" action="{{ route('dashboard') }}">
                <label for="contact">Choose a contact:</label>
                <select name="chosen_contact_id" id="contact" onchange="this.form.submit()">
                    <option value="">-- Select a contact --</option>
                    @foreach (auth()->user()->contacts as $contact)
                        <option value="{{ $contact->contact_id }}" {{ request('chosen_contact_id') == $contact->contact_id ? 'selected' : '' }}>
                            {{ $contact->contact->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </section>
        <section class="chatbox">
            <div class="title">
                <h1>Put selected contact here</h1>
            </div>
            @if($chosenContactId)
                @foreach ($messages as $message)
                    <div class="message-wrapper">
                        @if($message->user_id == auth()->id())
                            <p id="user-message-{{ $message->id }}" class="user-message">{{ $message->text }}</p>
                        @else
                            <p id="contact-message-{{ $message->id }}" class="contact-message">{{ $message->text }}</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p>Please select a contact to view messages.</p>
            @endif        
        </section>
    </div>
</body>
</html>

<style>

    .outer-div{
        display: flex;
        justify-content: space-evenly;
        align-items: flex-start;
    }

    .outer-div > section {
        height: 100vh;
    }

    .title{
        border: 1px solid violet;
        width: 100%;
        text-align: center
    }

    .chatbox{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        width: 70%;
        border: 1px solid red;
    }

    .chatbox > div{
        margin-bottom: 5rem;
    }

    .contact-list{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        width: 20%;
        border: 1px solid blue;
    }

    .contact-list > div{
        margin-bottom: 1rem;
    }

    .message-wrapper{
        border: 1px solid orange;
        width: 100%;
        display: flex;
    }

    .user-message{
        align-self: flex-start;
        text-align: left;
        color: yellow;
    }

    .contact-message{
        align-self: flex-end;
        text-align: right;
        color: aqua;
    }

    /**TODO: do authentication before sorting out the styles*/

</style>