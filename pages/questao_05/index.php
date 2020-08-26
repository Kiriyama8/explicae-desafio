<?php
require_once 'User.php';

$oUser = new User();
$user = $oUser->obterUsuario();

$user_name = $user->name;
$user_location = $user->location;
$user_login = $user->login;
$user_dob = $user->dob;
$user_registered = $user->registered;
$user_picture = $user->picture;
?>
<?php require_once '../../_partials/header.php'; ?>
<main role="main" class="container mb-3 my-lg-5">
	<div class="row my-3 text-center">
		<div class="col-12 col-lg-8 offset-lg-2">
			<img class="img-fluid rounded-pill shadow-lg" src="<?php echo $user_picture->large; ?>" alt="picture" width="128">
		</div>
	</div>
</main>
<?php require_once '../../_partials/footer.php'; ?>
