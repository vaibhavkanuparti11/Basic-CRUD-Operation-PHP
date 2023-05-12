<?php
include 'dbconnection.php';
include 'includes/header.php';
session_start();
?>
<div class="container mt-3">  
  <form action="crud/insert.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" name="email">
        </div> 
        <div class="mb-3 mt-3">
            <label for="descp">Descp:</label>
            <textarea class="form-control" id="descp" name="descp" rows="15"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="descp">Category:</label>
            <select class="form-select" id="category" name="category">
                    <?php
                    $sql=$conn->query("SELECT * FROM category");
                    while($row=mysqli_fetch_array($sql)){
                        ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option> 
                                <?php } ?>                             
            </select>
        </div>    
               <div class="mb-3 mt-3">
                    <label for="descp">Tags:</label>
                    <div class="form-check">                   
                        <?php          
                            $sql=$conn->query("SELECT * FROM tags");
                            while($row=mysqli_fetch_array($sql)){
                        ?>
                        <input type="checkbox" class="form-check-input" id="tags" name="tags[]" value="<?php echo $row['id'];?>" /><?php echo $row['name'];?><br>
                        <?php } ?>               
                     </div>           
                </div>
                <div class="mb-3 mt-3">
                    <label for="descp">Publish:</label><br>
                        <input class="form-check-input" type="radio" id="publish" name="publish" value="publish">
                        <!-- <input type="radio" name="sex" value="Male"/>Male</td> -->
                            <label class="form-check-label" for="flexRadioDefault1">
                               Publish
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="publish" name="publish" value="schedule" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Schedule
                            </label>
                </div> 
        <div class="mb-3 mt-3">
            <label for="date" class="col-1 col-form-label">Date</label>
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" id="date" name="date" class="date" autocomplete="off"/>
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
        </div>
    <input type="hidden" name="module" value="insert">
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
    <script>
    let table = new DataTable('#myTable');
    </script>