<!DOCTYPE html>
<html>
<head>
    <title> Ajax_Serialize </title>
	
	<!-- Meta Tags Satrt -->
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
	<link rel="icon" type="text/css" href="">
	<!-- Meta Tags Close -->
     
    <!-- CSS start -->
      
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/animate.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- CSS close -->

    <style type="text/css">
    </style>

</head>
<body>

<div class="container-fluid">
	<div class="container">
		
		<div class="row text-center">
			<div class="col-md-4"></div>
			<div class="col-md-4">
          		 <h1>Ajax_Serialize_Form</h1>
				    <form id="submit_form">  
        <table width="100%" cellpadding="10px" class="main_table">
          <tr>
            <td width="150px"><label>Name:</label></td>
            <td><input type="text" name="fullname" id="fullname" /></td>
          </tr>
          <tr>
            <td><label>Age:</label></td>
            <td><input type="number" name="age" id="age" /></td>
          </tr>
          <tr>
            <td><label>Gender:</label></td>
            <td>
              <input type="radio" name="gender" value="male" /> Male  
              <input type="radio" name="gender" value="female" /> Female
            </td>
          </tr>
          <tr>
            <td><label>Country:</label></td>
            <td>
              <select name="country">
                 <option value="ind">India</option>
                 <option value="pk">Pakistan</option>
                 <option value="ban">Bangladesh</option>
                 <option value="ne">Nepal</option>
                 <option value="sl">Srilanka</option>
              </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" name="submit" id="submit" value="Submit" class="btn btn-info" /></td>
          </tr>
        </table>
      </form>  
      <div id="response"></div>  
    </div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>

<!-- Js Files Start -->
<script type="text/javascript" src="js/all.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<script  type="text/javascript">
	$(document).ready(function() {
		$("#submit").click(function() {
			var name = $("#fullname").val();
			var age = $("#age").val();

			if (name == "" || age == "" || !$('input:radio[name=gender]').is(':checked') ) {
				$('#response').fadeIn();
				$('#response').removeClass('success-msg').addClass('error-msg').html('All Fields Are Required..!');
			}else{
				// $('#response').html($('#submit_form').serialize());
				$.ajax({
					url: 'save-form.php',
					type: 'POST',
					data: $('#submit_form').serialize(),
					// For loading // while Data not send
					beforesend: function(){
						$('#response').fadeIn();
						$('#response').removeClass('success-msg error-msg').addClass('process-msg').html('Loading response....');		
					},
					// 
					success: function(data){
						$('#submit_form').trigger('reset');
						$('#response').fadeIn();
						$('#response').removeClass('error-msg').addClass('success-msg').html(data); 
						setTimeout(function(){
							$('#response').fadeOut("slow");
						},3000);
					}
				});			
			}

		});
	});

</script>

</body>
</html>