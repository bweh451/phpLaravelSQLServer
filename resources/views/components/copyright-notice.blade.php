<!--Displays the following to the user when this component gets called-->
<div>
   <p style="display: inline-block; margin-right: 10px">Visit our <a href="{{url('search/')}}">Search Page.</a></p>
   <p style="display: inline-block; margin-right: 10px">Visit our <a href="{{url('/legal/privacy-policy')}}">Privacy Policy </a> or <a href="{{url('/legal/terms-of-use')}}">Terms of Use</a> page.</p>
   <p style="display: inline-block; margin-right: 10px">Copyright &copy; from 2021-{{now()->year}} Cool Tech LLC.</p>
</div>

<!--I used the following resource in order to help me with the creation of components:-->
<!--Youtube.com. 2020. Laravel 8 Tutorial - Blade Components. [online] Available at: <https://www.youtube.com/watch?v=nvdwOF40hxA> [Accessed 14 June 2022].-->