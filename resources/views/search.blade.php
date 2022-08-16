
<html>

<head>

    <title>Search</title>

    <!--Calls the cookie-notice component displaying information to the user (can be found in views\components\cookie-notice.blade.php)-->
    <x-cookie-notice/>

</head>
<body>

    <h1>Search for an article by:</h1>

    <!--Created three separate forms so that the user can search for an article by aritcle ID, category or tag respectively-->
    <div>

        <form action="{{url('/article/{id}')}}" method="get">
            @csrf
            <label for="art_id">Article ID:</label>
            <br/>
            <input type="number" min="1" max="5" name="art_id" placeholder="1">
            <br/>
            <br/>
            <button type="submit">Submit</button> 
        </form>
    </div>

    <br/>

    <div>

        <form action="{{url('/category/{slug}')}}" method="get">
            @csrf
            <label for="cat_name">Atricle Category:</label>
            <br/>
            <input type="text" name="cat_name" placeholder="Tech News">
            <br/>
            <br/>
            <button type="submit">Submit</button> 
        </form>

    </div>

    <br/>
    <br/>

    <div>

        <form action="{{url('/tag/{slug}')}}" method="get">
            @csrf
            <label for="tag_name">Article tag:</label>
            <br/>
            <input type="text" name="tag_name" placeholder="AI">
            <br/>
            <br/>
            <button type="submit">Submit</button> 
        </form>

    </div>

</body>

<footer>
    <!--Calls the copyright-notice component displaying information to the user (can be found in views\components\copyright-notice.blade.php)-->
    <x-copyright-notice/>
</footer>

</html>