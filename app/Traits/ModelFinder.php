<?php  

namespace App\Traits;

use App\Article;
use App\Category;
use App\Role;

trait ModelFinder
{
	public function allArticles()
	{
		return Article::with('category', 'user')->latest();
	}

	public function publishedArticles()
	{
		return $this->allArticles()
			->published();
	}

	public function allCategories()
	{
		return Category::orderBy('name')->get();
	}

	public function getRole($name)
	{
		return Role::where('name', $name)->firstOrFail();
	}


}