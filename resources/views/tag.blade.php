<html>

<head>

    <title>Tags</title>

    <!--Calls the cookie-notice component displaying information to the user (can be found in views\components\cookie-notice.blade.php)-->
    <x-cookie-notice/>

</head>

<body>

<!--Displays all the articles, related to the tag chosen, retrieved from the database-->
    <div>

    <!--If the $posts collection is not null then all the articles related to the tag chosen gets displayed to the user-->
    @if($posts != null) 

         <!--Loops through the $posts collection in order to display each article related to the tag-->
        @foreach($posts as $post)
                <h1>{{$post->art_title}}</h1>
                <h2>{{$post->tag_name}}</h2>

                <!--Makes a call to the generate_paragraphs custom helper function (can be found in app\Helpers\Helper.php-->
                {{Helper::generate_paragraphs($post->art_content)}}

                <p>{{ $post->date_created }}</p>
        @endforeach
        
    <!--Else the following will be displayed to the user-->
    @else
        <h2>Woops! Looks like you have entered a tag that doesn't exist.</h2>
        <h3><a href="{{ url('/')}}">Back to homepage</a></h3>

    @endif

</div>

</body>

<footer>
     <!--Calls the copyright-notice component displaying information to the user (can be found in views\components\copyright-notice.blade.php)-->
    <x-copyright-notice/>
</footer>

</html>
