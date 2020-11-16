<!DOCTYPE html>
    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">

        <img class="img-fluid" src="{{ public_path('/images/original' . $blogs->featured_image) }}" alt="Logo" height="250px" width="250px" alt="">

        {{-- height ="250" width="250" --}}
      </div>
      <div class="col-md-4">
        <h3 class="my-3">{{$blogs->title}}</h3>
        <p>{{$blogs->description}}</p>
        <hr>
        <p style="color:red"><i>Written on {{$blogs->created_at}} by {{$blogs->user->name}}</i></p>
        <hr>

