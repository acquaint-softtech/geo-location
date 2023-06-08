# Geo Location Tracker For Forms

> Geo Location is a Statamic addon that allows you to capture and store the geolocation information of users submitting forms on your Statamic website.

## Features


Here is a list of features provided by the Geo-Location Tracker addon for Statamic forms:

**IP Address**: Retrieve and save the IP address of the user's device at the time of form submission.

**Country Name**: Capture and store the name of the country where the form submission originated.

**Country Code**: Retrieve and save the country code associated with the submitted geolocation.

**Region Code**: Capture the code representing the region or state where the form submission took place.

**Region Name**: Store the name of the region or state associated with the submitted geolocation.

**City Name**: Capture and save the name of the city where the form submission occurred.

**Zip Code**: Retrieve and store the postal code associated with the submitted geolocation.

**Latitude**: Capture the latitude coordinates of the user's device at the time of form submission.

**Longitude**: Store the longitude coordinates of the user's device at the time of form submission.


These features enable you to gather comprehensive geolocation information from form submissions, allowing you to analyze and utilize the data in various ways within your Statamic website.

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require acquaint-softtech/geo-location
```

Publish the addon's configuration file by running the following command:
``` bash
php artisan vendor:publish --tag=geo-location-tracker-config
```

After the configuration file is published, you need to link the Geo-Location fieldset in your form blueprint.

## How to Use

To make use of the Geo-Location Tracker addon for Statamic forms, follow these steps:

**Step 1**: Link Geo-Location Fieldset in Form Blueprint, Save the blueprint file. **Note: If you change anythings on fieldset it will be not working.**

![fieldsets](https://github.com/acquaint-softtech/geo-location/assets/6542302/049dd384-1d18-4fa1-a1e2-bdf999be19cf)

![formBlueprint](https://github.com/acquaint-softtech/geo-location/assets/6542302/65dea8a1-24da-4d90-aaa3-bb743020e813)



**Step 2**: Configure the Geo-Location Tracker Addon

The addon provides a configuration file to customize its behavior. Locate the **geo-location-tracker.php** file in the config directory of your Statamic installation. Make the following configurations:

2.1. Test Local Setting
Set the `test_local` option to either true or false:

If set to `true`, the addon will work in your local system for testing purposes.
If set to `false`, the addon will be enabled for use on the live site.

``` bash
'test_local' => true,
```

2.2. Static IP Setting

If you set `test_local` to `true`, you can specify a static public IP address for testing purposes.
This IP will be used instead of the actual user's IP. Set the `static_ip` option to your desired IP address:

``` bash
'static_ip' => '208.67.222.222',
```
![formSubmittedData](https://github.com/acquaint-softtech/geo-location/assets/6542302/7ff5e596-e3fe-49a5-a412-e04a4ca78a92)

**Step 3**: Email Template Usage

To display the captured geolocation data in your email template, use the following format:

```bash
<ul>
    {{ geo_location_data }}
        <li>Ip: {{ ip }}</li>
        <li>Country Name: {{ country_name }}</li>
        <li>Country Code: {{ country_code }}</li>
        <li>Region Code: {{ region_code }}</li>
        <li>Region Name: {{ region_name }}</li>
        <li>City Name: {{ city_name }}</li>
        <li>Zip Code: {{ zip_code }}</li>
        <li>Latitude: {{ latitude }}</li>
        <li>Longitude: {{ longitude }}</li>
    {{ /geo_location_data }}
</ul>
```
This code snippet will output the geolocation information within an unordered list. You can modify the HTML structure and customize the template as per your requirements.

That's it! By following these steps, you can successfully utilize the Geo-Location Tracker addon in your Statamic forms. The captured geolocation data will be included in the email template, providing valuable insights about the users' location when they submit the form.

# geo-location-tracker-for-forms
