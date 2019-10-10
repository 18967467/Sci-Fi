<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Robot Galaxy</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts -->
  <!--   <script src="https://kit.fontawesome.com/1be45fb696.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles-->  
  <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
  <!-- Datatable -->
  <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('datatables/cardtransfer.css') }}" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery-3.4.1.js') }}"></script>
  	<script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
  	<script src="{{ asset('datatables/cardtransfer.js') }}"></script> 
  	
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery-3.4.1.js') }}"></script>
    <script src="jquery-3.4.1.min.js"></script>
    
  	<script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
  	<script src="{{ asset('datatables/cardtransfer.js') }}"></script> 
  	
  	<script type="text/javascript">
  		
  			$(document).ready(function(){        	
          $('#addComment').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
           headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
               }
              });
          $.ajax({
          url:"{{route('comments.comment.store')}}",
          method: 'post',
          dataType:'json',
          data:{
          robot_id:$('#robot_id').val(),
          
          comment:$('#comment').val()
              },
         success:function(result){
           var user={!!json_encode(Auth::user())!!}
           $("#display-comment").append("<div class='card-header'><em><strong>"+user.name+"</strong></em></div><div class='card-body comment-container'><span>"+result.comment+"</span><a href='' id='reply'></a><form class='form-horizontal' method='post' id='comment_form' action='{{route('reply.add')}}'><input type='hidden' name='_token' value='{{!!csrf_token()!!}'><div class='form-group'><div class='col-md-8'><input type='text' name='comment' id='comment' data-id='{{!!$robot->id!!}}'/><input type='hidden' id='robot_id' name='robot_id' value='{{!!$robot->id!!}}'/><input type='hidden' id='comment_id' name='comment_id' value='{{!!$comment->id!!}}'/></div></div><div class='form-group' align='center'><button type='submit' class='btn btn-success' id='addComment'>Reply</button></div></form></div>");         
           $('.alert').show();
           $('.alert').html(result.success);
             }});
          $('#name').val('');
          $('#comment').val('');
          
              });
          $.ajax({
                type : 'get',
                url : '{{ route('filter') }}',
                success:function(data){
					//console.log();
					$('#content').html(data);
                }
        	})        	
  	
        	$("#filterForm").submit(function(event){
          	event.preventDefault(); //prevent default action 
//           	var post_url = $(this).attr("action"); //get form action url
//           	var request_method = $(this).attr("method"); //get form GET/POST method
          	var form_data = $(this).serialize(); //Encode form elements for submission        	
          	$.ajax({
          		type : 'get',
                  url : '{{ route('filter') }}',
          		data : form_data,
          		success:function(data){
//   					console.log(form_data);
  					$('#content').html(data);
                  }
          	});
          });
          });        	
           
  	      
        
        
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    	<div class="container">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">                  
                    @guest
                    <li class="nav-item">
                    	<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else           	                    	
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" style="color: yellow;">Welcome {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'home' ? 'active' : '' }}">
                    <a class="nav-link" href="/home">Robots
                    </a>
                    </li> 
                    <li class="nav-item {{ $active == 'upload' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('upload') }}">{{ __('Upload') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'shared' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('shared') }}">{{ __('My shared') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'saved' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('saved') }}">{{ __('Saved List') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'profile' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'statistic' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('statistic') }}">{{ __('Statistic') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        	onclick="event.preventDefault();
                        		   document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                    </li>
                    @endguest
                </ul>
            </div>
    	</div>
    </nav>
    
    <!-- Page Content -->
    <div class="container">    
    	@yield('content')    
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
        	<p class="m-0 text-center text-white">Copyright &copy; Robot Galaxy 2019</p>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery-3.4.1.js') }}"></script>
  	<script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
  	<script src="{{ asset('datatables/cardtransfer.js') }}"></script> 
  	
  	<script type="text/javascript">
  		$(document).ready(function(){        	
        	$.ajax({
                type : 'get',
                url : '{{ route('filter') }}',
                success:function(data){
					//console.log();
					$('#content').html(data);
                }
        	});
        })
        
        $("#filterForm").submit(function(event){
        	event.preventDefault(); //prevent default action 
//         	var post_url = $(this).attr("action"); //get form action url
//         	var request_method = $(this).attr("method"); //get form GET/POST method
        	var form_data = $(this).serialize(); //Encode form elements for submission        	
        	$.ajax({
        		type : 'get',
                url : '{{ route('filter') }}',
        		data : form_data,
        		success:function(data){
// 					console.log(form_data);
					$('#content').html(data);
                }
        	});
        });
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    	<div class="container">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">                  
                    @guest
                    <li class="nav-item">
                    	<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else           	                    	
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" style="color: yellow;">Welcome {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'home' ? 'active' : '' }}">
                    <a class="nav-link" href="/home">Robots
                    </a>
                    </li> 
                    <li class="nav-item {{ $active == 'upload' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('upload') }}">{{ __('Upload') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'shared' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('shared') }}">{{ __('My shared') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'saved' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('saved') }}">{{ __('Saved List') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'profile' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item {{ $active == 'statistic' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('statistic') }}">{{ __('Statistic') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        	onclick="event.preventDefault();
                        		   document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                    </li>
                    @endguest
                </ul>
            </div>
    	</div>
    </nav>
    
    <!-- Page Content -->
    <div class="container">    
    	@yield('content')    
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
        	<p class="m-0 text-center text-white">Copyright &copy; Robot Galaxy 2019</p>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery-3.4.1.js') }}"></script>
    <script src="jquery-3.4.1.min.js"></script>
    
  	<script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
  	<script src="{{ asset('datatables/cardtransfer.js') }}"></script> 
  	
  	<script type="text/javascript">
  		
  			$(document).ready(function(){        	
          $('#addComment').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
           headers:{
           'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
               }
              });
          $.ajax({
          url:"{{route('comments.comment.store')}}",
          method: 'post', 
          data:{
          robot_id:$('#robot_id').val(),
          name:$('#name').val(),
          comment:$('#comment').val()
              },
         success:function(result){
           $("#display-comment").append("<div class='card-header'><em><strong>"+result.name+"</strong></em></div><div class='card-body comment-container'><span>"+result.comment+"</span></div>");  
           $('.alert').show();
           $('.alert').html(result.success);
             }});
          $('#name').val('');
          $('#comment').val('');
          
              });
          $.ajax({
                type : 'get',
                url : '{{ route('filter') }}',
                success:function(data){
					//console.log();
					$('#content').html(data);
                }
        	})        	
  	
        	$("#filterForm").submit(function(event){
          	event.preventDefault(); //prevent default action 
//           	var post_url = $(this).attr("action"); //get form action url
//           	var request_method = $(this).attr("method"); //get form GET/POST method
          	var form_data = $(this).serialize(); //Encode form elements for submission        	
          	$.ajax({
          		type : 'get',
                  url : '{{ route('filter') }}',
          		data : form_data,
          		success:function(data){
//   					console.log(form_data);
  					$('#content').html(data);
                  }
          	});
          });
          });
            
                   
            
  				
     
               
             
          
           
           
  	  	        	
           
  	      
        
        
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
  	
</body>
</html>