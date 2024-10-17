<?php

namespace AcquaintSofttech\GeoLocation\Listeners;

use Statamic\Events\FormSubmitted;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

class GeoLocation
{
    /**
     * Create the event listener.
     */

    public $request;
    public $form;
    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(FormSubmitted $event): void
    {
        $data = $event->submission->data();
        $test_local = config('geo_location_tracker.test_local');
        
        if($test_local) {

            $static_ip = config('geo_location_tracker.static_ip');
            
            if($static_ip == '') {
                $ip = '208.67.222.222';
            } else {
                $ip = $static_ip;
            }
        } else {
            $ip = $this->request->ip(); /* Dynamic IP address */
        }

        $currentUserInfo = Location::get($ip);

        if($data->has('geo_location_data') && (isset($currentUserInfo) && !empty($currentUserInfo)) ) {

            $dataArray = array();
            
            $dataArray['ip'] = $currentUserInfo->ip;
            $dataArray['country_name'] = $currentUserInfo->countryName;
            $dataArray['country_code'] = $currentUserInfo->countryCode;
            $dataArray['region_code'] = $currentUserInfo->regionCode;
            $dataArray['region_name'] = $currentUserInfo->regionName;
            $dataArray['city_name'] = $currentUserInfo->cityName;
            $dataArray['zip_code'] = $currentUserInfo->zipCode;
            $dataArray['latitude'] = $currentUserInfo->latitude;
            $dataArray['longitude'] = $currentUserInfo->longitude;

            $data['geo_location_data'] = $dataArray;
            
        }

        $event->submission->data($data);
    }
}
