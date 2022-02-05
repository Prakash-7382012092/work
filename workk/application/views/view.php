<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Welcome</h1>
    <form method="post" id="" action="<?php echo base_url()?>User/insert">
       <label> Body:</label><input type="text" name="name"  id="name" placeholder="Enter your Username"/><br><br>
          <?php echo form_error('name');?>
        <label>Title:</label><br><textarea name="title" id="title" row="3" column="30"  placeholder="Enter your Title"></textarea><br>
        <?php echo form_error('title');?>
        <input type="submit"  id="submit" name="submit" value="Submit"/>
</form>
<input type="submit" name="view" id="view" value="View"/>
<input type="submit" name="disp" id="disp" value="display database data"/>
<div id="res"></div>
<div id="da"></div>
<script>
  $(document).ready(function(){
   $(document).on("click","#view",function(){
      function fetch_data(){
                $.ajax({
                url:"<?php echo base_url();?>User/fetch",
                method:"POST",
                data:{data_action:"fetch_all"},
                success:function(data){
                    $('#res').html(data);
                }
                });
            }
            fetch_data();
        })
    })

$(document).on("click","#disp",function(){
    $.ajax({
        url:"<?php echo base_url();?>User/view",
        method:"POST",
        
        success:function(data){
            console.log(data);
            
            $('#da').html(data);
        }
    });
})
</script>
</body>
</html>