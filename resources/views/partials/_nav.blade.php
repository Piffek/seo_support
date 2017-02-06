<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">SitePromotor</a>
	    </div>
		
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	       	<li><a href="/">Strona Domowa</a></li>
	        <li><a href="/onas">O Nas</a></li>
	        <li><a href="/kontakt">Kontakt</a></li>
	       </ul>
	        @if (Auth::guest())
	        <ul class="nav navbar-nav navbar-right">
			<a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Logowanie</a>
	           <a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Rejestracja</a>
	         </ul>
			@elseif(Auth::user()->id)
			<ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Moje konto <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          <li><a href="{{ url('/mojeposty') }}">Moje Posty</a></li> 
	          <li><a href="{{ url('/posts/create') }}">Napisz post</a></li> 
	          <li><a href="{{ url('/tags') }}">Tagi</a></li>
	          <li><a href="{{ url('/edit_nr_layout') }}">Zmień layout</a></li>
                <li>
                <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
                  </form>
               </li>
	          </ul>
	        </li>
	      </ul>
            
          
           	@endif

	    
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	@include('partials._validator')
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
      @include('auth.login')
  </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
      @include('auth.register')
  </div>
</div>