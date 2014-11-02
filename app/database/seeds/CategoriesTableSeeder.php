<?php

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define a list of default categories.
        //
        $categories = [
            'Crime' ,
            'Real Estate' ,
            'Restaurants'
        ];

        // Create an array that will contain all  of the
        // category records to create.
        //
        $records = [ ];

        // Loop through the categories and create a new record
        // to be inserted into the table
        //
        foreach ( $categories as $category )
        {
            $records[ ] = [
                'name'       => $category ,
                'created_at' => new DateTime
            ];
        }

        // Now insert the records into the database.
        //
        DB::table('categories')->insert( $records );
    }

}