<?php namespace Acme\Categories;

use Laracasts\Validation\FormValidator;

class CategoryValidator extends FormValidator {

    /**
     * Validation rules for creating a category record.
     *
     * @var array
     */
    protected $create_rules = [
        'name' => 'required|unique:categories,name',
    ];

    /**
     * Validation rules for editing a category record.
     *
     * @var array
     */
    protected $edit_rules = [
        'name' => 'required|unique:categories,name',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [ ];

    /**
     * Validate input data for the creation of a new category record.
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
     * Validate input data for the updating a category record.
     *
     * @param integer $id
     * @param array   $data
     *
     * @return mixed
     */
    public function validForUpdating( $id , $data = [ ] )
    {
        $this->rules         = $this->edit_rules;
        $this->rules['name'] = $this->rules['name'] . ",$id";

        return parent::validate( $data );
    }
} 