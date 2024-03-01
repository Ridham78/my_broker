const form = document.getElementById("chatForm"),
        incoming_id = form.querySelector(".incoming_id").value,
        inputField = form.querySelector(".typing-area"),
        sendBtn = form.querySelector(".send-button"),
        chatBox = form.querySelector(".chat-messages");

form.addEventListener("submit", (e) => {
    e.preventDefault();
});

inputField.focus();

inputField.addEventListener("input", () => {
    if (inputField.textContent.trim() !== "") {
        sendBtn.classList.add("active");
    } else {
        sendBtn.classList.remove("active");
    }
});

sendBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat-insert.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.textContent = "";
                scrollToBottom();
            }
        }
    };

    let formData = `incoming_id=${incoming_id}&outgoing_id=${id}&message=${encodeURIComponent(inputField.textContent)}`;
    xhr.send(formData);
});

chatBox.addEventListener("mouseenter", () => {
    chatBox.classList.add("active");
});

chatBox.addEventListener("mouseleave", () => {
    chatBox.classList.remove("active");
});

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}
function sendMessage() {
    const incoming_id = document.querySelector(".incoming_id").value;
    const messageInput = document.querySelector(".typing-area");

    if (messageInput.textContent.trim() !== "") {
        const message = messageInput.textContent;

        // Simulate sending the message to the server
        // Replace the following code with your actual AJAX request
        const chatMessages = document.getElementById("chatMessages");
        const newMessage = document.createElement("div");
        newMessage.textContent = message;
        chatMessages.appendChild(newMessage);

        // Clear the input field after sending the message
        messageInput.textContent = "";

        // Scroll to the bottom to show the latest message
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}
