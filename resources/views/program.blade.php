<!doctype html>
<html lang="en">
  @include('partials.bootstrap')
<body>

<div class="wrapper">
   @include('partials.sidebar')

    <div class="main-panel">
      @include('partials.nav')

<div class="content">
    <div class="container-fluid">

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
                                <td>{{ $key->name}}</td>
                                <td>
                                      @if(Auth::user())
                                      @if(Auth::user()->role === "Normal")
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/book') }}">
                                            {{ csrf_field() }}
                                            <input class="form-control" type="hidden" name="session_id" id="session_id" value="{{ $key->id}}"/>
                                            <input class="form-control" type="hidden" name="title" id="title" value="{{ $key->title}}"/>
                                            <input class="form-control" type="hidden" name="trainer" id="trainer" value="{{ $key->name}}"/>
                                            <input class="form-control" type="hidden" name="session" id="session" value="{{ $key->start}}-{{ $key->end}}"/>
                                      <input class="form-control" type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id}}"/>
                                      <input class="form-control" type="hidden" name="user_name" id="user_name" value="{{ Auth::user()->name}}"/>


                                      <button type="submit" class="btn btn-info">
                                          <i class="fa fa-btn fa-plus"></i> Book
                                      </button>
                                      </form>
                                      @else
                                      
                                      @endif
                                      @else
                                      <div><a href="{{ url('prog') }}">Book</a></div>
                                      @endif

                                    </td>
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
                      <h4 class="title">Programme Prices</h4>
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
      @include('partials.footer')

      </div>


</div>


</body>
    @include('partials.js')
</html>
