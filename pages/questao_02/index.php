<?php require_once '../../_partials/header.php'; ?>
<?php
/**
 * Função responsável por gerar um intervalo de números por default entre 1 e 60.
 *
 * @param int $iMin
 * @param int $iMax
 * @return array
 *
 * @author Vinícius Barros minumex8@gmail.com
 */
function gerarIntervaloDeNumeros(int $iMin = 1, int $iMax = 60): array {
	return range($iMin, $iMax);
}

/**
 * Função responsável por gerar 6 números premiados de acordo com o intervalo
 * de número informado, por default entre 1 e 60.
 *
 * @param int $iMin
 * @param int $iMax
 * @param int $iQuantidade
 * @return array
 *
 * @author Vinícius Barros minumex8@gmail.com
 */
function gerarNumerosPremiados(int $iMin = 1, int $iMax = 60, int $iQuantidade = 6): array {
	$aNumerosGerado = [];

	while (count($aNumerosGerado) < $iQuantidade) {
		$iNumeroGerado = mt_rand($iMin, $iMax);
		$aNumerosGerado[$iNumeroGerado] = $iNumeroGerado;
	}

	sort($aNumerosGerado);

	return $aNumerosGerado;
}

/**
 * Função responsável por transformar um array em uma string
 *
 * @param array $aArray
 * @return string
 *
 * @author Vinícius Barros minumex8@gmail.com
 */
function formatarArrayParaString(array $aArray): string {
	return implode(' - ', $aArray);
}

/**
 * Função responsável por retornar a quantidade de apostas a ser exibida
 *
 * @param int $iQuantidade
 * @return int
 *
 * @author Vinícius Barros minumex8@gmail.com
 */
function obterQuantidadeDeApostas(int $iQuantidade = 3): int {
	return $iQuantidade;
}

$iQuantidadeDeApostas = obterQuantidadeDeApostas();
?>

<div class="container pt-5">
	<div class="row">
		<div class="col-8 offset-2">
			<?php for ($i = 0; $i < $iQuantidadeDeApostas; $i++) {
				$aNumerosSorteados = gerarNumerosPremiados();
			?>
				<table class="table table-striped">
					<caption class="bg-primary text-white font-weight-bold pl-3">
						Números Sorteados: <?= formatarArrayParaString($aNumerosSorteados); ?>
					</caption>
					<thead>
					<tr>
						<th class="text-center" colspan="10">Megasena</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$aNumeros = gerarIntervaloDeNumeros();
						foreach ($aNumeros as $iNumero) {
							if ($iNumero % 10 == 1) {
								echo "<tr>";
							}

							if (in_array($iNumero, $aNumerosSorteados)) {
								echo "<th style='background-color: #ff0099' scope='row'> $iNumero </th>";
							} else {
								echo "<th scope='row'> $iNumero </th>";
							}

							if ($iNumero % 10 == 0) {
								echo "</tr>";
							}
						}
					?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>
</div>
<?php require_once '../../_partials/footer.php'; ?>

