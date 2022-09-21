<?php
return [
	//URI to get token, must be static value
	//'token_url' => 'https://api-seguridad.sunat.gob.pe/v1/clientesextranet/*SET_HERE_YOUR_CLIENT_ID*/oauth2/token/',
	'token_url' => '',
	//URI to query a bill
	//'query_url' => 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes/*SET_HERE_YOUR_RUC*/validarcomprobante',
	'query_url' => '',
	//must be static value
	'grant_type' => 'client_credentials',
	//must be static value too
	'scope' => 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes',

	//set here your client_id key
	'client_id' => '',
	//set here your client_secret key
	'client_secret' => ''
];