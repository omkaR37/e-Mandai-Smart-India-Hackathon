 <!DOCTYPE html>
<html>
<head>
<title>OTP SMS Verification with TextLocal</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body style="background:url(bg/bg.jpg); ">

	<div class="container" style="width:450px;padding: 4px;  margin-top: 13%;background: rgba(0,0,0,.17);box-shadow:box-shadow: 0 2px 4px rgba(0,0,0,0.3);  ">
		<div class="error"></div>
		<form id="frm-mobile-verification" style="padding: 50px;">
			<div class="form-heading">Mobile Number Verification</div>

			<div class="form-row">
				<input type="number" id="mobile" class="form-input"
					placeholder="Enter the 10 digit mobile">
			</div>

			<input type="button" class="btnSubmit" style="background: #eb8242;" value="Send OTP" 
				onClick="sendOTP();">
		</form>
	</div>

	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="verification.js"></script>
</body>
</html>