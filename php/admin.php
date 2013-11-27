<script src="js/jquery-1.10.1.min.js"></script> 
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script src="js/CreateTable.js"></script> 
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">


<input type="Button" value="add foto's to the video's to create a thumbnail" onclick="CreateTable()"> 



<table id="example" hidden="true">
  <thead>
    <tr>
        <th class="site_name">Name</th>
        <th>date </th>
        <th>videosource</th>
        <th>thumbnailsource</th>
        <th>tags</th>
        <th>setting</th>
        <th>characters</th>
        <th>year</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<br />

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 
<input type="Submit" name="copyfiles" value="upload everything new to the webserver" onclick="viewUpload()"> 
</form>

<script>
function viewUpload(){
window.open("http://localhost/Tutweb/php/fileupload.php","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
}

</script>


<?php


?>
