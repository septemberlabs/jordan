<?php

class DatabaseSeeder extends Seeder {

    /**
     * Define a list of table that will be used
     * during the seeding process.
     */
    public $tables = [
        'categories'
    ];

    // Define a list of seeders to call.
    //
    public $seeders = [
        'CategoriesTableSeeder'
    ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        // Loop through the tables and truncate
        // each one.
        //
        foreach( $this->tables as $table )
        {
            DB::table($table)->truncate();
        }

        // Loop through our list of seeder and
        // call each one.
        //
        foreach( $this->seeders as $seeder )
        {
            $this->call($seeder);
        }
	}

}
