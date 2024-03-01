<?php
include 'connection.php';

// Handle sending messages
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $incoming_id = $_POST['incoming_id'];
    $outgoing_id = $_POST['outgoing_id'];
    $message = $_POST['message'];

    $validateQuery = "SELECT U_id FROM master_table WHERE U_id IN ('$incoming_id', '$outgoing_id')";
    $validateResult = $conn->query($validateQuery);

    if ($validateResult->num_rows === 2) {
        $insertQuery = "INSERT INTO messagss (incoming_id, outgoing_id, msg) VALUES ('$incoming_id', '$outgoing_id', '$message')";

        if ($conn->query($insertQuery) === TRUE) {
            // Success
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid incoming_id or outgoing_id.";
    }

    $conn->close();
    exit();
}

// Fetch and display messages
$id = $_GET['id'];
$incoming_id = $id;
$outgoing_id = $id;

$selectQuery = "SELECT * FROM messagss WHERE (incoming_id = '$incoming_id' AND outgoing_id = '$outgoing_id') OR (incoming_id = '$outgoing_id' AND outgoing_id = '$incoming_id') ORDER BY msg_id ASC";
$result = $conn->query($selectQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .chat-container {
            max-width: 400px;
            margin: auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
        }

        .typing-area {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-top: 1px solid #ccc;
            box-sizing: border-box;
            resize: none;
            font-size: 14px;
            outline: none;
        }

        .typing-area.placeholder {
            color: #888;
        }

        .send-button {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #25d366;
            color: #fff;
            cursor: pointer;
            box-sizing: border-box;
            transition: background-color 0.3s;
        }

        .send-button:hover {
            background-color: #128C7E;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <form id="chatForm">
            <input type="hidden" class="incoming_id" value="<?php echo $id; ?>">
            <input type="hidden" class="outgoing_id" value="<?php echo $id; ?>">
            <div class="chat-messages" id="chatMessages">
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="message">' . $row['msg'] . '</div>';
                }
                ?>
            </div>
            <div class="typing-area" name="message" contenteditable="true" placeholder="Type a message..."></div>
            <button type="button" class="send-button" onclick="sendMessage()">Send</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function sendMessage() {
            var incoming_id = $('.incoming_id').val();
            var outgoing_id = $('.outgoing_id').val();
            var message = $('.typing-area').text();

            $.post('<?php echo $_SERVER['PHP_SELF']; ?>', { incoming_id: incoming_id, outgoing_id: outgoing_id, message: message }, function (data) {
                console.log(data);
                // Handle the response if needed
            });

            // You can update the UI here without waiting for the server response
            var messageElement = '<div class="message">You: ' + message + '</div>';
            $('#chatMessages').append(messageElement);
            $('.typing-area').text('');
        }

        // Fetch and display messages every 2 seconds (polling)
        function fetchMessages() {
            var incoming_id = $('.incoming_id').val();
            var outgoing_id = $('.outgoing_id').val();

            $.get('<?php echo "get_messages.php?incoming_id=" . $incoming_id . "&outgoing_id=" . $outgoing_id; ?>', function (data) {
                $('#chatMessages').html(data);
            });
        }

        setInterval(fetchMessages, 2000); // Fetch messages every 2 seconds
    </script>
</body>
</html>
