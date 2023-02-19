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

    ::selection {
        color: #fff;
        background: #007bff;
    }

    ::-webkit-scrollbar {
        width: 3px;
        border-radius: 25px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #ddd;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #ccc;
    }

    .wrapper {
        width: 370px;
        background: #fff;
        border-radius: 5px;
        border: 1px solid lightgrey;
        border-top: 0px;
    }

    .wrapper .title {
        background: #007bff;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        line-height: 60px;
        text-align: center;
        border-bottom: 1px solid #006fe6;
        border-radius: 5px 5px 0 0;
    }

    .wrapper .form {
        padding: 20px 15px;
        min-height: 400px;
        max-height: 400px;
        overflow-y: auto;
    }

    .wrapper .form .inbox {
        width: 100%;
        display: flex;
        align-items: baseline;
    }

    .wrapper .form .user-inbox {
        justify-content: flex-end;
        margin: 13px 0;
    }

    .wrapper .form .inbox .icon {
        height: 40px;
        width: 40px;
        color: #fff;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        font-size: 18px;
        background: #007bff;
    }

    .wrapper .form .inbox .msg-header {
        max-width: 53%;
        margin-left: 10px;
    }

    .form .inbox .msg-header p {
        color: #fff;
        background: #007bff;
        border-radius: 10px;
        padding: 8px 10px;
        font-size: 14px;
        word-break: break-all;
    }

    .form .user-inbox .msg-header p {
        color: #333;
        background: #efefef;
    }

    .wrapper .typing-field {
        display: flex;
        height: 60px;
        width: 100%;
        align-items: center;
        justify-content: space-evenly;
        background: #efefef;
        border-top: 1px solid #d9d9d9;
        border-radius: 0 0 5px 5px;
    }

    .wrapper .typing-field .input-data {
        height: 40px;
        width: 335px;
        position: relative;
    }

    .wrapper .typing-field .input-data input {
        height: 100%;
        width: 100%;
        outline: none;
        border: 1px solid transparent;
        padding: 0 80px 0 15px;
        border-radius: 3px;
        font-size: 15px;
        background: #fff;
        transition: all 0.3s ease;
    }

    .typing-field .input-data input:focus {
        border-color: rgba(0, 123, 255, 0.8);
    }

    .input-data input::placeholder {
        color: #999999;
        transition: all 0.3s ease;
    }

    .input-data input:focus::placeholder {
        color: #bfbfbf;
    }

    .wrapper .typing-field .input-data button {
        position: absolute;
        right: 5px;
        top: 50%;
        height: 30px;
        width: 65px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        outline: none;
        opacity: 0;
        pointer-events: none;
        border-radius: 3px;
        background: #007bff;
        border: 1px solid #007bff;
        transform: translateY(-50%);
        transition: all 0.3s ease;
    }

    .wrapper .typing-field .input-data input:valid~button {
        opacity: 1;
        pointer-events: auto;
    }

    .typing-field .input-data button:hover {
        background: #006fef;
    }


    /*  */



    /*  */
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
        height: 420px;

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
</style>

<div class="lampiran">
    <div class="chat-window">
        <div class="chat-header">
            <p>Live Chat</p>
        </div>
        <div class="chat-body">
            <div class="message-container">
                <!-- <div class="message" id="you">
								<div>
									<div class="message-content">
										<p>asdasdas</p>
									</div>
									<div class="message-meta">
										<p id="time">Thursday</p>
										<p id="author">Me</p>
									</div>
								</div>
							</div> -->
                <!-- <div class="message" id="other">
								<div>
									<div class="message-content">
										<p>asdasdas</p>
									</div>
									<div class="message-meta">
										<p id="time">Thursday</p>
										<p id="author">Me</p>
									</div>
								</div>
							</div>
 -->
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
    $(document).ready(function() {
        var adsasd = "adasd"


    });



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
</script>