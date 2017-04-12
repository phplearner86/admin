<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	protected $tables = ['articles', 'categories'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->change();
        // $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
    }

    public function change()
	{
		
		foreach ($this->tables as $table)
		 {
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			DB::table($table)->truncate();
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
		}
		
		
	}
}
