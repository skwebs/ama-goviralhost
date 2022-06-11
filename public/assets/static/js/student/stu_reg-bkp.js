"use strict";
//show preloader until page loading
$('.preloader').fadeIn('slow', function() {
  // do something ...
});

function initDrp() {
  /*$('#dob').daterangepicker({
       showDropdowns: true,
       singleDatePicker: true,
       locale: {
           format: 'DD/MM/YYYY'
       }
   }).on({
        focus: function() {
          let _this = $(this);
          _this.attr('readonly', 'true');
        },
        blur: function() {
          $(this).removeAttr('readonly', 'false');
        }
      });
  */
  //try {
  $('.drp').each(function(i, el) {
    $(el).daterangepicker({
      showDropdowns: true,
      singleDatePicker: true,
      autoUpdateInput: false,
      minDate: "01/01/1816",
      maxDate: moment(),
      locale: {
        format: 'DD-MM-YYYY'
      }
    }, function(chosen_date) {
      $(el).val(chosen_date.format('DD-MM-YYYY'));
    });
  }).on({
    focus: function() {
      let _this = $(this);
      _this.attr('readonly', 'true');
    },
    blur: function() {
      $(this).removeAttr('readonly', 'false');
    }
  });
  //} catch (e) {}


}



function validateInp(formElem) {
  formElem.parentNode.classList.add("was-validated");
}

function initSmartWiz() {

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



  $(document).on("change", "#addIsSame", function() {
    if ($(this).is(":checked")) {
      $("#address2").val($("#address1").val())
    } else {
      $("#address2").val("");
    }
  });

  $(document).on("input", "#address1", function() {
    let addIsSame = $("#addIsSame")
    if (addIsSame.is(":checked")) {
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

  $("#regForm").on("submit", (e) => {
    e.preventDefault();
    e.stopPropagation();
    var regForm = document.querySelector("#regForm");
    var fd = new FormData(regForm);
    fd.append("action", "regData")
    $.ajax({
      url: baseUrl + '/student/action2',
      method: 'post',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      beforeSend() {
        $('.preloader').fadeIn('slow', function() {
          //   $(this).remove();
        });
      },
      success: function(res) {
        if (res.success) {
          // reset all thing on successful registration
          $("#regForm")[0].reset();
          $(".was-validated").removeClass("was-validated");
          $('.img-preview img').attr('src', '');
          $('#smartwizard').smartWizard("reset");
          $('.preloader').delay().fadeOut('slow', function() {
            //   $(this).remove();
          });
          alert("Your data saved in database.")
        } else {

          //alert(JSON.stringify(res))
          alert('suc: ' + res);
        }
      },
      error: function(err) {
        alert('err: ' + JSON.stringify(err))
      }
    });
  });




$('#smartwizard').smartWizard({
    theme: 'dots', // theme for the wizard, related css need to include for other than default theme
    enableURLhash: true, // Enable selection of the step based on url hash
    transition: {
      animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
    },
    anchorSettings: {
      removeDoneStepOnNavigateBack: true, //false, // While navigate back done step after active step will be cleared
    }
  });



/*
  $('#smartwizard').smartWizard({
    selected: 0, // Initial selected step, 0 = first step
    theme: 'dots', // theme for the wizard, related css need to include for other than default theme
    justified: true, // Nav menu justification. true/false
    darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
    autoAdjustHeight: true, // Automatically adjust content height
    cycleSteps: false, // Allows to cycle the navigation of steps
    backButtonSupport: true, // Enable the back button support
    enableURLhash: false, //true, // Enable selection of the step based on url hash
    transition: {
      animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
    },
    toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'right', // left, right, center
      showNextButton: true, //false, // show/hide a Next button
      showPreviousButton: true, //false, // show/hide a Previous button
      toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
    },
    anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: false, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: true, //false, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
    },
    keyboardSettings: {
      keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyLeft: [37], // Left key code
      keyRight: [39] // Right key code
    },
    lang: { // Language variables for button
      next: 'Next',
      previous: 'Previous'
    },
    disabledSteps: [], // Array Steps disabled
    errorSteps: [], // Highlight step with errors
    hiddenSteps: [] // Hidden steps
  });
*/


  $("#reset").on("click", () => {
    $('#smartwizard').smartWizard("reset");

  })

  // Initialize the leaveStep event
  $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
    //console.log(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection);
    var formSec = document.querySelector(".form-step-" + currentStepIndex);
    var fields = formSec.querySelectorAll(".fields");
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
      $(".toolbar").append("<button type='submit' id='regFormSub' class='btn btn-success'>Submit</button>");
      //$(':submit').show(); // show the button extra only in the last page
    } else {
      $('button.sw-btn-next').show();
      //$(':submit').hide();
      $("#regFormSub").remove();
    }

  });

  // Initialize the stepContent event
  $("#smartwizard").on("stepContent", function(e, anchorObject, stepIndex, stepDirection) {
    //return "Here is the content for step " + stepIndex;
    console.log(e);

  });

  $('#smartwizard').smartWizard({
    disabledSteps: [] // Array Steps disabled
  });
  $('#smartwizard').smartWizard({
    errorSteps: [1] // Highlight step with errors
  });

  /*$(':submit').on('click', function() {
    var fields = document.querySelector('#smartwizard').querySelectorAll(".fields");
    for (var i = 0; i < fields.length; i++) {
      if (!fields[i].checkValidity()) {
        fields[i].focus();
        alert(':submit')
        return false;
      }
    }
  });*/
  //show preloader until page loading
  $('.preloader').delay().fadeOut('slow', function() {
    //   $(this).remove();
  });









}; // initSmartWiz()



$(document).ready(function() {
  // get "baseUrl" from Views template/_layouts/base_layout.php
  $.ajax({
    url: baseUrl + '/student/action',
    method: 'post',
    data: { action: 'regPage' },
    success: function(res) {
      $("#reg-page").html(res);
      initSmartWiz();
      initDrp();

    },
    error: function(err) {
      alert('err' + JSON.stringify(err))
    }
  });


});