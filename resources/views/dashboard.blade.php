<!doctype html>
<html lang="en">
  @include('partials.bootstrap')
<body>

<div class="wrapper">
   @include('partials.sidebar')

    <div class="main-panel">
      @include('partials.nav')

      @extends('layouts.app')

      @section('content')
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="card">
                          <div class="header text-center">
                              <h4 class="title">WELCOME TO PACK GyM</h4>
                              <p class="category">We The Best Gym In Town.</p>
                          </div>
                          <div class="content">


                              <div class="footer text-center">
                                  <div class="legend">
                                      <i class="fa fa-star text-warning"></i>
                                      <i class="fa fa-star text-warning"></i>
                                      <i class="fa fa-star text-warning"></i>
                                      <i class="fa fa-star text-warning"></i>
                                      <i class="fa fa-star text-default"></i>
                                  </div>
                                  <hr>
                                  <div class="stats">
                                      <i class="fa fa-clock-o"></i> Body Fitness Starts Now
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


              </div>



              <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                          <div class="header">
                              <h4 class="title">Daily Routine</h4>
                              <p class="category"></p>
                          </div>
                          <div class="content">
                          <div class="content table-responsive table-full-width">
                              <table class="table table-hover table-striped">
                                  <thead>
                                      <th>ID</th>
                                    <th>Start</th>
                                    <th>End</th>
                                  <th>Title</th>
                                  <th>Trainer</th>
                                    <th>Action</th>
                                  </thead>
                                  <tbody>
                                    @foreach($sessions as $key)
                                      <tr>
                                        <td>{{ $key->id}}</td>
                                        <td>{{ $key->start}}</td>
                                        <td>{{ $key->end}}</td>
                                        <td>{{ $key->title}}</td>
                                        <td>{{ $key->trainer}}</td>
                                        <td><button class="btn-primary"><a href="url('/book{{$key->id }}') " >Book Session</a></button></td>
                                      </tr>
                                      @endforeach

                                  </tbody>
                              </table>

                          </div>


                              <div class="footer">
                                  <div class="legend">
                                  </div>
                                  <hr>
                                  <div class="stats">
                                      <i class="fa fa-check"></i> Data information certified
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="card ">
                          <div class="header">
                              <h4 class="title">Daily Routine</h4>
                              <p class="category"></p>
                          </div>
                          <div class="content">
                          <div class="content table-responsive table-full-width">
                              <table class="table table-hover table-striped">
                                  <thead>
                                      <th>ID</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                  </thead>
                                  <tbody>
                                    @foreach($hits as $key)
                                      <tr>
                                        <td>{{ $key->id}}</td>
                                        <td>{{ $key->title}}</td>
                                        <td>Ksh.{{ $key->price}}</td>
                                      </tr>
                                      @endforeach

                                  </tbody>
                              </table>

                          </div>


                              <div class="footer">
                                  <div class="legend">
                                  </div>
                                  <hr>
                                  <div class="stats">
                                      <i class="fa fa-check"></i> All Payments On The Desk
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="card ">
                          <div class="header">
                              <h4 class="title">Announcements</h4>
                              <p class="category"></p>
                          </div>
                          <div class="content">
                              <div class="table-full-width">
                                  <table class="table">
                                      <tbody>
                                          <tr>
                                              <td>Sign contract for "What are conference organizers afraid of?"</td>
                                              <td class="td-actions text-right">
                                              <div class="stats">
                                                  <i class="fa fa-history"></i> Posted On
                                              </div>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="footer">

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @endsection


      @include('partials.footer')

      </div>


</div>


</body>
    @include('partials.js')
</html>
