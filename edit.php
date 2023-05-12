<?php
include 'dbconnection.php';
include 'includes/header.php';
session_start();
?>
<div class="container mt-3">  
  <form action="crud/update.php" method="post" enctype="multipart/form-data">
  <?php
            $sql=$conn->query("SELECT * FROM user WHERE id=".$_GET['id']);
            // $id=$_GET['id'];
            //     $sql=mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
                $row=$sql ->fetch_assoc();   
                //print_r($row);
                ?>  
        <div class="mb-3 mt-3">
            <label for="email">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php echo $row['title']?>">
        </div> 
        <div class="mb-3 mt-3">
            <label for="descp">Descp:</label>
            <textarea class="form-control" id="descp" name="descp" rows="15"><?php echo $row['descp']?></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="descp">Category:</label>
            <select class="form-select" id="category" name="category">
              <?php
                $csql=$conn->query("SELECT * FROM category");
                while($crow=$csql ->fetch_assoc()){
              ?>
                <option value="<?php echo $crow['id'];?>" <?php echo ($row['category']=$crow['id']) ? "selected":"";?>><?php echo $crow['name']; ?></option> 
              <?php } ?>                             
            </select>
        </div>    
               <div class="mb-3 mt-3">
                    <label for="descp">Tags:</label>
                    <div class="form-check">
                        <?php
                          $sql_tag=$conn->query("SELECT * FROM tags");
                          while($row_tag=$sql_tag ->fetch_assoc()){
                        ?>
                          <input type="checkbox" class="form-check-input" id="tags" name="tags[]" value="<?php echo $row_tag['id'];?>" <?php echo (in_array($row_tag['id'], explode(',',$row['tags']))) ? "checked":"";?>><?php echo $row_tag['name'];?><br>
                        <?php } ?>               
                     </div>           
                </div>
                <div class="mb-3 mt-3">
                    <label for="descp">Publish:</label><br>
                        <input class="form-check-input" type="radio" id="publish" name="publish" value="publish" <?php echo ($row['publish']=='publish') ? 'checked':"";?>>
                       
                            <label class="form-check-label" for="flexRadioDefault1">
                               Publish
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="publish" name="publish" value="schedule" <?php echo ($row['publish']=='schedule') ? 'checked':"";?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Schedule
                            </label>
                </div> 
        <div class="mb-3 mt-3">
            <label for="date" class="col-1 col-form-label">Date</label>
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" id="date" name="date" class="date" autocomplete="off" value="<?php echo $row['date']?>"/>
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </span>
                </div>
        </div>
        <div class="mb-3 mt-3">
                <label for="email">Image:</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Category Slug" >
                <?php echo $row['image']?>
        </div>
        <input type="hidden" name="module" value="edit">
            <input type="hidden" name="id" value="<?= $row['id'];?>">       
            <input type="hidden" name="old_image" value="<?= $row['image'];?>">
            <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap- 
datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512- 
GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFai
oypzbDOQykoRg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php include 'includes/footer.php';?>
<script>
    ClassicEditor.create(
        document.querySelector('#descp')
    ).then(editor => {
        console.log(editor);
    }).catch(error => {
        console.error(error);
    });
    </script>
     <script type="text/javascript">    
        $('#date').datepicker({    
           format: 'dd/mm/yyyy'  
         });    
    </script>  