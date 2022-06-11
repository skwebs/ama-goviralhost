"use struct";
function validateInp(formElem) {
  formElem.parentNode.classList.add("was-validated");
}

(function() {
  window.addEventListener('load', function() {
    // datepicker
    $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      showAnim: "fadeIn",
      dateFormat: "dd-mm-yy",
      yearRange: "c-15:c+0",
      // defaultDate:"-3",
      showButtonPanel: true
    }).on({
      focus: function() {
        let _this = $(this);
        _this.attr('readonly', 'true');
      },
      blur: function() {
        $(this).removeAttr('readonly', 'false');
      }
    });
  }, false);
})();

$(document).ready(function() {

  $('#smartwizard').smartWizard({
    selected: 0, // Initial selected step, 0 = first step
    theme: 'default', // theme for the wizard, related css need to include for other than default theme
    //justified: true, // Nav menu justification. true/false
    // darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
    //autoAdjustHeight: true, // Automatically adjust content height
    // cycleSteps: false, // Allows to cycle the navigation of steps
    // backButtonSupport: true, // Enable the back button support
    enableURLhash: false, //true, // Enable selection of the step based on url hash
    transition: {
      animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
    },
    toolbarSettings: {
      // toolbarPosition: 'bottom', // none, top, bottom, both
      // toolbarButtonPosition: 'right', // left, right, center
      // showNextButton: true, // show/hide a Next button
      // showPreviousButton: true, // show/hide a Previous button
      // toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
    },
    anchorSettings: {
      anchorClickable: false, //true, // Enable/Disable anchor navigation
      // enableAllAnchors: false, // Activates all anchors clickable all times
      // markDoneStep: true, // Add done state on navigation
      // markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: true //, //false, // While navigate back done step after active step will be cleared
      // enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
    },
    keyboardSettings: {
      keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyLeft: [37], // Left key code
      keyRight: [39] // Right key code
    },
    lang: { // Language variables for button
      next: 'Next',
      previous: 'Previous'
    } //,
    // disabledSteps: [], // Array Steps disabled
    // errorSteps: [], // Highlight step with errors
    //  hiddenSteps: [] // Hidden steps
  });
  $(".sw-btn-next").attr("type", "submit");
  $(".toolbar").append("<button class='btn btn-success submit'>Submit</button>");


  $("#reset").on("click", () => {
    $('#smartwizard').smartWizard("reset");

  })

  // Initialize the leaveStep event
  $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
    //console.log(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection);
    let formSec = document.querySelector(".form-step-" + currentStepIndex);
    let fields = formSec.querySelectorAll(".fields");
    if (stepDirection == "forward") {
      formSec.classList.add('was-validated');
      //alert(fields.length);
      for (var i = 0; i < fields.length; i++) {
        if (!fields[i].checkValidity()) {
          fields[i].focus();
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

  // Initialize the stepContent event
  $("#smartwizard").on("stepContent", function(e, anchorObject, stepIndex, stepDirection) {
    //return "Here is the content for step " + stepIndex;

  });

  $('#smartwizard').smartWizard({
    disabledSteps: [0, 1] // Array Steps disabled
  });
  $('#smartwizard').smartWizard({
    errorSteps: [1] // Highlight step with errors
  });

  $('.submit').on('click', function() {
    
    let sw = document.querySelector('#smartwizard')
    let fields = sw.querySelectorAll(".fields");
    sw.classList.add('was-validated');
    //alert(fields.length);
    for (var i = 0; i < fields.length; i++) {
    if (!fields[i].checkValidity()) {
    fields[i].focus();
    return false;
    }
    }
    
    /*for (var i = 0; i < fields.length; i++) {
      if (!fields[i].checkValidity()) {
        fields[i].focus();
        fields[i].classList.add('is-invalid');
        //alert(fields[i].validationMessage);
        return false;
      }
    }*/
  });



  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('.img-preview img').attr('src', e.target.result); //.addClass("border my-3");
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#img").change(function() {
    readURL(this);
  });

$('#smartwizard').smartWizard();
      
$(document).on("change", "#addIsSame", function() {
     if ($(this).is(":checked")) {
       $("#address2").val($("#address1").val())
     } else {
       $("#address2").val("");
     }
   });
   
   $(document).on("input", "#address1", function() {
   let addIsSame = $("#addIsSame")
   if(addIsSame.is(":checked")) {
   addIsSame.prop("checked", false)
   $("#address2").val("")
   } 
   });
   

    $('input[type=radio][name=sibling_studying]').change(function() {
      if (this.value == 'Yes') {
        $("#sibling-details").collapse("show");
        $("#siblingAdmId").prop({ required: true, disabled: false });
      }
      else if (this.value == 'No') {
        $("#sibling-details").collapse("hide");
        $("#siblingAdmId").prop({ required: false, disabled: true });
      }
    });

    $('input[type=radio][name=contact_person]').change(function() {
      if (this.value == 'Other') {
        //$("#contact_person_sec").collapse("show");
        $("#contact_person, #contact_person_rel").prop({ required: true, disabled: false });
      }
      else if (this.value !== 'Other') {
        //$("#contact_person_sec").collapse("hide");
        $("#contact_person, #contact_person_rel").prop({ required: false, disabled: true });
      }
    });


});