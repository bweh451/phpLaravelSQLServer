<html>

<head>

    <title>Articles</title>

    <!--Calls the cookie-notice component displaying information to the user (can be found in views\components\cookie-notice.blade.php)-->
    <x-cookie-notice/>

</head>
<body>
    
    <!--If both the $posts and $tags variables to not equal null-->
    @if($post != null && $tags != null)
    
    <!--Then the following will be displayed to the user:-->

        <!--Displays the article retrieved from the database-->
        <div>

            <h1>{{$post->art_title}}</h1>
            <h2>{{$post->cat_name}}</h2>

            <!--Makes a call to the generate_paragraphs custom helper function (can be found in app\Helpers\Helper.php-->
            {{Helper::generate_paragraphs($post->art_content)}}

            <p>{{ $post->date_created }}</p>

        </div>

        <!--Displays all the tags ,related to the article, retrieved from the database-->
        <div>

            <!--Loops through the $tags collection in order to display each tag related to the article-->
            @foreach($tags as $tag)
                <a href="{{ url('/tag/' . $tag->tag_slug) }}" style="display: inline-block; margin-right: 10px">{{$tag->tag_name}}</a>
            @endforeach

        </div> 

    <!--Else the following will be displayed to the user:-->
    @else
        <h2>Woops! Looks like you have entered an aricle id that doesn't exist.</h2>
        <h3><a href="{{url('/')}}">Back to homepage</a></h3>     
    @endif
</body>

<footer>
    <!--Calls the copyright-notice component displaying information to the user (can be found in views\components\copyright-notice.blade.php)-->
    <x-copyright-notice/>
</footer>

</html>