<?php

include_once('../connection.php');

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
</head>
<body>
	<div class="container">
        <div  style="border: 1px solid rgba(0,0,0,0.5);
   /*border-radius: 10px 10px 2px 2px;*/
   /*background: rgba(0,0,0,0.25);*/
   box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -o-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -webkit-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);display: inline-grid;background-color: #47484e;border-radius: 10px 10px 10px 10px;width: 45%;height: 100px;margin-bottom: 20px;margin-top: 20px">
            <a href="login.php" style="text-decoration: none;"> <h6 style="font-family: 'Roboto', sans-serif;font-size: 35px;text-align: center;color: whitesmoke;padding-top: 30px;">Yönetici Arabirimi</h6></a>
        </div>
        <div  style="display: inline-grid;background-color: #81818e;border-radius: 10px 10px 10px 10px;width: 45%;height: 100px;margin-bottom: 20px;">
            <a href="../worker-login/login1.php" style="text-decoration: none;"> <h6 style="font-family: 'Roboto', sans-serif;font-size: 35px;text-align: center;color: whitesmoke;padding-top: 30px;">Çalışan Arabirimi</h6></a>
        </div>

        <div class="text-center">
            <img src="https://image.freepik.com/free-photo/bright-collection-gunny-textile-samples-fabric-texture-background_106630-401.jpg" class="rounded" style="height: 250px; width: 250px;" >
        </div>
		<div class="row">

			<?php
			$fault_alert = '<div class="col-12"><div class="alert alert-danger">Hatalı Giriş</div></div>';

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if (isset($_POST['user_name']) && isset($_POST['user_password'])) {
					$username = htmlspecialchars($_POST['user_name']);
					$password = htmlspecialchars($_POST['user_password']);

					$connection = DBConnection::get_instance()->get_connection();
					$sql = "SELECT * FROM user_logins WHERE username = '" . $username . "' AND password = '" . md5($password) . "'";	

					$result = mysqli_query($connection, $sql);
					if ($result != false) {
						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							session_start();
							$_SESSION["id"] = $row["id"];
							$_SESSION["username"] = $username;
							$_SESSION["logged_in"] = true;

							setcookie("username", $username, time() + (86400 * 30), "/");

							header('Location: http://localhost/Bilisim/contents/admin-content/content.php');
						} else {
							echo $fault_alert;
						}
					} else {
						echo $fault_alert;
					}
				} else {
					echo $fault_alert;
				}
			}
			?>


			<div class="col-12">
				<form method="POST" action="">
					<div class="form-group">
						<label for="user-name">Username<?php ?></label>
					    <input type="text" name="user_name" class="form-control" id="user-name" placeholder="Kullanıcı Adı">
					</div>

					<div class="form-group">
						<label for="user-phone">Password</label>
					    <input type="password" name="user_password" class="form-control" id="user-password" placeholder="Şifre">
					</div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" style="width: 100%;background: #654660;border-color: #6C6270;">Giriş</button>
                    </div>

				</form>
			</div>
		</div>
	</div>
</body>
</html>