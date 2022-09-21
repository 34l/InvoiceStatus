<?php 
namespace Eancachi\InvoiceStatus\Core;

use Eancachi\InvoiceStatus\Core\Params;
use \Exception;

class Token
{
	private $params = null;
	private $response;

	function __construct(Params $params)
	{
		$this->validateParams($params);
		$this->params = $params;
		$this->generate();
	}

	private function validateParams(Params $params) :bool
	{
		$isValid = true;

		if($params->getGrantType() == "")
		{
			throw new Exception("grant_type variable doesn't have a value", 1);
			$isValid = false;
		}

		if($params->getScope() == "")
		{
			throw new Exception("grant_type variable doesn't have a value", 1);
			$isValid = false;
		}

		if($params->getClientId() == "")
		{
			throw new Exception("grant_type variable doesn't have a value", 1);
			$isValid = false;
		}

		if($params->getClientSecret() == "")
		{
			throw new Exception("grant_type variable doesn't have a value", 1);
			$isValid = false;
		}

		return $isValid;
	}

	private function generate() :void
	{
		$params = $this->params;
		$tokenUrl = $this->params->getTokenUrl();
		
		$postFields = [
			'grant_type' => $params->getGrantType(),
			'scope' => $params->getScope(),
			'client_id' => $params->getClientId(),
			'client_secret' => $params->getClientSecret()
		];

		$queryCURL = curl_init();

		curl_setopt($queryCURL, CURLOPT_URL, $tokenUrl);
		curl_setopt($queryCURL, CURLOPT_POSTFIELDS, http_build_query($postFields));
		curl_setopt($queryCURL, CURLOPT_POST, 1);
		curl_setopt($queryCURL, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($queryCURL, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);

		$queryResponse = curl_exec($queryCURL);

		if(curl_error($queryCURL)){

		}
		else{
			$this->response = json_decode($queryResponse);
		}
		curl_close($queryCURL);
	}

	public function getKey() :string
	{
		return $this->response->access_token;
	}

	public function getType() :string
	{
		return $this->response->token_type;
	}

	public function getExpires() :int
	{
		return $this->response->expires_in;
	}
}