<?php

namespace AcquaintSofttech\GeoLocation;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function bootAddon()
    {
        $this->registerPublishableFieldsets();
        $this->registerPublishableConfig();
    }
    protected $listen = [
        'Statamic\Events\FormSubmitted' => [
            'AcquaintSofttech\GeoLocation\Listeners\GeoLocation',
        ],
    ];

    protected function registerPublishableConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/geo_location_tracker.php', 'geo-location-tracker');
        $this->publishes([
            __DIR__.'/../config/geo_location_tracker.php' => config_path('geo_location_tracker.php'),
        ], 'geo-location-tracker-config');

    }

    protected function registerPublishableFieldsets()
    {
        $this->publishes([
            __DIR__ . '/../resources/fieldsets' => resource_path('fieldsets/acquaint-softtech/geo-location'),
        ], 'geo-location-fieldsets');
    }
}
