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

      @if(Auth::user())
        @if(Auth::user()->role === "Admin")
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Announcement</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/anounce') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                <label for="note" class="col-md-4 control-label">Anouncement</label>

                                <div class="col-md-6">
                                    <textarea id="note" class="form-control ckeditor" name="note"></textarea>

                                    @if ($errors->has('note'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('note') }}</strong>
                                        </span>
                                    @endif
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

        @endif
      @endif

        <div class="row">

            <div class="col-md-offset-2 col-md-8">
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
                                      @foreach($anounces as $key)
                                        <td>{{ $key->note}}</td>
                                        <td class="td-actions text-right">
                                        <div class="stats">
                                            <i class="fa fa-history"></i> Posted On {{ $key->created_at}}
                                        </div>
                                        </td>
                                        @endforeach
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
