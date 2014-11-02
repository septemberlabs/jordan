<?php namespace Acme\Stories;

class StoryRepository {

    /**
     * Attach categories to a particular story record.
     *
     * @param       $story
     * @param array $categories
     */
    public function attachCategories( $story, $categories = [] )
    {
        // First we will need to detach all previously attached categories.
        //
        $story->categories()->detach();

        // Now we will attach the necessary categories.
        //
        return $story->categories()->attach($categories);
    }

    /**
     * Return a listing all all stories in paginated object.
     *
     * @return mixed
     */
    public function getPaginated()
    {
        return Story::with('categories')->orderBy('id', 'desc')->paginate(30);
    }

    /**
     * Create a new story record.
     */
    public function create( $data = [] )
    {
        return Story::create( $data );
    }

    /**
     * Edit a particular record with new data.
     *
     * @param       $id
     * @param array $data
     */
    public function edit( $id, $data = [] )
    {
        return Story::find( $id )->fill( $data )->save();
    }

    /**
     * Fetch a particular story record by it's identifier.
     *
     * @param $id
     */
    public function find( $id )
    {
        return Story::with('categories')->whereId($id)->firstOrFail();
    }

    /**
     * Delete a particular story record.
     *
     * @param Story $story The story object.
     */
    public function delete( $story )
    {
        return $story->delete();
    }

    /**
     * Create a new Story model instance.
     *
     * @return Story
     */
    public function instance()
    {
        return new Story;
    }
} 