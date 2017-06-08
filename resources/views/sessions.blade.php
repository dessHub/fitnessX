<!doctype html>
<html lang="en">
  @include('partials.bootstrap')

   <title>Bootstrap Timepicker Example</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<body>

<div class="wrapper">
   @include('partials.sidebar')

    <div class="main-panel">
      @include('partials.nav')

<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Sessions</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/session') }}">
                        {{ csrf_field() }}

                       <div style="col-md-6">
                        <div class="form-group">
                            <label for="start" class="col-md-4 control-label">Start</label>

                            <div >
                              <div style="col-md-6">
                                  <input class="form-control" type="text" name="start" id="time"/>
                              </div>
                          </div>
                        </div>
                        </div>

                       <div style="col-md-6">
                        <div class="form-group">
                            <label for="end" class="col-md-4 control-label">End</label>

                            <div >
                              <div style="col-md-6">
                                  <input class="form-control" type="text" name="end" id="etime"/>
                              </div>
                          </div>
                        </div>
                          </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Hit Title</label>

                            <div class="col-md-6">
                                 <select class="form-control" id="title" name="title" required="true" value="{{ old('title') }}" style="background-color : inherit">
                                     <option  value="">Select Trainer</option>
                                     @foreach($hits as $key)
                                      <option  value="{{ $key->title}}">{{ $key->title}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trainer') ? ' has-error' : '' }}">
                            <label for="trainer" class="col-md-4 control-label">Trainer</label>

                            <div class="col-md-6">
                                 <select class="form-control" id="trainer" name="trainer" required="true" value="{{ old('trainer') }}" style="background-color : inherit">
                                     <option  value="">Select Trainer</option>
                                     @foreach($trainers as $key)
                                      <option  value="{{ $key->id}}">{{ $key->name}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Create
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                          <th>Start</th>
                          <th>End</th>
                        <th>Title</th>
                        <th>Trainer</th>
                          
                        </thead>
                        <tbody>
                          @foreach($sessions as $key)
                            <tr>
                              <td>{{ $key->id}}</td>
                              <td>{{ $key->start}}</td>
                              <td>{{ $key->end}}</td>
                              <td>{{ $key->title}}</td>
                              <td>{{ $key->trainer}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>


        </div>

</div>
  </div>
</div>


@include('partials.footer')

</div>


</div>
<script>

    $('#time').datetimepicker({
        format: 'HH:mm'
    });
    $('#etime').datetimepicker({
        format: 'HH:mm'
    });
</script>


</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
@include('partials.js')
</html>
