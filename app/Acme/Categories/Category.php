<?php namespace Acme\Categories;

use Acme\Core\Model;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Model {

    use SoftDeletingTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Fields that will be treated as dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
} 