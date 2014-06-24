<?php

/**
* PHP wrappper for flickr's api
*/
class Flickr
{
	private $api_key;
	private $url;

	function __construct($api_key)
	{
		$this->url = "https://api.flickr.com/services/rest/?";
		$this->api_key = $api_key;
	}

	/**
	 * Makes request to flickr's api
	 * method should match flickr's documentation minus flickr prefix:
	 * https://www.flickr.com/services/api/
	 * 
	 * @param $method
	 * @param  Array  $params
	 * @return Array
	 */
	public function get($method, Array $params)
	{
		$query = $this->buildQuery($method, $params);

		$string = $this->toQueryString($query);

		$url = $this->url . $string;

		return unserialize(file_get_contents($url));
	}

	public function buildQuery($method, Array $params)
	{
		$query = array(
			'api_key' => $this->api_key,
			'method' => 'flickr.'.$method
		);

		foreach ($params as $key => $value) {
			$query[$key] = $value;
		};

		$query['format'] = 'php_serial';

		return $query;
	}

	public function toQueryString($params)
	{
		return http_build_query($params);
	}

}