<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//Created a route that gets the latest five articles from the database and displays it on the home page
Route::get('/', function () {

    $posts = DB::table('articles')
                ->orderby('date_created', 'DESC')
                ->take(5)
                ->get();

    return view('home', ['posts'=>$posts]);
});

//Created a route that display a specific article depending on the id the user has entered in the URL
//This route also pass in form data from the search page, where the user as entered the id of the article they want to search for 
Route::get('/article/{id}', function (Request $request, $id) {

    //If the user has requested to search for an article via the search page:
    //Then it will check if the user has entered any data
    if($request->has('art_id')){

        //If so then the $id parameter gets set to what the user has entered
        $id = $request->input('art_id');
    }

    //Making use of a custom helper function, this function checks if the $id parameter exists within the database (can be found in app\Helpers\Helper.php)
    $is_valid_art_id = Helper::check_if_item_exists('articles', 'art_id', $id);

    //If the id exists then it will retrieve the first articles with that id, as well as all the tags associated with that id 
    if($is_valid_art_id){

        //Created a variable that gets the first article with the id the user has entered either in the url or search page
        $post = DB::table('articles')
                    ->join('categories', 'categories.cat_id', '=', 'articles.cat_id')
                    ->where('articles.art_id', '=', $id)
                    ->first();

        //Created a variable that gets all the tags associated with the article id
        $tags = DB::table('article_tags')
                    ->join('tags', 'tags.tag_id', '=', 'article_tags.tag_id')
                    ->select('article_tags.*', 'tags.*')
                    ->where('article_tags.art_id', '=', $id)
                    ->get();
    }
    //Else, the $post and $tags variable gets set to null
    else{
        $post = null;
        $tags = null;
    }

    //Returns a view to the article page and displays the article and article tags retrieved from the database
    return view('article', ['id'=>$id, 'post'=>$post, 'tags'=>$tags]);
});


//Created a route that display a specific article depending on the id the user has entered in the URL
//This route also can also pass in form data from the search page, where the user as entered the category name of the category they want to search for 
Route::get('/category/{slug}', function (Request $request, $slug) {

    //If the user has requested to search for an article via the search page:
    //Then it will check if the user has entered any data
    if($request->has('cat_name')){

        //If so then the variable $cat_name gets set to what the user has entered
        $cat_name = $request->input('cat_name');

        //The $cat_name variable gets turned into a slug and gets set to the $slug parameter
        $slug = Str::slug($cat_name, '-');
    }
    
    //Making use of a custom helper function, this function checks if the $slug parameter exists within the database (can be found in app\Helpers\Helper.php)
    $is_valid_cat_slug = Helper::check_if_item_exists('categories', 'cat_slug', $slug);

    //If the slug exists then it will retrieve all the articles related to the category the user has entered either in the url or search page
    if($is_valid_cat_slug){

        $posts = DB::table('articles')
                    ->join('categories', 'categories.cat_id', '=', 'articles.cat_id')
                    ->select('articles.*', 'categories.*')
                    ->where('categories.cat_slug', '=', $slug)
                    ->get();
    }

    //If it does not exist then the $posts variable gets set to null
    else{
        $posts = null;
    }

    //Returns a view to the article page and displays all articles, related to the category chosen, retrieved from the database
    return view('category', ['slug'=>$slug, 'posts'=>$posts]);
});

//The following route has a similar format to the catergory route, using tags instead of categories
Route::get('/tag/{slug}', function (Request $request, $slug) {

    if($request->has('tag_name')){

        $tag_name = $request->input('tag_name');
        $slug = Str::slug($tag_name, '-');
    }

    $is_valid_tag_slug = Helper::check_if_item_exists('tags', 'tag_slug', $slug);

    if($is_valid_tag_slug){
    
    //Accesses aritcles table
    $posts = DB::table('articles')
                
                //Joins the article_tags table with the articles table (where the id's fields are equal)
                ->join('article_tags', 'article_tags.art_id', '=', 'articles.art_id')

                //Joins the tags table with the two tables above where the tags tables's id field is equal to the article_tags table's id field
                ->join('tags', 'tags.tag_id', '=', 'article_tags.tag_id')

                //Selects the following columns from all the tables (this essentially returns one big table with all these columns)
                ->select('articles.art_title', 'articles.art_content', 'articles.date_created', 'article_tags.*', 'tags.*')

                //Where the tags table's tag_slug field matches what the user has entered
                ->where('tags.tag_slug', '=', $slug)

                ->get();
    }

    else{
        $posts = null;
    }

    return view('tag', ['slug'=>$slug, 'posts'=>$posts]);
});

//Created a route to the legal page
Route::get('/legal/{subsection}', function($subsection){

    //Returns displays everything within the legal page's corresponding subsection
    return view('legal', ['subsection'=>$subsection]);

    //There are only two valid subsections
})->where('subsection', '(terms-of-use|privacy-policy)');

//Created a route that returns the search page
Route::get('/search', function(){
    return view('search');
});