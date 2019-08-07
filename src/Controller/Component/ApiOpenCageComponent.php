<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * ApiOpenCage component
 */
class ApiOpenCageComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    protected $key = '4b3b41cbb3954621b572231a752b80b2';
    protected $Geocoder;

    function __construct() 
    {
    	$this->Geocoder = new \OpenCage\Geocoder\Geocoder($this->key);
    }


    public function getLatLng($lat, $lng) {
    	$result = $this->Geocoder->geocode($lat.','.$lng);
        
    	$msg = $result['status']['message'];
		if ($msg == 'OK'){
            $ret = $result['results'][0]['components'];
			return [
				'cidade' => isset($ret['city']) ? strtoupper($ret['city']) : strtoupper($ret['town']),
				'estado' => strtoupper($ret['state_code'])
			];
		} else {
			return false;
		}
    } 
}
