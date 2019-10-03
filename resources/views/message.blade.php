<html>
   <head>
      <title>Ajax Example</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      <script>

      $.ajaxSetup({

    		headers: {

    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    		        }

    	});

      
      $(document).ready(function() {
			$('#button').click(function() {
				$.post('getmsg', {'_token':{{ csrf_token() }}}, function(data) {
					console.log(data);
				});
				});
		
      })
            
      </script>
   </head>
   
   <body>
      <div id = "msg">This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         
         <button type="button" id="button" >Replace</button>
   </body>

</html>