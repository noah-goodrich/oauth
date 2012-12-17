<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth2_Request_Token extends OAuth2_Request {

	protected $auth_params = '/^(grant_type|code|client_id|client_secret)$/';

	protected $name = 'token';

	public function execute(array $options = NULL)
	{
		return OAuth_Response::factory(parent::execute($options));
	}

}
