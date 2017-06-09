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
            <div class="col-md-offset-2 col-md-8">
                <div class="card">
                    <div class="header text-center">
                        <h4 class="title">WELCOME TO FITNESS X</h4>
                        <p class="category">We The Best Gym In Town.</p>
                    </div>
                    <div class="content">
                      <img class="border-gray" src="../public/assets/img/index6.png" alt="..." style="height:100%; width:100%;"/>

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
                                <a href="{{ url('programs')}}"><i class="fa fa-clock-o"></i> View Our Programmes</a>
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
                        <h4 class="title">Nutrition Tips</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content">
                    <div class="content ">
                    @foreach($tips as $key)                    
                    <ul>

                        <li>{{$key->tip }}</li>
                    </ul>
                    <hr>
                    @endforeach
                  
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
                        <h4 class="title"></h4>
                        <p class="category"></p>
                    </div>
                    <div class="content">
                    <div class="content ">
                        <img class=" border-gray" src="../public/assets/img/index4.jpg" alt="..." style="height:100%; width:100%;"/>

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
