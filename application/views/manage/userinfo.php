<div id="content" class='container_12 rmonitor'>
  	
	<div id="title">
        <div class="grid_6" id="title-header">User List</div>
        <div class="rightgrid"><a class="btn btn-success" href="<?php echo site_url("manage/adduser")?>">Add a new</a></div>
        <ul class="" id="title-menu-holder"></ul>
    </div>

<div id="sensors" class='boxit'>
	
	<table class='default' border="0" cellspacing="0" cellpadding="0">
		<tr>		
			<th>ID</th>
			<th>Name</th>
			<th>Group</th>
			<th>Email</th>
			<th>Grant</th>			
			<th class="admin-sensor-actions"></th>
		</tr>
		<tbody class='sensors'>
        
        <?php
              foreach($users as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['group'].'</td>';
                echo '<td>'.$row['email_address'].'</td>';
                echo '<td class="grant"><a href="#" title="'.$row['grant'].'">'.$row['grant'].'</td>';                
                echo '<td class="crud-actions">
                  <a href="'.site_url("manage").'/edit/'.$row['id'].'" class="btn btn-info">view & edit</a>                 
                  <a href="javascript:void(0);" class="btn btn-danger" onclick="showdeluser('.$row["id"].');">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>
		</tbody>
	</table>
	
   </div> 
</div>

<div class="modal hide" id="deluserdiv">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>delete user</h3>
  </div>
  <div class="modal-body">
    Are you sure delete this user?
  </div>
  <div class="modal-footer">    
    <a href="#" id="deluser" class="btn btn-danger">delete</a>
    <a href="#" class="btn" data-dismiss="modal">close</a>
  </div>
</div> 
 
<script>
function showdeluser(id){
     $('#deluserdiv').modal({
         backdrop:true
      });
    url="<?php site_url("manage")?>"+"delete/"+id;
    $("#deluser").attr("href",url);  
    
}

$(".grant").each(function(){
  if($(this).text().length>=50)
    {
      $(this).html("<a href='#' title='"+$(this).text()+"'>"+$(this).text().substr(0,50)+"...</a>");  
    }
});
</script>