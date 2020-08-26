<?php

class FileReader {
	private $sConteudo;

	public function carregar(string $sCaminho): void {
		$sArquivo = fopen($sCaminho, "r");
		while(!feof($sArquivo)) {
			$this->sConteudo .= fread($sArquivo, filesize($sCaminho));
		}
		fclose($sArquivo);
	}

	public function visualizar(): void {
		echo $this->sConteudo;
	}
}

$fileReader = new FileReader();
$fileReader->carregar('arquivo_texto.txt');
$fileReader->visualizar();
