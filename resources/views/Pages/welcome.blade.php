
@extends('main')
<!-- main is the name of the page under views -->

@section('title',' | HomePage ')

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                      <h1>Welcome to my Blog!</h1>
                      <p class="lead">Thank you for visiting. this is the geratest website i have done yet</p>
                      {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p> --}}
                    </div>
                </div>
            </div> <!-- End of header . row -- >

            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-xs-12 col-md-8">
              
                  @foreach($posts as $post)

                    <div class="post">
                        <h3>{{$post->title}}</h3>
                        <p>
                          {{substr(strip_tags($post->body), 0 ,300)}} {{strlen(strip_tags($post->body)) > 300?"..." :"" }}
                        </p>
                        <a href="{{url('blog/'.$post->slug) }} " class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                  @endforeach

              </div>
              <div class="col-xs-4 col-md-3">
                  <h3>Side Bar</h3>
                  <p>Hello this is fun</p>
              </div>
          </div> <!-- End of header . row -- >    

@endsection 