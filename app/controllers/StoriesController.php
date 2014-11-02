<?php

use Acme\Categories\CategoryRepository;
use Acme\Stories\StoryRepository;
use Acme\Stories\StoryValidator;
use Laracasts\Flash\Flash;
use Laracasts\Validation\FormValidationException;

class StoriesController extends BaseController {

    /**
     * @var StoryRepository
     */
    private $storyRepository;

    /**
     * @var Acme\Stories\StoryValidator
     */
    private $storyValidator;
    /**
     * @var Acme\Categories\CategoryRepository
     */
    private $categoryRepository;

    /**
     * Create new StoriesController instance.
     *
     * @param StoryRepository    $storyRepository
     * @param StoryValidator     $storyValidator
     * @param CategoryRepository $categoryRepository
     */
    public function __construct( StoryRepository $storyRepository , StoryValidator $storyValidator , CategoryRepository $categoryRepository )
    {
        $this->storyRepository    = $storyRepository;
        $this->storyValidator     = $storyValidator;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Fetch a listing of all story articles from the database.
        //
        $stories = $this->storyRepository->getPaginated();

        // Show the page.
        //
        return View::make( 'stories.index' )->withStories( $stories );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Create a new story instance.
        //
        $story = $this->storyRepository->instance();

        // Appends a list of categories.
        //
        $story->available_categories = $this->categoryRepository->getCategoryList();

        // Define a list of assigned category ids.
        //
        $assigned_categories = array_map(function($record){
            return $record['id'];
        }, $story->categories->toArray());

        // Show the page.
        //
        return View::make( 'stories.create' )->withStory( $story )->withAssignedCategories( $assigned_categories );
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
            $this->storyValidator->validForCreation( $input );

            // Create the story record.
            //
            $story = $this->storyRepository->create( $input );

            // Create categories array if one doesn't exist.
            //
            if( ! isSet($input['categories']))
            {
                $input['categories'] = [];
            }

            // Attach categories to the story record.
            //
            $this->storyRepository->attachCategories( $story, $input['categories']);

            // Display a message to them that lets them
            // know that a new story record was
            // successfully added.
            //
            Flash::success( 'Story record was successfully added.' );

            // Return the user to the story list page.
            //
            return Redirect::route( 'stories.index' );
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
        // Fetch the story record by its identifier.
        //
        $story = $this->storyRepository->find( $id );

        // Show the page.
        //
        return View::make( 'stories.show' )->withStory( $story );
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
        // Fetch the story record.
        //
        $story = $this->storyRepository->find( $id );

        // Appends a list of categories.
        //
        $story->available_categories = $this->categoryRepository->getCategoryList();

        // Define a list of assigned category ids.
        //
        $assigned_categories = array_map(function($record){
            return $record['id'];
        }, $story->categories->toArray());

        // Show the page.
        //
        return View::make( 'stories.edit' )->withStory( $story )->withAssignedCategories( $assigned_categories );
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
        $story = $this->storyRepository->find( $id );

        // Capture the input submitted by the user.
        //
        $input = Input::except( '_token' );

        // Validate the input data.
        //
        try
        {
            $this->storyValidator->validForUpdating( $input );

            // Create the story record.
            //
            $this->storyRepository->edit( $story->id, $input );

            // Create categories array if one doesn't exist.
            //
            if( ! isSet($input['categories']))
            {
                $input['categories'] = [];
            }

            // Attach categories to the story record.
            //
            $this->storyRepository->attachCategories( $story, $input['categories']);

            // Display a message to them that lets them
            // know that a new story record was
            // successfully updated.
            //
            Flash::success( 'Story record was successfully update.' );

            // Return the user to the story list page.
            //
            return Redirect::route( 'stories.index' );
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
        // Fetch the story record by its identifier.
        //
        $story = $this->storyRepository->find( $id );

        // Delete the story record.
        //
        $this->storyRepository->delete( $story );

        // Flash a message to the users that communicates that
        // the story record was successfully deleted.
        //
        Flash::success( 'Story record was successfully deleted.' );

        // Redirect the user back to the story list page.
        //
        return Redirect::route( 'stories.index' );
    }

}
