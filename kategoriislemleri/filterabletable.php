<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Kategori Tablo</h2>
  <p>Kategorileri aramak için giriş alanına bir şeyler yazın:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search.." name="query">
  <br>
  <table class="table table-bordered table-striped"  id="deneme">
    <thead>
      <tr>
        <th>Category Name</th>
      </tr>
    </thead>
    <tbody id="myTable">
    
          <?php
    echo "<tr>";
    include './Models/dbKategori.php';
    $query="";
    $result=selectSearchCategory($query);
    for($i=0;$i<count($result);$i++){
    $kategori_ad=$result[$i]["kategori_ad"];
    echo '<td>'.$kategori_ad.'</td>'; 
    echo "</tr>";
   }
   ?>
 
    </tbody>
  </table>
  
 
</div>


<script>
  var x = document.getElementById("deneme");
  x.style.display = "none";
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
   x.style.display = "block";   
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>


