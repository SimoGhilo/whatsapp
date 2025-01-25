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
            @foreach (auth()->user()->contacts as $contact)
                <form method="GET" action="{{ route('dashboard') }}" style="display: inline;">
                    <input id="hiddenInput" type="hidden" name="chosen_contact_id" value="{{ $contact->contact_id }}">
                    <button type="submit" class="btn">
                        {{ $contact->contact->name }}
                    </button>
                </form>
            @endforeach        
        </section>
        <div class="chatbox">
            <div class="title">
                <h1>{{ auth()->user()->chosenContact($chosenContactId)?->name ?? 'No user found' }}</h1>
            </div>

            <div class="messages-container">
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
            </div>
            <form class="new-text" method="POST" action="{{ route('postMessage') }}">
                @csrf
                <textarea name="textValue" class="form-control rounded-pill p-2" placeholder="Enter your message here"></textarea>
                <input id="hiddenInput" type="hidden" name="contact_id" value="{{ $chosenContactId }}">
                <button id="sendMessage" class="btn btn-success rounded-circle"><bold>></bold></button>
            </form>
        </div> 
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
        text-align: center;
        margin-bottom: 0.5rem;
        /* position: sticky; */
    }

    .chatbox{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        width: 70%;
        border: 1px solid red;
        height: 100vh;
    }

    .chatbox > .message-wrapper{
        margin-bottom: 3rem;
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

    .messages-container{
        display: flex;
        flex-direction: column;
        overflow-y: scroll;
        width: 100%;
    }

    .message-wrapper {
        display: flex;
    }

    .user-message {
        background-color: #99f5a5; /* Light green for user message */
        padding: 10px;
        border-radius: 10px;
        color: black;
        margin-left:6rem;
    }

    .contact-message {
        background-color: #79e1f3; /* Light blue for contact message */
        padding: 10px;
        border-radius: 10px;
        color: black;
        margin-left:35rem;

    }

    .new-text{
        width: 100%;
        position: relative; 
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .new-text > textarea {
        margin-left: 2%;
        width: 75%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .new-text > button {
        height: 50px;
        width:50px;
        margin-left: 1%;
        margin-right: 3%;
        text-align: center;
    }

    @media screen and (max-width:480px){
            .user-message {
            margin-right:3rem;
        }

        .contact-message {
            margin-left:3rem;

        }
    }


</style>




