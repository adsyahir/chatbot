<?php

include("includes/db.php");

?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    .lampiran {
        display: flex;
        justify-content: center;
        flex-direction: center;
        align-items: center;
        height: 100vh;

    }

    .question:hover {
        display: none;
        cursor: pointer;
    }

    li {
        list-style: none;
    }

    /* Chatbot css */
    .App {
        width: 100vw;
        height: 100vh;
        background: #fff;
        color: #212121;
        font-family: "Open Sans", sans-serif;
        display: grid;
        place-items: center;
    }

    body {
        margin: 0%;
        padding: 0%;
    }

    @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,700");

    .joinChatContainer {
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .joinChatContainer h3 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .joinChatContainer input {
        width: 210px;
        height: 40px;
        margin: 7px;
        border: 2px solid #43a047;
        border-radius: 5px;
        padding: 5px;
        font-size: 16px;
    }

    .joinChatContainer button {
        width: 225px;
        height: 50px;
        margin: 7px;
        border: none;
        border-radius: 5px;
        padding: 5px;
        font-size: 16px;
        background: #43a047;
        color: #fff;
        cursor: pointer;
    }

    .joinChatContainer button:hover {
        background: #2e7d32;
    }

    .chat-window {
        width: 400px;
    }

    .chat-window p {
        margin: 0;
    }

    .chat-window .chat-header {
        height: 45px;
        border-radius: 6px;
        background: #263238;
        position: relative;
        cursor: pointer;
    }

    .chat-window .chat-header p {
        display: block;
        padding: 0 1em 0 2em;
        color: #fff;
        font-weight: 700;
        line-height: 45px;
    }

    .chat-window .chat-body {
        height: calc(600px - (45px + 70px));
        border: 1px solid #263238;
        background: #fff;

        position: relative;
    }

    .chat-window .chat-body .message-container {
        width: 100%;
        height: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .chat-window .chat-body .message-container::-webkit-scrollbar {
        display: none;
    }

    .chat-window .chat-body .message {
        height: auto;
        padding: 10px;
        display: flex;
    }

    .chat-window .chat-body .message .message-content {
        width: auto;
        height: auto;
        min-height: 40px;
        max-width: 200px;
        background-color: #43a047;
        border-radius: 5px;
        color: white;
        display: flex;
        align-items: center;
        margin-right: 5px;
        margin-left: 5px;
        padding-right: 5px;
        padding-left: 5px;
        overflow-wrap: break-word;
        word-break: break-word;
    }

    #you {
        justify-content: flex-start;
    }

    #you .message-content {
        justify-content: flex-start;
    }

    #you .message-meta {
        justify-content: flex-start;
        margin-left: 5px;
    }

    #other {
        justify-content: flex-end;
    }

    #other .message-content {
        justify-content: flex-end;
        background-color: cornflowerblue;
    }

    #other .message-meta {
        justify-content: flex-end;
        margin-right: 5px;
    }

    .message-meta #author {
        margin-left: 10px;
        font-weight: bold;
    }

    .chat-window .chat-body .message .message-meta {
        display: flex;
        font-size: 12px;
    }

    .chat-window .chat-footer {
        height: 40px;
        border: 1px solid #263238;
        border-top: none;
        display: flex;
    }

    .chat-window .chat-footer input {
        height: 100%;
        flex: 85%;
        border: 0;
        padding: 0 0.7em;
        font-size: 1em;
        border-right: 1px dotted #607d8b;

        outline: none;
        font-family: "Open Sans", sans-serif;
    }

    .chat-window .chat-footer button {
        border: 0;
        display: grid;
        place-items: center;
        cursor: pointer;
        flex: 15%;
        height: 100%;
        background: transparent;
        outline: none;
        font-size: 25px;
        color: lightgray;
    }

    .chat-window .chat-footer button:hover {
        color: #43a047;
    }

    .hide {
        opacity: 0 !important;
    }

    #chat,
    #chat:after,
    .chatbox {
        transition: all 0.4s ease-in-out;
    }

    #chat,
    #close-chat,
    .minim-button,
    .maxi-button,
    .chat-text {
        font-weight: 700;
        cursor: pointer;
        font-family: Arial, sans-serif;
        text-align: center;
        height: 20px;
        line-height: 20px;
    }

    #chat,
    #close-chat {
        border: 1px solid #a8a8a8;
    }


    .chatbox {
        position: fixed;
        bottom: 0;
        left: 50px;
        margin: 0 0 -1500px;
        background: #fff;
        border-bottom: none;
        z-index: 100000;
    }

    #close-chat {
        position: absolute;
        top: 2px;
        right: 2px;
        font-size: 24px;
        border: 1px solid #dedede;
        width: 20px;
        background: #fefefe;
        z-index: 2;
    }

    #minim-chat,
    #maxi-chat {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 20px;
        line-height: 20px;
        cursor: pointer;
        z-index: 1;
    }

    .minim-button {
        position: absolute;
        top: 2px;
        right: 26px;
        font-size: 24px;
        border: 1px solid #dedede;
        width: 20px;
        background: #fefefe;
    }

    .maxi-button {
        position: absolute;
        top: 2px;
        right: 26px;
        font-size: 24px;
        border: 1px solid #dedede;
        width: 20px;
        background: #fefefe;
    }

    .chat-text {
        position: absolute;
        top: 5px;
        left: 10px;
        font-size: 16px;
    }

    #chat {

        position: fixed;
        border-radius: 3px;
        padding: 2px 8px;
        font-size: 12px;
        background: #fff;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        bottom: 80;
        left: 100;
        border-radius: 50%;
        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 500px 107px;
    z-index: 1000;
    }



    #chat:hover {
        background: #ddd;
        -webkit-animation-name: hvr-pulse-grow;
        animation-name: hvr-pulse-grow;
        -webkit-animation-duration: 0.3s;
        animation-duration: 0.3s;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-direction: alternate;
        animation-direction: alternate;
    }

    #chat:hover:after {
        border-color: #ddd transparent transparent !important;
    }

    .animated-chat {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }

    @-webkit-keyframes tada {
        0% {
            -webkit-transform: scale(1);
        }

        10%,
        20% {
            -webkit-transform: scale(0.9) rotate(-3deg);
        }

        30%,
        50%,
        70%,
        90% {
            -webkit-transform: scale(1.1) rotate(3deg);
        }

        40%,
        60%,
        80% {
            -webkit-transform: scale(1.1) rotate(-3deg);
        }

        100% {
            -webkit-transform: scale(1) rotate(0);
        }
    }

    @keyframes tada {
        0% {
            transform: scale(1);
        }

        10%,
        20% {
            transform: scale(0.9) rotate(-3deg);
        }

        30%,
        50%,
        70%,
        90% {
            transform: scale(1.1) rotate(3deg);
        }

        40%,
        60%,
        80% {
            transform: scale(1.1) rotate(-3deg);
        }

        100% {
            transform: scale(1) rotate(0);
        }
    }

    .tada {
        -webkit-animation-name: tada;
        animation-name: tada;
    }

    @-webkit-keyframes hvr-pulse-grow {
        to {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
    }

    @keyframes hvr-pulse-grow {
        to {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
    }
</style>
<div id="chat" class="animated-chat tada" onclick="loadChatbox()"><span>Chat</span></div>
<div class="chatbox" id="chatbox">
    <div class="chat-window">
        <div class="chat-header">
            <p>Live Chat</p>
            <div id="close-chat" onclick="closeChatbox()">&times;</div>
            <div id="minim-chat" onclick="minimChatbox()"><span class="minim-button">&minus;</span></div>
            <div id="maxi-chat" onclick="loadChatbox()"><span class="maxi-button">&plus;</span></div>
        </div>
        <div class="chat-body">
            <div class="message-container">

                <?php
                $result = mysqli_query($con, "SELECT * FROM chatbox");
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>

                    <div class="message" id="you">
                        <div>
                            <li id="<?php echo $row["question"]; ?>" class="question click message-content" value='<?php echo $row["id"]; ?>'>
                                <p><?php echo $row["question"]; ?></p>
                            </li>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                ?>


            </div>
        </div>
        <!-- <div class="chat-footer">
						<input type="text" placeholder="Hey..." />
						<button>&#9658;</button>
					</div> -->
    </div>

</div>

<script>
    $(document).on('click', '.question', function() {
        $value = $(this).val();
        $name = $(this).attr('id');
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $name + '</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        $.ajax({
            url: 'answer.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                var respone_ans = JSON.parse(result);
                /* New chatbot */

                $replay = `<div class="message" id="other">
								<div>
									<div class="message-content">
										<p>${respone_ans[0]}</p>
									</div>
									
								</div>
							</div>`;
                $(".message-container").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".message-container").scrollTop($(".message-container")[0].scrollHeight);

                console.log('asd');


                // Question loop
                for (var i = 0; i < respone_ans[1].length; i++) {
                    // Access the 'question' property of the current object

                    $list_all = `<div class="message" id="you">
									<div>
										<li class="question click message-content" value='${respone_ans[1][i][0]}'>
											<p>${respone_ans[1][i][1]}</p>
										</li>
									</div>
								</div>`;

                    $(".message-container").append($list_all);
                    // when chat goes down the scroll bar automatically comes to the bottom
                    $(".message-container").scrollTop($(".message-container")[0].scrollHeight);

                }
            }
        });
    });

    var f = document.getElementById("chat");

    function loadChatbox() {
        var e = document.getElementById("minim-chat");
        e.style.display = "block";
        var e = document.getElementById("maxi-chat");
        e.style.display = "none";
        var e = document.getElementById("chatbox");
        e.style.marginBottom = "100px";
        f.style.display = 'none';

    }

    function closeChatbox() {
        var e = document.getElementById("chatbox");
        e.style.margin = "0 0 -1500px 0";
        f.style.display = 'flex';
    }

    function minimChatbox() {
        var e = document.getElementById("minim-chat");
        e.style.display = "none";
        var e = document.getElementById("maxi-chat");
        e.style.display = "block";
        var e = document.getElementById("chatbox");
        e.style.margin = "0 0 -380px 0";
        f.style.display = 'none';
    }
</script>