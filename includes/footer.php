<?php

include("includes/db.php");

?>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

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
</style>
<footer class="page-footer">


	<!-- <div class="banners">
		<div class="container clearfix">

			<div class="banner-award">
				<span>Award winner</span><br> Fashion awards 2016
			</div>

			<div class="banner-social">
				<a href="#" class="banner-social__link">
				<i class="icon-facebook"></i>
			</a>
				<a href="#" class="banner-social__link">
				<i class="icon-twitter"></i>
			</a>
				<a href="#" class="banner-social__link">
				<i class="icon-instagram"></i>
			</a>
				<a href="#" class="banner-social__link">
				<i class="icon-pinterest-circled"></i>
			</a>
			</div>

		</div>
	</div> -->
	<div class="page-footer__subline">
		<div class="container clearfix">
			<div class="wrapper">
				<div class="title">Simple Online Chatbot</div>
				<div class="form">
					<div class="bot-inbox inbox">
						<div class="icon">
							<i class="fas fa-user"></i>
						</div>
						<div class="d-flex flex-column">
							<?php
							$result = mysqli_query($con, "SELECT * FROM chatbox");
							$i = 1;
							while ($row = mysqli_fetch_array($result)) {
							?>
								<div class="msg-header">
									<ul class="list-unstyled ">

										<li id="<?php echo $row["question"]; ?>" class="question click" value='<?php echo $row["id"]; ?>'>
											<p><?php echo $row["question"]; ?></p>
										</li>

									</ul>
								</div>
							<?php
								$i++;
							}
							?>
						</div>
					</div>
				</div>
				<!-- <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div> -->
			</div>

			<div class="copyright">
				&copy; 2023 Avenue Fashion&trade;
			</div>

			<div class="developer">
				Dev by Izat Shah
			</div>

			<div class="designby">
				Design by Izat Shah
			</div>
		</div>

		<script>
			$(document).ready(function() {
				/* $(".question").on("click", function() { */


			});



			$(".question").on("click", function() {
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

						console.log(respone_ans[1]);

						$replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + respone_ans[0] + '</p></div></div>';
						$(".form").append($replay);
						// when chat goes down the scroll bar automatically comes to the bottom
						$(".form").scrollTop($(".form")[0].scrollHeight);

						console.log('asd');


						// Question loop
						for (var i = 0; i < respone_ans[1].length; i++) {
							// Access the 'question' property of the current object


							/* 	var id = data[i].id; */
							$list_all = `<li id="Where can i get bank account number?" class="question click" value="1">
											<p>Where can i get bank account number?</p>
										</li>`;

							$(".form").append($list_all);
							// when chat goes down the scroll bar automatically comes to the bottom
							$(".form").scrollTop($(".form")[0].scrollHeight);

						}


					}
				});
			});
		</script>

</footer>