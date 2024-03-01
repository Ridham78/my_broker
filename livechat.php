<?php
include './connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = $_POST["message"] ?? "";
    $incomingId = 10; // Assuming a fixed incoming user ID
    $outgoingId = 31; // Assuming a fixed outgoing user ID

    $stmt = $conn->prepare("INSERT INTO messages (incoming_id, outgoing_id, msg) VALUES (?, ?, ?)");
    $stmt->bind_param('iis', $incomingId, $outgoingId, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #e4e5e8;
            }

            #chat-container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            #chat-display {
                height: 300px;
                overflow-y: scroll;
                border: 1px solid #ddd;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
            }

            #message-input {
                width: 97%;
                padding: 10px;
                margin-right: 5px;
                border: 1px solid #ddd;
                border-radius: 5px;
                outline: none;
            }

            button {
                padding: 10px;
                cursor: pointer;
                background-color: #25D366;
                color: #fff;
                border: none;
                border-radius: 5px;
                width: 100%;
                padding: 10px;
                margin-right: 5px;
                border: 1px solid #ddd;
                border-radius: 5px;
                outline: none;
            }

            button:hover {
                background-color: #128C7E;
            }
        </style>
        <title>Live Chat</title>
    </head>

    <body>
        <div id="chat-container">
            <div id="chat-display"></div>
            <form id="message-form" method="post">
                <input type="text" id="message-input" name="message" placeholder="Type your message..."><br><br>
                <button type="submit" name="send">Send</button>
            </form>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("message-form").addEventListener("submit", function (event) {
                    event.preventDefault();
                    sendMessage();
                });

                function updateChatDisplay(message) {
                    const chatDisplay = document.getElementById("chat-display");
                    chatDisplay.innerHTML += `<p>${message}</p>`;
                    chatDisplay.scrollTop = chatDisplay.scrollHeight;
                }

                window.sendMessage = function () {
                    const messageInput = document.getElementById("message-input");
                    const message = messageInput.value.trim();

                    if (message !== "") {
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "sendMessage.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                const response = xhr.responseText;
                                if (response !== "") {
                                    updateChatDisplay(`You: ${response}`);
                                }
                            } else {
                                console.error("Error sending message:", xhr.status, xhr.statusText);
                            }
                            setTimeout(pollForMessages, 2000);
                        };

                        xhr.send(`message=${encodeURIComponent(message)}`);

                        messageInput.value = "";
                    }
                };

                function pollForMessages() {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "getMessages.php", true);

                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            const response = xhr.responseText;
                            if (response !== "") {
                                updateChatDisplay(`Friend: ${response}`);
                            }
                        }
                        setTimeout(pollForMessages, 2000);
                    };

                    xhr.send();
                }

                pollForMessages();
            });
        </script>
    </body>

</html>
