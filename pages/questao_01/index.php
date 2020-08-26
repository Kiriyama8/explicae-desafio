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
	function gerarNumerosMegasena(int $iMin = 1, int $iMax = 60): array {
		return range($iMin, $iMax);
	}

	/**
	 * Função responsável por gerar 6 números premiados de acordo com o intervalo
	 * de número informado, por default entre 1 e 60.
	 *
	 * @param int $iMin
	 * @param int $iMax
	 * @param int $iQuantity
	 * @return array
	 *
	 * @author Vinícius Barros minumex8@gmail.com
	 */
	function gerarNumerosPremiados(int $iMin = 1, int $iMax = 60, int $iQuantity = 6): array {
		$aNumerosGerado = [];

		while (count($aNumerosGerado) < $iQuantity) {
			$iNumeroGerado = mt_rand($iMin, $iMax);
			$aNumerosGerado[$iNumeroGerado] = $iNumeroGerado;
		}

		sort($aNumerosGerado);

		return $aNumerosGerado;
	}

	/**
	 * Função responsável por transformar o array com os números premiados em uma string
	 *
	 * @return string
	 *
	 * @author Vinícius Barros minumex8@gmail.com
	 */
	function exibirNumerosPremiados(): string {
		return implode(' - ', gerarNumerosPremiados());
	}
?>

<div class="container pt-5">
	<div class="row">
		<div class="col-8 offset-2">
			<table class="table">
				<caption class="bg-primary text-white font-weight-bold pl-3">
					Números Sorteados: <?= exibirNumerosPremiados(); ?>
				</caption>
				<thead>
				<tr>
					<th class="text-center" colspan="10">Megasena</th>
				</tr>
				</thead>
				<tbody>
				<?php
					foreach (gerarNumerosMegasena() as $iNumero) {
						if ($iNumero % 10 == 1) {
							echo "<tr>";
						}

						echo "<th scope='row'> $iNumero </th>";

						if ($iNumero % 10 == 0) {
							echo "</tr>";
						}
				    }
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php require_once '../../_partials/footer.php'; ?>