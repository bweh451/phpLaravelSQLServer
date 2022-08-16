
<html>

<head>

    <title>Categories</title>

     <!--Calls the cookie-notice component displaying information to the user (can be found in views\components\cookie-notice.blade.php)-->
    <x-cookie-notice/>

</head>

<body>

<!--Displays all the articles, related to the category chosen, retrieved from the database-->
    <div>

    <!--If the $posts variable is not null then all the articles related to the category chosen gets displayed to the user-->
    @if($posts != null)

         <!--Loops through the $posts collection in order to display each article related to the category-->
        @foreach($posts as $post)      
            <h1>{{$post->art_title}}</h1>
            <h2>{{$post->cat_name}}</h2>

             <!--Makes a call to the generate_paragraphs custom helper function (can be found in app\Helpers\Helper.php-->
            {{Helper::generate_paragraphs($post->art_content)}}

            <p>{{ $post->date_created }}</p>
        @endforeach
    
    <!--Else the following will be displayed to the user-->
    @else
        <h2>Woops! Looks like you have entered a category that doesn't exist.</h2>
        <h3><a href="{{url('/')}}">Back to homepage</a></h3>
    @endif

    </div>

</body>

<footer>
    <!--Calls the copyright-notice component displaying information to the user (can be found in views\components\copyright-notice.blade.php)-->
    <x-copyright-notice/>
</footer>

</html>