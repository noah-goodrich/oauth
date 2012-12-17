<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * OAuth v2 Request
 *
 * @package    Kohana/OAuth
 * @category   Request
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */
abstract class Kohana_OAuth2_Request extends OAuth_Request {

	/**
	 * @static
	 * @param  string $type
	 * @param  string $method
	 * @param  string $url
	 * @param  array  $params
	 * @return OAuth2_Request
	 */
	public static function factory($type, $method, $url = NULL, array $params = NULL)
	{
		$class = 'OAuth2_Request_'.$type;

		return new $class($method, $url, $params);
	}

	/**
	 * @var  boolean  send Authorization header?
	 */
	public $send_header = TRUE;

	protected $auth_params = '/^access_token$/';

	/**
	 * Convert the request parameters into an `Authorization` header.
	 *
	 *     $header = $request->as_header();
	 *
	 * [!!] This method implements [OAuth 2.0 v22 Spec 7.1](http://tools.ietf.org/html/draft-ietf-oauth-v2-22#section-7.1).
	 *
	 * @return  string
	 */
	public function as_header()
	{
		if ($access = Arr::get($this->params, 'access_token'))
		{
			if (is_string($this->send_header))
			{
				$header = $this->send_header;
			}
			else
			{
				$header = 'Bearer';
			}

			$access = $header.' '.$access;
		}

		return $access ? $access : NULL;
	}

}
