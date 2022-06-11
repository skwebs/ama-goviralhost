"use strict";
function initRegScript(){
$("#regForm").on("submit", (e) => {
alert("submit");
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
          alert(res.regNum);
          action('reg-success', { regNum: res.regNum });

        } else {

          //alert(JSON.stringify(res))
          alert('suc: ' + res);
        }
      },
      error: function(err) {
        $('.preloader').delay().fadeOut();

        alert('err: ' + JSON.stringify(err))
      }
    });
  });
  }