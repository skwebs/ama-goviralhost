
"use strict";

function isValid(formElem) {
   if (formElem.checkValidity() === true) {
      formElem.classList.remove("is-invalid");
      formElem.classList.add("is-valid");
      return true;
   } else {
      formElem.classList.remove("is-valid");
      formElem.classList.add("is-invalid");
      return false;
   }
}

$(function() {
   
   $(document).on("click", "#submit-cForm", function(e) {
      e.preventDefault();
     // var $preloader = $('.preloader');
    	var cForm = document.querySelector("#contact-form");
        var fd = new FormData(cForm);
        // alert(cForm.getAttribute("action"));
      $.ajax({
        // url: $(this).attr("action"),
         //url: "http://localhost:8080/ci4amaW/public/forms/submitAjax", //$(this).attr("action"),
         url : cForm.getAttribute("action"),
         type: "post",
         data: fd,
         processData: false,
         contentType: false,
         dataType : "JSON",
         success: function(res) {
         if(res.success){
         alert(res.message);
         }else{
         alert(res.message);
         }
         alert("s\n"+JSON.stringify(res));
         },
         error: function(err) {
         alert("e\n"+JSON.stringify(err));
         },
      });
   });

});