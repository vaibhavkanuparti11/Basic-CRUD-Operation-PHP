<?php
  include 'dbconnection.php';
  include 'includes/header.php';
  session_start();
?>
<div class="container mt-3">   
    <a href="add.php" class="btn btn-success btn-sm">Add New</a>
    <!-- <a href="category_add.php" class="btn btn-success btn-sm">Add Category</a>
    <a href="tags_add.php" class="btn btn-success btn-sm">Add Tags</a>
    <a href="sports_add.php" class="btn btn-success btn-sm">Add Sports</a> -->
</div>
<div class="container mt-3"> 
<?php
            if(isset($_SESSION['status']))
            {
            ?>
        <div class="alert alert-success" role="alert">
            <?php  echo $_SESSION['status']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <?php
                unset($_SESSION['status']);
            }?>
    <?php   
    if(isset($_SESSION['message']))
    {
    ?>
        <div class="alert alert-success" role="alert">
    <?php  echo $_SESSION['message']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        </div>
    <?php
        unset($_SESSION['message']);
    }?>     
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>category</th>
        <th>Tags</th>
        <th>Image</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php    
        $i=1;
        $sql=$conn->query("SELECT user.*,category.name as cname FROM user LEFT JOIN category ON user.category=category.id");
        while($row=mysqli_fetch_array($sql)){
      ?>                
        <tr>
          <td><?= $i++?></td>
          <td><?= $row['title'];?></td>
          <td><?= $row['cname'];?></td>
          <td>
            <?php
              $tags = explode(',',$row['tags']); $a=1;
              foreach($tags as $tag){
                $tsql=$conn->query("SELECT name FROM tags WHERE id=".$tag);
                $trow=mysqli_fetch_array($tsql);
                echo $trow['name'].($a<count($tags) ? ', ': '');
                $a++;         
              }               
            ?>
          </td>
          <td><img src="img/<?= $row['image']?>" width="40" height="40"></td>
          <td><?= date('j\<\s\u\p\>S\<\/\s\u\p\> M Y',strtotime($row['timestamp']));?></td>        
          <td>
              <a href="edit.php?id=<?= $row['id']?>" class="btn btn-success btn-sm">Edit</a>
              <a href="crud/delete.php?module=user&id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure');">Delete</a>
          </td>
        </tr>
      <?php }?>  
    </tbody>
  </table>
</div>
