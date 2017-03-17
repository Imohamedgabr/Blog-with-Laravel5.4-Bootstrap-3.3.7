<!DOCTYPE html>
<html lang="en">
<head>
@include('Partials._head')
<!-- partials has to start with _ and you can use include with it and we made a folder-->
</head>
  <body>
   @include('Partials._nav') 
   
        
        <div class="container">
        <br>
        @include('partials._messages')
        {{-- {{Auth::check()? "Logged In" : "Logged Out"}} --}}
        <!-- this is blade -->
        @yield('content')


        </div> <!-- End of container -- >
        
    @include('Partials._javascript')     
    @include('Partials._footer') 
    @yield('scripts')

  </body>
</html>