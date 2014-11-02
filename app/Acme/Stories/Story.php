<?php namespace Acme\Stories;

use Acme\Core\Model;
use Acme\Geocoders\Geocoder;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Story extends Model {

    use SoftDeletingTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'location',
        'introduction',
        'latitude',
        'longitude',
        'primary_image_url',
        'source_url',
        'title'
    ];

    /**
     * Fields that will be treated as dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Return all the related categories the story is assigned to.
     *
     * @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany('Acme\Categories\Category');
    }
} 