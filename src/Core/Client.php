<?php
declare(strict_types=1);

namespace Eancachi\InvoiceStatus\Core;

use Eancachi\InvoiceStatus\Core\Params;

class Client
{
	private $httpClient;
	private $params;
	private $tokenUrl = "";

	function __construct(Params $params)
	{
		$this->params = $params;
	}

	public function getParams() :array
	{
		$params = [
			'grant_type' => $this->params->getGrantType(),
			'scope' => $this->params->getScope(),
			'client_id' => $this->params->getClientId(),
			'client_secret' => $this->params->getClientSecret()
		];

		return $params;
	}

	public function getToken() 
	{
		$postFields = $this->getParams();
		$clientId = $this->params->getClientId();
		$tokenUrl = "https://api-seguridad.sunat.gob.pe/v1/clientesextranet/$clientId/oauth2/token/";

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $tokenUrl);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postFields));
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);

		$response = curl_exec($curl);
		curl_close($curl);

		print_r($response);
		//echo $tokenUrl;	
	}
}