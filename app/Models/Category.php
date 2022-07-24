<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'file_path_mega_menu',
        'url_mega_menu',
        'category_icon',
        'category_name',
    ];

    private $collect_ids = [];
    private $collect_names = [];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Working
     * Collect all Childrens eager loaded with Category Model
     * @param Category $category
     * @return $array
     */
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrens');
    }

    public function parents()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('parents');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Working
     * Collect all Parent Names from a Category Model in an array 
     * @param Category $category
     * @return $array
     */
    public function getParentsNames(Category $cat): array
    {

        if ($cat->parent_id !== null) {
            $this->collect_names[] = $cat->name;
            $cat = Category::where('id', $cat->parent_id)->first();
            $this->getParentsNames($cat);
        } else {
            $this->collect_names[] = $cat->name;
        }

        return array_reverse($this->collect_names);
    }


    /**
     * Working
     * Collect all Parent IDs from a Category Model in an array 
     * @param Category $category
     * @return $array
     */
    public function getParentsIDs(Category $cat): array
    {
        $this->collect_ids[] = $cat->id;
        if ($cat->parent_id !== null) {
            $this->collect_ids[] = intval($cat->parent_id);
            $cat = Category::where('id', $cat->parent_id)->first();
            $this->getParentsIDs($cat);
        }

        return array_unique($this->collect_ids);
    }

    /**
     * Working
     * Collect all Children IDs from a Category Model but Eager loaded with childrens in an array 
     * How to call this method :
     * $category_target = Category::with('childrens')->where('id', $r->category_nested_id)->first();
     * 
     * @param Category $category eager loaded
     * @return $array
     */
    public function getChildrensIDs($category)
    {
        if ($category->children) {
            $this->collect_ids[] = $this->id;
            foreach ($category->children as $category) {
                $this->collect_ids[] = $category->id;
                $this->getChildrensIDs($category);
            }
        }

        return array_unique($this->collect_ids);
    }


    /**
     * Working
     * Returning all products of category
     * 
     * @param Category $category no eager loaded
     * @return Product
     */
    public function products_of_category($category)
    {
        if ($category->children) {
            $this->collect_ids[$category->name] = $category->id;
            foreach ($category->children as $category) {
                $this->collect_ids[$category->name] = $category->id;
                $this->products_of_category($category);
            }
        }

        return Product::whereIn('category_id', $this->collect_ids)->get();
    }
}
