$(document).ready(function(){

// Sidebar
$(".button-collapse").sideNav();

$('.parallax').parallax();

//Carousel
$('.carousel').carousel();

// Register Submit Button
$('#submitBtn').addClass('disabled');

$('#user_name, #regemail, #address, #regpassword, #password-confirm').on('keyup', function() {
	if(allFilled() && $("#regpassword").val() == $("#password-confirm").val()){ 
		$('#submitBtn').removeClass('disabled');
		console.log('enable')
	}else{
		$('#submitBtn').addClass('disabled');
		console.log('disable')
	}

});

function allFilled() {
	var filled = true;
	$('#reg-form input').each(function() {
		if($(this).val() == '') filled = false;
	});
	return filled;
}


$("#regpassword").on("focusout", function () {
    if ($(this).val() != $("#passwordConfirm").val()) {
        $("#password-confirm").removeClass('valid').addClass('invalid');
    } else {
        $("#password-confirm").removeClass('invalid').addClass('valid');
    }
});

$("#password-confirm").on("keyup", function () {
    if ($("#regpassword").val() != $(this).val()) {
        $(this).removeClass("valid").addClass("invalid");
    } else {
        $(this).removeClass("invalid").addClass("valid");
    }
});


//Category
$('select').material_select();


//Add Item
$('#modal1').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        $.ajax({
        method: 'post',
        url: 'modal_render.php',
        data: {
          add : true,
        },
        success: function(data){
          $("#modal1").modal('open');
          $("#modal-body").html(data);

        }
      });
     
      },
      complete: function() {  } // Callback for Modal close
    });

var index;  /* global variable */
$(".delete_modal_body").click(function(){
    index = $(this).data('index');  /* retrieve id of current item clicked */
});

// Delete Item
$('#modal2').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        $.ajax({
        method: 'post',
        url: 'deleteitemModal.php',
        data: {
        index : index
        },
          success: function(data){
            // console.log(data);
            $("#modal2").modal('open');
            $(".deletemodal-body").html(data);;

          }
        });
     
      },
      complete: function() {  } // Callback for Modal close
    });

// Edit Modal
$(".edit_modal_body").click(function(){
    index = $(this).data('index');  /* retrieve id of current item clicked */
});

$('#modal3').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.

        $.ajax({
        method: 'post',
        url: 'edit_modal_render.php',
        data: {
          edit : true,
          index : index
        },
          success: function(data){
            // console.log(data);
            $("#modal3").modal('open');
            $(".editmodal-body").html(data);;

          }
        });
     
      },
      complete: function() {  } // Callback for Modal close
    });

$('.carousel-slider').carousel({fullWidth: true});

});



    

