<?php

use Acme\Categories\CategoryRepository;
use Acme\Categories\CategoryValidator;
use Laracasts\Flash\Flash;
use Laracasts\Validation\FormValidationException;

class CategoriesController extends \BaseController {

    /**
     * @var Acme\Categories\CategoryRepository
     */
    private $categoryRepository;

    /**
     * Create new CategoriesController instance.
     *
     * @param CategoryRepository $categoryRepository
     * @param CategoryValidator  $categoryValidator
     */
    public function __construct( CategoryRepository $categoryRepository , CategoryValidator $categoryValidator )
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryValidator  = $categoryValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Fetch a listing of all category articles from the database.
        //
        $categories = $this->categoryRepository->getPaginated();

        // Show the page.
        //
        return View::make( 'categories.index' )->withCategories( $categories );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Create a new category instance.
        //
        $category = $this->categoryRepository->instance();

        // Show the page.
        //
        return View::make( 'categories.create' )->withCategory( $category );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // Capture the input submitted by the user.
        //
        $input = Input::except( '_token' );

        // Validate the input data.
        //
        try
        {
            $this->categoryValidator->validForCreation( $input );

            // Create the category record.
            //
            $category = $this->categoryRepository->create( $input );

            // Display a message to them that lets them
            // know that a new category record was
            // successfully added.
            //
            Flash::success( 'Category record was successfully added.' );

            // Return the user to the category list page.
            //
            return Redirect::route( 'categories.index' );
        }

        // Handle any errors that were encountered.
        //
        catch ( FormValidationException $e )
        {
            return Redirect::back()->withInput()->withErrors( $e->getErrors() );
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show( $id )
    {
        // Fetch the category record by its identifier.
        //
        $category = $this->categoryRepository->find( $id );

        // Show the page.
        //
        return View::make( 'categories.show' )->withCategory( $category );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit( $id )
    {
        // Fetch the category record.
        //
        $category = $this->categoryRepository->find( $id );

        // Show the page.
        //
        return View::make( 'categories.edit' )->withCategory( $category );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update( $id )
    {
        // Fetch the record.
        //
        $category = $this->categoryRepository->find( $id );

        // Capture the input submitted by the user.
        //
        $input = Input::except( '_token' );

        // Check if the record is to be deleted.
        //
        $delete = Input::get('deleted', false);

        // Validate the input data.
        //
        try
        {
            $this->categoryValidator->validForUpdating( $category->id, $input );

            // Create the category record.
            //
            $this->categoryRepository->edit( $category->id , $input );

            // Delete if required.
            //
            if( $delete )
            {
                $this->categoryRepository->delete( $category );
            }
            // Otherwise restore
            else
            {
                $this->categoryRepository->restore( $category );
            }

            // Display a message to them that lets them
            // know that a new category record was
            // successfully updated.
            //
            Flash::success( 'Category record was successfully update.' );

            // Return the user to the category list page.
            //
            return Redirect::route( 'categories.index' );
        }

        // Handle any errors that were encountered.
        //
        catch ( FormValidationException $e )
        {
            return Redirect::back()->withInput()->withErrors( $e->getErrors() );
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        // Fetch the category record by its identifier.
        //
        $category = $this->categoryRepository->find( $id );

        // Delete the category record.
        //
        $this->categoryRepository->delete( $category );

        // Flash a message to the users that communicates that
        // the category record was successfully deleted.
        //
        Flash::success( 'Category record was successfully deleted.' );

        // Redirect the user back to the category list page.
        //
        return Redirect::route( 'categories.index' );
    }

}
