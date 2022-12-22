<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/view/assets/images/meteor-light-resized.svg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/admin/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/admin/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/admin/assets/css/main.css">
<!--===============================================================================================-->
    <title>Redirecting to admin login page</title>
    <style>
       .loader 
       {
            border: 16px solid #BC083C; /* Light grey */
            border-top: 16px solid #28003F; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 1s linear infinite;
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        } 
    </style>
</head>
<body>
    <div style="display: flex; justify-content:center; flex-direction: column; align-items:center; height: 100vh;">
        <div class="loader"></div>
        <br>
        <h5>redirecting to admin login page</h5> 
    </div>
    <script>
        window.setTimeout(() => {
            window.location.replace("/admin")
        }, 2000)
    </script>
</body>
</html>
