<?php

/**
 * Class FileReader
 * @version 1.0.0
 */
class FileReader
{
	/** @var string $sConteudo */
	private $sConteudo;

	/**
	 * Função responsável por abrir e fazer a leitura do arquivo informado
	 *
	 * @param string $sCaminho
	 * @return void
	 *
	 * @author Vinícius Barros minumex8@gmail.com
	 */
	public function carregar(string $sCaminho): void {
		$sArquivo = fopen($sCaminho, "r");

		while(!feof($sArquivo)) {
			$this->sConteudo .= fread($sArquivo, filesize($sCaminho));
		}

		fclose($sArquivo);
	}

	/**
	 * Função responsável por exibir o conteúdo do arquivo lido
	 *
	 * @return void
	 *
	 * @author Vinícius Barros minumex8@gmail.com
	 */
	public function visualizar(): void {
		echo $this->sConteudo;
	}
}

$fileReader = new FileReader();
$fileReader->carregar('arquivo_texto.txt');
$fileReader->visualizar();
