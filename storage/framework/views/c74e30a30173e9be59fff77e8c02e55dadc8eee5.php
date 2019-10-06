<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Robot Galaxy</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>" rel="stylesheet">

  <!-- Custom fonts -->
  <!--   <script src="https://kit.fontawesome.com/1be45fb696.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles-->
  <link href="<?php echo e(asset('css/shop-homepage.css')); ?>" rel="stylesheet">
  <!-- Datatable -->
  <link href="<?php echo e(asset('datatables/datatables.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('datatables/cardtransfer.css')); ?>" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('jquery/jquery-3.4.1.js')); ?>"></script>
  	<script src="<?php echo e(asset('bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Datatable -->
    <script src="<?php echo e(asset('datatables/datatables.min.js')); ?>"></script>
  	<script src="<?php echo e(asset('datatables/cardtransfer.js')); ?>"></script>

  <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('jquery/jquery-3.4.1.js')); ?>"></script>
    <script src="jquery-3.4.1.min.js"></script>

  	<script src="<?php echo e(asset('bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Datatable -->
    <script src="<?php echo e(asset('datatables/datatables.min.js')); ?>"></script>
  	<script src="<?php echo e(asset('datatables/cardtransfer.js')); ?>"></script>

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
          url:"<?php echo e(route('comments.comment.store')); ?>",
          method: 'post',
          dataType:'json',
          data:{
          robot_id:$('#robot_id').val(),

          comment:$('#comment').val()
              },
         success:function(result){
           var user=<?php echo json_encode(Auth::user()); ?>

           $("#display-comment").append("<div class='card-header'><em><strong>"+user.name+"</strong></em></div><div class='card-body comment-container'><span>"+result.comment+"</span></div>");
           $('.alert').show();
           $('.alert').html(result.success);
             }});
          $('#name').val('');
          $('#comment').val('');

              });
          $.ajax({
                type : 'get',
                url : '<?php echo e(route('filter')); ?>',
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
                  url : '<?php echo e(route('filter')); ?>',
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
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                    	<a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>" style="color: yellow;">Welcome <?php echo e(Auth::user()->name); ?></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/home">Robots
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('upload')); ?>"><?php echo e(__('Upload')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('shared')); ?>"><?php echo e(__('My shared')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('saved')); ?>"><?php echo e(__('Saved List')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('profile')); ?>"><?php echo e(__('Profile')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('statistic')); ?>"><?php echo e(__('Statistic')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                        	onclick="event.preventDefault();
                        		   document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
                    				<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                    </form>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
    	</div>
    </nav>

    <!-- Page Content -->
    <div class="container">
    	<?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
        	<p class="m-0 text-center text-white">Copyright &copy; Robot Galaxy 2019</p>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('jquery/jquery-3.4.1.js')); ?>"></script>
  	<script src="<?php echo e(asset('bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Datatable -->
    <script src="<?php echo e(asset('datatables/datatables.min.js')); ?>"></script>
  	<script src="<?php echo e(asset('datatables/cardtransfer.js')); ?>"></script>

  	<script type="text/javascript">
  		$(document).ready(function(){
        	$.ajax({
                type : 'get',
                url : '<?php echo e(route('filter')); ?>',
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
                url : '<?php echo e(route('filter')); ?>',
        		data : form_data,
        		success:function(data){
// 					console.log(form_data);
					$('#content').html(data);
                }
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
<?php /**PATH C:\xampp\htdocs\Sci-Fi\resources\views/layouts/app.blade.php ENDPATH**/ ?>