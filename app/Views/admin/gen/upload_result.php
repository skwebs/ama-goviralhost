<!-- 
After inserting student details we upload their marks through this page.
In this we take students.stu_id primary key of students table of database. 
-->

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

   <title>Admin Page!</title>
</head>

<body>
   <div class="bg-primary text-light h1 py-3">
      <div class="container">Admin Panel</div>
   </div>
   <div style="max-width: 600px" class="mx-auto">
      <div class="container py-4">
         <div class="card">
            <div class="card-header">
               <h4 class="d-none d-md-block card-title text-muted text-center">
                  Upload Result of <span class="text-primary"><?=$stu_name.' ('.$stu_id.')';?></span>
               </h4>
               <h6 class="d-md-none card-title text-muted text-center">
                  Upload Result of <span class="text-primary"><?=$stu_name.' ('.$stu_id.')';?></span>
               </h6>
            </div>
            <div class="card-body">
               <form action="<?=site_url('admin/upload_result/'.$stu_id)?>" method="post">
                  <input type="hidden" name="session" value="2020-21" />
                  <input type="hidden" name="stu_id" value="<?=$stu_id?>" />
                  <h6 class="text-primary border-bottom border-primary">
                     Student Details
                  </h6>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="stu_class">Class</label>
                           <input required list="class-list" id="stu_class" name="stu_class" type="text"
                              class="form-control" placeholder="Class" />
                           <datalist id="class-list">
                              <option value="Play"></option>
                              <option value="LKG"></option>
                              <option value="UKG"></option>
                              <option value="Nursery"></option>
                              <option value="One"></option>
                              <option value="Two"></option>
                              <option value="Three"></option>
                           </datalist>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="stu_roll">Roll No.</label>
                           <input required id="stu_roll" name="stu_roll" type="number" min="1" class="form-control"
                              placeholder="Roll Number" />
                        </div>
                     </div>
                  </div>
                  <h6 class="text-primary border-bottom border-primary">
                     Subject Marks
                  </h6>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="english">English</label>
                           <input required id="english" name="english" type="number" min="0" max="100"
                              onkeyup="totalMarks()" placeholder="English" class="form-control" />
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="hindi">Hindi</label>
                           <input required id="hindi" name="hindi" type="number" min="0" max="100"
                              onkeyup="totalMarks()" placeholder="Hindi" class="form-control" />
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="maths">Maths</label>
                           <input required id="maths" name="maths" type="number" min="0" max="100"
                              onkeyup="totalMarks()" placeholder="Maths" class="form-control" />
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="drawing">Drawing</label>
                           <input required id="drawing" name="drawing" type="number" min="0" max="100"
                              onkeyup="totalMarks()" placeholder="Drawing" class="form-control" />
                        </div>
                     </div>
                  </div>

                  <div class="form-group mb-3">
                     <label for="total">Total</label>
                     <input required readonly id="total" name="total" type="number" class="form-control" />
                  </div>
                  <input required class="btn btn-success" type="submit" value="Upload Marks" />
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
   </script>
   <script>
   function totalMarks() {
      var eng = parseInt(document.querySelector("#english").value) || 0;
      var hin = parseInt(document.querySelector("#hindi").value) || 0;
      var maths = parseInt(document.querySelector("#maths").value) || 0;
      var draw = parseInt(document.querySelector("#drawing").value) || 0;

      document.querySelector("#total").value = eng + hin + maths + draw;
   }
   </script>
   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>