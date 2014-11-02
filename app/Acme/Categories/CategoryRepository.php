<?php namespace Acme\Categories;

class CategoryRepository {

    /**
     * Return a list of category records.
     *
     * @return mixed
     */
    public function getCategoryList()
    {
        return Category::lists('id', 'name');
    }

    /**
     * Return a listing all all categories in paginated object.
     *
     * @return mixed
     */
    public function getPaginated()
    {
        return Category::withTrashed()->orderBy('id', 'desc')->paginate(30);
    }

    /**
     * Create a new story record.
     */
    public function create( $data = [] )
    {
        return Category::create( $data );
    }

    /**
     * Edit a particular record with new data.
     *
     * @param int|string $id
     * @param array      $data
     *
     * @return bool
     */
    public function edit( $id, $data = [] )
    {
        return Category::withTrashed()->find( $id )->fill( $data )->save();
    }

    /**
     * Fetch a particular story record by it's identifier.
     *
     * @param $id
     */
    public function find( $id )
    {
        return Category::withTrashed()->whereId($id)->firstOrFail();
    }

    /**
     * Delete a particular story record.
     *
     * @param Category $category The story object.
     */
    public function delete( $category )
    {
        return $category->delete();
    }

    /**
     * Create a new Category model instance.
     *
     * @return Category
     */
    public function instance()
    {
        return new Category;
    }

    /**
     * Restore a record.
     *
     * @param $category
     *
     * @return mixed
     */
    public function restore( $category )
    {
        return $category->restore();
    }
} 