<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_OAuth_Request_Exception extends Kohana_OAuth_Exception {

	/**
	 * @var  string  response body
	 */
	protected $body;

	public function __construct($message, array $variables = NULL, $code = 0, $body = NULL)
	{
		$this->body = $body;

		return parent::__construct($message, $variables, $code);
	}

	/**
	 * Get the response body.
	 *
	 * @return  string
	 */
	public function getBody()
	{
		return $this->body;
	}

}
