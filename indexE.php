<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>TBK</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    #dil{
      border-radius: 50%;
    }
    .images{
         position: absolute;
         right:200px;
         padding: 0px 0;
    }
  #tbk{
      position:absolute;
      left:30px;
      top:10px;
  }
  </style>
</head>
  <body>
    <img src="./tbkdernek.png" id="tbk" height="100px" width="100px">
   <div class="container" style="margin-top: 50px;">
      <h2 style="text-align: center;"><b>TBD Bilişim Sözlüğü </b></h2><br>
      <p align="center">İngilizce-Türkçe</p>

      <div class="images">
        <a href="./indexE.php"><img src="./ingiliz.png" id="dil" height="50px" width="50px"/></a>
        <a href="./indexT.php"><img src="./türk.png" id="dil" height="50px" width="50px"/></a>
      </div>
      
        <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-8 form-group">
              <input  type="text" id="search" name="search" class="form-control" autocomplete="off" placeholder="Aramak istediğiniz kelimeyi giriniz."><br>
            </div>
          <div class="col-md-2"></div>
        </div>
      <div class="result">
      </div>
    </div>
  </body>
</html>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!---jQuery ajax live search --->
<script type="text/javascript">
    $(document).ready(function(){
        // veritabanına istek atma
        loadData();
        function loadData(query){
          $.ajax({
            url : "postE.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $(".result").html(response);
            }
          });  
        }
        // gelen sonuçları listeleme
        $("#search").keyup(function(){
          var search = $(this).val();
          if (search !="") {
            loadData(search);
          }else{
            loadData();
          }
        });
    });
</script>