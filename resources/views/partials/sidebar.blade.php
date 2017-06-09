<div class="sidebar" data-color="purple" data-image="../public/assets/img/sidebar-5.jpg">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/home') }}" class="simple-text">
                <i>Fitness</i><em><b>X</b></em>
            </a>
        </div>

        <ul class="nav">

              <li class="active">
                  <a href="{{ url('/home') }}">
                      <i class="pe-7s-graph"></i>
                      <p>Dashboard</p>
                  </a>
              </li>
              <li>
                  <a href="{{ url('/user') }}">
                      <i class="pe-7s-user"></i>
                      <p>User Profile</p>
                  </a>
              </li>
              <li>
                  <a href="{{ url('/programs') }}">
                      <i class="pe-7s-user"></i>
                      <p>Our Programmes</p>
                  </a>
              </li>
              <li>
                  <a href="{{ url('anouncements')}}">
                      <i class="pe-7s-bell"></i>
                      <p>Anouncements</p>
                  </a>
              </li>
            @if (Auth::guest())
            @else
             @if(Auth::user()->role === "Admin")
            <li>
                <a href="{{ url('/users')}}">
                    <i class="pe-7s-user"></i>
                    <p>Registered Users</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/session')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Create Sessions</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/hit')}}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Add Programmes</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/tips')}}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Add Health Tips</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/bookings')}}">
                    <i class="pe-7s-science"></i>
                    <p>Booked Sessions</p>
                </a>
            </li>
            @elseif(Auth::user()->role === "Normal")
            <li>
                <a href="{{ url('/myschedule')}}">
                    <i class="pe-7s-science"></i>
                    <p>My Schedule</p>
                </a>
            </li>
            @elseif(Auth::user()->role === "Trainer")
            <li>
                <a href="{{ url('/mysessions')}}">
                    <i class="pe-7s-science"></i>
                    <p>My Sessions</p>
                </a>
            </li>
            @endif
            @endif
        </ul>
  </div>
</div>
