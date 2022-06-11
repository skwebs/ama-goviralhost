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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

   <title>Admin Panel!</title>
</head>

<body>
   <div class="bg-primary text-light h1 py-3">
      <div class="container">Admin Panel</div>
   </div>

   <div class="mx-auto">
      <div class="container py-4">


         <div class="card">
            <div class="card-body">
               <h2 class="text-center bg-success text-light py-2">List of deleted student(s)</h2>

               <?php if(!empty($rows)):
      ?>
               <div class="table-responsive">
                  <table class='table border table-striped'>
                     <thead>
                        <tr>
                           <th>Stu. Id</th>
                           <th>Stu. Name</th>
                           <th>Father</th>
                           <th>Mother</th>
                           <th>Gender</th>
                           <th>D.O.B.</th>
                           <th>Address</th>
                           <th>Mobile</th>
                           <th>Created_at</th>
                           <th>Updated_at</th>
                           <th>Deleted_at</th>
                           <th class="text-center" colspan="3">Action</th>
                        </tr>
                     </thead>
                     <?php
    foreach ($rows as $r) :
      ?>
                     <tr>
                        <td><?=$r["id"];?></td>
                        <td><?=$r["stu_name"];?></td>
                        <td><?=$r["father_name"];?></td>
                        <td><?=$r["mother_name"];?></td>
                        <td><?=$r["gender"];?></td>
                        <td><?=$r["dob"];?></td>
                        <td><?=$r["address"];?></td>
                        <td><?=$r["mobile"];?></td>
                        <td><?=$r["created_at"];?></td>
                        <td><?=$r["updated_at"];?></td>
                        <td><?=$r["deleted_at"];?></td>
                        <td>
                           <div class="btn-group">
                              <a title="Restore" class="btn btn-success"
                                 onclick="return confirm('Restore <?=$r["stu_name"];?> data?');"
                                 href="<?=site_url('admin/restore_stu/'.$r["id"])?>"><i class="fa fa-refresh"></i></a>
                              <a title="Delete Forever" class="btn btn-danger"
                                 onclick="return confirm('Did you confirm to delete <?=$r["stu_name"];?> forever?');"
                                 href="<?=site_url('admin/del_stu_forever/'.$r["id"])?>"><i class="fa fa-trash"></i></a>
                           </div>
                        </td>
                     </tr>
                     <?php
    
    endforeach;
  else:
    ?>
                     <div class="alert alert-warning">No deleted item found. Go to <a
                           href="<?=site_url('admin/all_stu')?>">students list.</a></div>
                     <?php
        endif;
      ?>

                  </table>
               </div>

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