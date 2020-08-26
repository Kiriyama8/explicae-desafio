<?php

class User
{
	/**
	 * Obtém um objeto de usuário aleatório da API informada.
	 *
	 * @return object
	 *
	 * @author Vinícius Barros minumex8@gmail.com
	 */
	public function obterUsuario(): object {
		$url = "https://randomuser.me/api";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$randomUser = json_decode(curl_exec($ch));

		return $randomUser->results[0];
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
	public function formatarData(string $sData, string $sFormato): string {
		$oData = new DateTimeImmutable($sData);
		return $oData->format($sFormato);
	}
}
