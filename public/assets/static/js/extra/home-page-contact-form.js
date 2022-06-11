/*
|==================================================
| Index of combined js files
|==================================================
| *
|==================================================
*/





"use strict";

function isValid(formElem) {
   if (formElem.checkValidity() === true) {
      formElem.classList.remove("is-invalid");
      formElem.classList.add("is-valid");
      return true;
   } else {
      formElem.classList.remove("is-valid");
      formElem.classList.add("is-invalid");
      //formElem.insertAdjacentHTML('afterend', '<div class="invalid-feedback" >'+formElem.validationMessage+'</div>');
      return false;
   }
}

/*
|==================================================
| JQUERY DEPENDED
|==================================================
*/
$(function() {
   /*
    |==================================================
    | * slideMenu.js
    |==================================================
    */

   $(document).on("click", "#submit-cForm", function(e) {
      e.preventDefault();
      var cForm = document.querySelector("#contact-form");
      var fields = cForm.querySelectorAll(".form-control");
      for (var i = 0; i < fields.length; i++) {
         if (!fields[i].checkValidity()) {
            fields[i].focus();
            //notify(fields[i].validationMessage,{ className: 'error',autoHideDelay: 2000,position:"top" });
            //toastr.error(fields[i].validationMessage);
            return false;
         }
      }
      var $preloader = $('.preloader');
      var fd = new FormData(cForm);

      $.ajax({
         url : cForm.getAttribute("action"),
         method: "post",
         data: fd,
         processData: false,
         contentType: false,
         dataType : "JSON",
        /* 
         method: "post",
         data: fd,
         processData: false,
         contentType: false,*/
         catche: false,
         //dataType: "json",
         beforeSend: function() {
            $preloader.fadeIn();
         },
         success: function(res) {
            $preloader.fadeOut();
            if (res.success) {
               toastr.success(res.message);
              // toastr.error(fields[i].validationMessage);
            cForm.reset();
            $(".form-control").removeClass("is-valid");
            } else {
               toastr.error(res.message);
            //toastr.error();
            }
         },
         error: function(err) {
            alert(JSON.stringify(err));
            $preloader.fadeOut();
         }
      });

   });




});