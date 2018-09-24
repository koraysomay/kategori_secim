<div>
<form action="http://localhost/Calismalar/kategoriislemleri/index.php" method="post">
 Yeni Kategori: <br/>
 <input type="text" name="categoryname"/><br/>
 <br/>
 
<input type="submit" value="Kategori Kaydet" name="categorysubmit" />
</form>
</div>

<div>
  <br/>   
 <form action="http://localhost/Calismalar/kategoriislemleri/index.php" method="GET">
     Kategori Kontrol: <br/>
      <input type="text" placeholder="Search.." name="search"><br/>
        <br/>   
      <button type="submit">Ara</button>
    </form>
</div>

<?php
include './Models/dbKategori.php';
if(isset($_GET["search"])){
    $query=$_GET["search"];
    $result=selectSearchCategory($query);
    for($i=0;$i<count($result);$i++){
    $kategori_ad=$result[$i]["kategori_ad"];
    echo '<p>'.$kategori_ad.'</p>'; 
   }
   }
 
if(isset($_POST["categorysubmit"])){
    $kategori_ad=$_POST["categoryname"];
    $result=insertCategory($kategori_ad);
   }
   
   

?>