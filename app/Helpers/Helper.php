<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
class Helper{

    //Created a function that takes in the content from an article
    public static function generate_paragraphs($content){

        //Created an array from the content passed through, by splitting the content into array items where there are new-line characters ("\n") found 
        $para_arr = explode("\n", $content);
        
        //For each loop that loops through the array and creates the paragraph tags for each array item
        foreach($para_arr as $para){
            echo '<p>'.$para.'</p>';
        }
    }

    //Created a function that checks if the route parameter (either $id or $slug) entered in the URL or relative search field exists within the database
    public static function check_if_item_exists($table_name, $field_name, $route_param){

        $exists = DB::table($table_name)
                    ->where($field_name, '=', $route_param)
                    ->exists();

        //Returns either true or false
        return $exists;
    }
}
//I used the following resource in order to help me with creating helper functions:
//Oliveira, C. and Silber, J., 2022. How to create custom helper functions in Laravel. [online] Stack Overflow. Available at: <https://stackoverflow.com/questions/28290332/how-to-create-custom-helper-functions-in-laravel> [Accessed 14 June 2022].
?>