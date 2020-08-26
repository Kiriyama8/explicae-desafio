<?php
/**
 * Obtém um objeto de usuário aleatório da API informada.
 *
 * @return object
 *
 * @author Vinícius Barros minumex8@gmail.com
 */
function obterUsuario(): object {
	$url = "https://randomuser.me/api";

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$randomuser = json_decode(curl_exec($ch));

	return $randomuser->results[0];
}

/**
 * Método responsável por formatar uma data, cria o objeto do tipo DateTimeImmutable
 * com o primeiro parâmetro, e em seguida formata a data no modelo informado.
 *
 * @param string $sData
 * @param string $sFormato
 * @return string
 *
 * @throws Exception
 */
function formatarData(string $sData, string $sFormato): string {
	$oData = new DateTimeImmutable($sData);
	return $oData->format($sFormato);
}

$user = obterUsuario();
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
			<img class="img-fluid rounded-pill shadow-lg" src="<?= $user_picture->large; ?>" alt="picture" width="128">
			<h3 class="font-weight-bold mt-4 mb-4"><?= $user_name->title . " " . $user_name->first . " " . $user_name->last; ?></h3>
			<p><?= " <strong>Email:</strong> " . $user->email; ?></p>
			<p>
				<?= " <strong>Data de Nascimento:</strong> " . formatarData($user_dob->date, 'd/m/Y')
					. " <strong>Idade:</strong> " . $user_dob->age; ?>
			</p>
			<p>
				<?= " <strong>Criado em:</strong> " . formatarData($user_registered->date, 'd/m/Y H:i:s') ?>
			</p>
			<hr>
			<p><?= " <strong>Telefone:</strong> " . $user->phone . " <strong>Celular:</strong> " . $user->cell; ?></p>
			<hr>
			<p class="mb-3">
				<i class="fas fa-search-location"></i>
				<?= " <strong>Endereço:</strong> " . $user_location->street->name
					. " <strong>Número:</strong> " . $user_location->street->number; ?>
			</p>
			<p>
				<?= " <strong>Cidade:</strong> " . $user_location->city
						. " <strong>Estado:</strong> " . $user_location->state
						. " <strong>País:</strong> " . $user_location->country
						. " <strong>Código Postal:</strong> " . $user_location->postcode; ?>
			</p>
			<p>
				<i class="fas fa-location-arrow"></i>
				<?= " <strong>Latitude:</strong> " . $user_location->coordinates->latitude
					. " <strong>Longitude:</strong> " . $user_location->coordinates->longitude; ?>
			</p>
			<p>
				<i class="fas fa-map-marked"></i>
				<?= " <strong>Timezone:</strong> " . $user_location->timezone->offset
					. " <strong>Descrição:</strong> " . $user_location->timezone->description;
				?>
			</p>
			<hr>
			<p>
				<i class="fas fa-user"></i>
				<?= " <strong>Usuário:</strong> " . $user_login->username
					. " <strong>Senha:</strong> " . $user_login->password; ?>
			</p>
			<p><?= " <strong>Salt:</strong> " . $user_login->salt; ?></p>
			<p><?= " <strong>MD5:</strong> " . $user_login->md5; ?></p>
			<p><?= " <strong>Sha1:</strong> " . $user_login->sha1; ?></p>
			<p><?= " <strong>Sha256:</strong> " . $user_login->sha256; ?></p>
			<p><?= " <strong>Uuid:</strong> " . $user_login->uuid; ?></p>
		</div>

	</div>
</main>
<?php require_once '../../_partials/footer.php'; ?>
