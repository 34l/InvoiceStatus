<?php
use Eancachi\InvoiceStatus\Core\Params;
use Eancachi\InvoiceStatus\Core\Client;
use Eancachi\InvoiceStatus\Core\Token;
use Eancachi\InvoiceStatus\Core\Query;

require_once "vendor/autoload.php";

$params = new Params();
$token = new Token($params);

$query = new Query();

$data = $query->setTokenKey($token->getKey())
			->setNumRuc('20505670443')
			->setCodComp('01')
			->setNumeroSerie('F085')
			->setNumero(58201)
			->setFechaEmision('21/09/2022')
			->setMonto(328.17)
			->exec();

echo "<pre>";
print_r($data);
echo "</pre>";



