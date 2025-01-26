<?php include("header.php") ; ?>
<?php include("dbcon.php") ;  ?>



    <div class="box1">

         <h2>ALL STUDENTS</h2> 
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENT</button>
    </div>
        
        <table class="table table.hover table-bordered table -striped">

          <thead>
           <tr>
           <th>ID</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Age</th>
             <th>UPDATE</th>
             <th>delete</th>

           </tr>
         </thead>
         <tbody>

         <?php
         $query=" select * from `students` ";
         $result= mysqli_query ( $connection, $query );

         if(! $result){
           die("qyuery filed". mysqli_erro());
         }else{

            while( $row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>  
                <td><?php echo $row ['id'] ;?></td>
                <td><?php echo $row ['first_name'] ;?></td>
                <td><?php echo $row ['last_name'] ;?></td>
                <td><?php echo $row ['age'] ;?></td>
                <td><a href="update_page_1_.php?id=<?php echo $row ['id'] ;?>" class="btn btn-success">UPDATE</a> </td>
                <td><a href="delete_page.php?id=<?php echo $row ['id'] ;?>" class="btn btn-danger">DELETE</a> </td>
           </tr>s
          
            <?php
            }
         }
         
         ?>
         </tbody>
        </table>
   <?php
      if(isset($_GET['message'])){
      echo "<h6>" . $_GET['message'] . "</h6>";
     }
   ?>

  <?php
    if(isset($_GET['insert_msg'])){
      echo "<h6>" . $_GET['insert_msg'] . "</h6>";    
    }
  ?>
   <?php
    if(isset($_GET['update_msg'])){
      echo "<h6>" . $_GET['update_msg'] . "</h6>";    
    }
  ?>
 <?php
    if(isset($_GET['delete_msg'])){
      echo "<h6>" . $_GET['delete_msg'] . "</h6>";    
    }
  ?>




        <form action="insert.php" method="POST">
         
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="class-group">
            <label >First Name</label>
            <input type="text" name="fname" class="form-control">
          </div>

          <div class="class-group">
            <label >Last Name</label>
            <input type="text" name="lname" class="form-control">
          </div>

          <div class="class-group">
            <label >AGE</label>
            <input type="number" name="age" class="form-control">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="add_studnets" class="btn btn-primary" value ="ADD">
      </div>
    </div>
  </div>
</div>
</form>
        

<?php include("footer.php") ; ?> 