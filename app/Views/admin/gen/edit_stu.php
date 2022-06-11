<!-- 
Through this page 
We add student details in database and then go next page to upload student marks in database. 
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

   <title>Admin Panel!</title>
</head>

<body>
   <div class="bg-primary text-light h1 py-3">
      <div class="container">Admin Panel</div>
   </div>

   <div style="max-width: 600px" class="mx-auto">
      <div class="container py-4">


         <div class="card">
            <div class="card-body">
               <h2 class="text-center bg-success text-light py-2 mb-4">Edit Student</h2>
               <?php if(!empty($rows)):
      
    foreach ($rows as $r) :
      ?>
               <form action="<?=site_url('admin/edit_stu/'.$r["id"]);?>" method="post">
                  <div class="form-group mb-3">
                     <label for="stu_name">Student Name</label>
                     <input id="stu_name" name="stu_name" type="text" class="form-control" value="<?=$r["stu_name"]?>"
                        required />
                  </div>
                  <div class="form-group mb-3">
                     <label for="mother_name">Mother's Name</label>
                     <input id="mother_name" name="mother_name" type="text" class="form-control"
                        value="<?=$r["mother_name"]?>" required />
                  </div>
                  <div class="form-group mb-3">
                     <label for="father_name">Father's Name</label>
                     <input id="father_name" name="father_name" type="text" class="form-control"
                        value="<?=$r["father_name"]?>" required />
                  </div>
                  <div class="form-group mb-3">
                     <label for="gender">Gender</label>
                     <input id="gender" list="gender-list" name="gender" type="text" class="form-control" maxlength="1"
                        value="<?=$r["gender"]?>" required />
                     <datalist id="gender-list">
                        <option value="M"></option>
                        <option value="F"></option>
                     </datalist>
                  </div>
                  <div class="form-group mb-3">
                     <label for="dob">Date of Birth</label>
                     <input id="dob" name="dob" type="date" class="form-control" value="<?=$r["dob"]?>" required />
                  </div>
                  <div class="form-group mb-3">
                     <label for="mobile">Mobile Number</label>
                     <input id="mobile" name="mobile" type="tel" class="form-control" maxlength="10"
                        value="<?=$r["mobile"]?>" required />
                  </div>
                  <div class="form-group mb-3">
                     <label for="address">Address</label>
                     <input id="address" name="address" type="text" class="form-control" value="<?=$r["address"]?>"
                        required />
                  </div>
                  <input class="btn btn-success" type="submit" value="Update" />
               </form>

               <?php 
      
    endforeach;
  endif;
      ?>
            </div>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
   </script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>