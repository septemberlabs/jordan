<?php namespace Acme\Geocoders;

class Geocoder {

    /**
     * Latitude
     *
     * @var float|boolean
     */
    protected $lat;

    /**
     * Longitude
     *
     * @var float|boolean
     */
    protected $long;

    /**
     * Geocode a supplied location
     *
     * @param string $location
     *
     * @return $this
     */
    public function geocode( $location = '' )
    {
        // Attempt to geocode a provide location.
        //
        try {
            $geocode = \Geocoder::geocode($location);

            // Capture the lat/longs from a successful return.
            //
            $this->setLat($geocode->getLatitude());
            $this->setLong($geocode->getLongitude());
        }

            // Handle when locations fail to geocode.
            //
        catch (\Exception $e)
        {
            // Upon failed geocode we will override lat/longs to false
            //
            $this->setLat(false);
            $this->setLong(false);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat( $lat )
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     */
    public function setLong( $long )
    {
        $this->long = $long;
    }
} 