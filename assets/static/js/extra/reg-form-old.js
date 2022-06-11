"use strict";
$(document).ready(function() {

        $('#smartwizard').smartWizard({
           //selected: 0, // Initial selected step, 0 = first step
          // theme: 'dots', // theme for the wizard, related css need to include for other than default theme
           enableURLhash: false, //true, // Enable selection of the step based on url hash
           transition: {
              animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
              //speed: '400', // Transion animation speed
              //easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
           },
           anchorSettings: {
              anchorClickable: false, //true, // Enable/Disable anchor navigation
              removeDoneStepOnNavigateBack: true //false, // While navigate back done step after active step will be cleared
           }
       });
       
		$(".toolbar").prepend("<button class='btn btn-danger reset' type='reset'>Cancel</button>");
		$(".toolbar").append("<button class='btn btn-success submit' type='submit'>Submit</button>");


        $(".reset").on("click", () => {
           $('#smartwizard').smartWizard("reset");

        })

        // Initialize the leaveStep event
        $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
           //console.log(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection);
           var formSec = document.querySelector(".form-step-" + currentStepIndex);
           var fields = formSec.querySelectorAll(".fields");
           if (stepDirection == "forward") {
              //alert(fields.length);
              for (var i = 0; i < fields.length; i++) {
                 if (!fields[i].checkValidity()) {
                    fields[i].focus();
                    $(fields[i]).notify(fields[i].validationMessage,{ className: 'error',autoHideDelay: 2000,position:"top" });
                    //toastr.error(fields[i].validationMessage);
                    return false;
                 }
              }

           }
           //return confirm("Do you want to leave the step " + currentStepIndex + "?");
        });

        // Initialize the showStep event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection) {
           //console.log(e, anchorObject, stepIndex, stepDirection);
           //alert("You are on step "+stepIndex+" now");
           if ($('button.sw-btn-next').hasClass('disabled')) {
              $('button.sw-btn-next').hide();
              $('.submit').show(); // show the button extra only in the last page
           } else {
              $('button.sw-btn-next').show();
              $('.submit').hide();
           }

        });


     });