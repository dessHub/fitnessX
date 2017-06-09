<!doctype html>
<html lang="en">
  @include('partials.bootstrap')
  <style>

    .fa-btn {
        margin-right: 6px;
    }
</style>
<body>

<div class="wrapper">
   @include('partials.sidebar')

    <div class="main-panel">
      @include('partials.nav')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('tips') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Programme</label>

                            <div class="col-md-6">
                                 <select class="form-control" id="name" name="name" required="true" value="{{ old('name') }}" style="background-color : inherit">
                                     <option  value="">Select Programme</option>
                                     @foreach($hits as $key)
                                      <option  value="{{ $key->title}}">{{ $key->title}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div

                        <div class="form-group{{ $errors->has('ptip') ? ' has-error' : '' }}">
                            <label for="tip" class="col-md-4 control-label">Tip</label>

                            <div class="col-md-6">
                                <input id="tip" type="text" class="form-control" name="tip" value="{{ old('tip') }}">

                                @if ($errors->has('tip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Create
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
                          <th>Title</th>
                          <th>Price</th>
                        </thead>
                        <tbody>
                          @foreach($tips as $key)
                            <tr>
                              <td>{{ $key->id}}</td>
                              <td>{{ $key->name}}</td>
                              <td>{{ $key->tip}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

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
