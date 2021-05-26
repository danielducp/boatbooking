<html>
<head>
<meta charset="UTF-8"/> 
<meta name="generator" content="AlterVista - Editor HTML"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- <link type="text/css" rel="stylesheet"   			     href="css/fontawesome5web/css/all.css"/> -->
<link type="text/css" rel="stylesheet"   			     href="css/fontawesome5web/css/all.css"/>

<link rel="stylesheet" href="css/bootstrap.css">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="css/mdb.css">
<!-- Your custom styles (optional) -->
</head>

<!-- INIZIO CREAZIONE DELLA STRUTTURA DEL BOOTSTRAP DEI CONTATTI-->

<body>
    <div class="container">

        <!--Section: Contact v.2-->
        <section class="section">

            <!--Section heading-->
            <h2 class="section-heading h1 pt-4">Contattaci</h2>
            <!--Section description-->
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>
            <br> <br>
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 col-xl-9">
                    <form id ="contact-form" name="contact-form" action="mail.php" method="POST"  onsubmit="return validateForm()" >

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form"> <!--<div class="md-form"> -->
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">Tuo nome</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">email</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Oggetto</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" class="md-textarea"></textarea>
                                    <label for="message">Tuo messaggio</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="center-on-small-only">
                        <a class="btn btn-primary" onclick="validateForm()">Invia</a>
                    </div> <div class="status" id="status"></div>
               </div>
               
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 col-xl-3">
                    <br>
                    <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: auto; width: auto" align=center>
                    <iframe src="https://maps.google.com/maps/d/embed?mid=1dl1PrrkJgd8nxheI6PcovOjiBqo&msa=0&hl=en&ie=UTF8&vpsrc=0&ll=45.475540000000045%2C9.188647000000016&spn=0.014445%2C0.027466&z=15&output=embed" frameborder="0"
          				style="border:0" allowfullscreen></iframe>
                    </div>
                    <ul class="contact-icons">
                        <br>
                        <li align=center><i class="fa fa-map-marker fa-2x"></i>
                            <p align=center>Milano, MI 20019, Italia </p>
                        </li>

                        <li align=center><i class="fa fa-phone fa-2x"></i>
                            <p align=center>+ 39 347 30 69 765</p>
                        </li>

                        <li align=center ><i class="fa fa-envelope fa-2x"></i>
                            <p align=center >mario.rossi@hotmail.com</p>
                        </li>
                        <li align=center><i class="fab fa-twitter" style="font-size:40px"></i>
                            <p align=center>mario rossi</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

               </div>

        </section>
        <!--Section: Contact v.2-->

        </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
    <!--Custom scripts-->
    
    <script>
	function validateForm() {
    	// var x =  document.getElementById('name').value;
    	// if (x == "") {
    	//     document.getElementById('status').innerHTML = "Name cannot be empty";
    	//     return false;
    	// }
    	// x =  document.getElementById('email').value;
    	// if (x == "") {
    	//     document.getElementById('status').innerHTML = "Email cannot be empty";
    	//     return false;
    	// } else {
    	//     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	//     if(!re.test(x)){
   		//         document.getElementById('status').innerHTML = "Email format invalid";
    	//         return false;
    	//     }
    	// }
    	// x =  document.getElementById('subject').value;
    	// if (x == "") {
    	//     document.getElementById('status').innerHTML = "Subject cannot be empty";
    	//     return false;
    	// }
    	// x =  document.getElementById('message').value;
    	// if (x == "") {
    	//     document.getElementById('status').innerHTML = "Message cannot be empty";
    	//     return false;
    	// }
 	//get input field values data to be sent to server
    	document.getElementById('status').innerHTML = "Sending...";
    	formData = {
        	'name'     : $('input[name=name]').val(),
        	'email'    : $('input[name=email]').val(),
        	'subject'  : $('input[name=subject]').val(),
        	'message'  : $('textarea[name=message]').val()
    	};


   		$.ajax({
    		url : "mail.php",
    		type: "POST",
    		data : formData,
    		success: function(data, textStatus, jqXHR)
    	{

        	$('#status').text(data.message);
        	if (data.code)  //If mail was sent successfully, reset the form.
        		$('#contact-form').closest('form').find("input[type=text], textarea").val("");
    	},
    	error: function (jqXHR, textStatus, errorThrown)
    		{
        	$('#status').text(jqXHR);
    	}
	});

}	// END FUNCTION validateForm()
    </script>
</body>
</html>
