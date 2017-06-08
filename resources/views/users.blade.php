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

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Mobile No</th>
                                    	<th>Email</th>
                                    	<th>Gender</th>
                                    	<th>Role</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody>
                                      @foreach($users as $key)
                                        <tr>
                                        	<td>{{ $key->id}}</td>
                                        	<td>{{ $key->name}}</td>
                                        	<td>{{ $key->phoneNo}}</td>
                                        	<td>{{ $key->email}}</td>
                                        	<td>{{ $key->gender}}</td>
                                        	<td>{{ $key->role}}</td>
                                          <td>
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/role') }}">
                                                {{ csrf_field() }}
                                                <input class="form-control" type="hidden" name="user_id" id="user_id" value="{{ $key->id}}"/>
                                                @if( $key->role === "Trainer")
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-btn fa-plus"></i> Make Admin
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-plus"></i> Make Trainer
                                                </button>
                                                @endif
                                                </form>
                                          </td>
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


</body>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</html>
