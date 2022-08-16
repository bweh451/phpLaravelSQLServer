<?php

//Created a function for this specific blade file
function get_first_paragraph($content){

    //Creates an array from the content passed through, by splitting the content into array items where there are new-line characters ("\n") found 
    $para_arr = explode("\n", $content);

    //Gets the first array item (ie. the first paragraph of the content)
    $first_para = $para_arr[0];

    //Returns the first paragraph
    return $first_para;
}
?>

<html>

<head>

    <title>Cool Tech Homepage</title>

    <!--Calls the cookie-notice component displaying information to the user (can be found in views\components\cookie-notice.blade.php)-->
    <x-cookie-notice/>

</head>

<body>
    
    <h1>Welcome to cool tech!</h1>

    <h2>Our latest blog posts:</h2>

    <!--Displays latest five articles retrieved from the database-->
    <div>

        <!--Loops through the $posts collection in order to display each article-->
        @foreach($posts as $post)      
            <h3><a href="{{ url('/article/' . $post->art_id) }}">{{$post->art_title}}</a></h3>

            <!--Call to function created above-->
            <p>{{get_first_paragraph($post->art_content)}}</p>
        @endforeach

    </div>
    

</body> 

<footer>
    <!--Calls the copyright-notice component displaying information to the user (can be found in views\components\copyright-notice.blade.php)-->
    <x-copyright-notice/>
</footer>

</html> 