<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          table{
            border: 1px solid black;
            margin-top:10px;
        }
        th,tr,td{
            padding:3px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php
$sunucu = "localhost";
$kullanici = "root";
$sifre = "";
try {
  $conn = new PDO("mysql:host=$sunucu;dbname=tbk", $kullanici, $sifre);
  // Hata Yakalama
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $conn ->query("SET CHARACTER SET utf8");
} catch(PDOException $e) {
  echo "Bağlantı Hatası: " . $e->getMessage();
} 
?>
<?php
if($_POST){ 
    try { 
        $kelime = $_POST['query'];  
        $query = $conn->prepare('SELECT * FROM tbk_kelimeler WHERE Word LIKE ?');
        $query->execute(array('%'.$kelime.'%'));
        $sonuc = $query -> rowCount();
        echo "<p align = 'center'> $sonuc  kelime bulundu.</p>";
        
        echo "<table align = 'center'>"; 
        echo "<tr>";
        echo "<th>Türkçe</th>";     
        echo "<th>İngilizce</th>";     
        echo "</tr>";     
        while ($results = $query->fetch())
        {
            echo "<tr>";
            echo "<td>". preg_replace("/\b(" . $kelime . ")\b/i", "<b style='color: red;'>$kelime</b>",$results["Word"]) ."</td>";
            echo "<td>". $results["Meaning"] ."</td>";
            echo "</tr>";
           
        } 
    } catch (PDOException $e) { 
        die($e->getMessage());
    }
        echo "</table>";

}
?>
</body>
</html>
