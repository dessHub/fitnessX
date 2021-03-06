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
          <div class="col-md-12">
              <div class="card">
                  <div class="header">
                    My Classes
                  </div>
                  <div class="content table-responsive table-full-width">
                      <table class="table table-hover table-striped">
                          <thead>
                              <th>ID</th>
                            <th>Start</th>
                            <th>End</th>
                          <th>Title</th>
                          </thead>
                          <tbody>
                            @foreach($sessions as $key)
                              <tr>
                                <td>{{ $key->id}}</td>
                                <td>{{ $key->start}}</td>
                                <td>{{ $key->end}}</td>
                                <td>{{ $key->title}}</td>
                              </tr>
                              @endforeach

                          </tbody>
                      </table>

                  </div>
              </div>


          </div>

  </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">My Sessions</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                              <th>Session</th>
                              <th>Trainee</th>
                            <th>Programme</th>
                              <th>Price</th>
                              <th>Status</th>
                            </thead>
                            <tbody>
                              @foreach($books as $key)
                                <tr>
                                  <td>{{ $key->id}}</td>
                                  <td>{{ $key->session}}</td>
                                  <td>{{ $key->user_name}}</td>
                                  <td>{{ $key->title}}</td>
                                  <td>{{ $key->amount}}</td>
                                  <td>{{ $key->status}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                        <div class="footer">
                            <div class="legend">
                            </div>

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
