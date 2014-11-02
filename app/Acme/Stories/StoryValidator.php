<?php namespace Acme\Stories;

use Laracasts\Validation\FormValidator;

class StoryValidator extends FormValidator {

    /**
     * Validation rules for creating a story record.
     *
     * @var array
     */
    protected $create_rules = [
        'title'             => 'required' ,
        'introduction'      => 'required' ,
        'primary_image_url' => 'required|url' ,
        'latitude'          => 'required|numeric',
        'longitude'         => 'required|numeric',
        'address'           => 'required',
        'source_url'        => 'required|url'
    ];

    /**
     * Validation rules for editing a story record.
     *
     * @var array
     */
    protected $edit_rules = [
        'title'             => 'required' ,
        'introduction'      => 'required' ,
        'primary_image_url' => 'required|url' ,
        'latitude'          => 'required|numeric',
        'longitude'         => 'required|numeric',
        'address'           => 'required',
        'source_url'        => 'required|url'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [ ];

    /**
     * Validate input data for the creation of a new story record.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function validForCreation( $data = [ ] )
    {
        $this->rules = $this->create_rules;

        return parent::validate( $data );
    }

    /**
     * Validate input data for the updating a story record.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function validForUpdating( $data = [ ] )
    {
        $this->rules = $this->edit_rules;

        return parent::validate( $data );
    }
} 