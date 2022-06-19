<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>API</title>
    <style>
      *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      .newPolyId{
        border :3px solid rgb(10,10,47);
        padding: 34px 19px;
        margin: 14px 480px;
        border-radius: 23px;
        width: 533px;
        align-items: center;
        display: inline-block;

      }
      .formcontainer{
        margin: 14px 19px;
      }
      .container{
        border :3px solid rgb(10,10,47);
        padding: 34px 19px;
        margin: 14px 19px;
        border-radius: 23px;
        width: 533px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
    <!-- As a link -->
        <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">API Call Assignment</a>
        </nav>
    
    <div class="formcontainer">
      <textarea id="newPolyId" class="newPolyId" name="newPolyId" rows="17" cols="50"></textarea>
      <button class="btn btn-sm btn-primary" name="postData" id="postData" onclick="postDataAPI()">Post Data</button>
      <input type="text" id="polyid" name="polyid" placeholder="Enter poly id" size="25">
      <button class="btn btn-sm btn-primary" name="getData" id="getData" onclick="getDataAPI()">Get Data</button>
    </div>
    
    <!-- Get Soil -->
    <div class="container">
    <form>
      <h2>Soil Data</h2>
      <div class="form-group">
        <label for="dt">dt</label>
        <input type="text" class="form-control" id="dt" name="dt">
      </div>
      <div class="form-group">
        <label for="dt">moisture</label>
        <input type="text" class="form-control" id="moisture" name="moisture">
      </div>
      <div class="form-group">
        <label for="dt">t0</label>
        <input type="text" class="form-control" id="t0" name="t0">
      </div>
      <div class="form-group">
        <label for="dt">t10</label>
        <input type="text" class="form-control" id="t10" name="t10">
      </div>
    </form>

    </div>


    <!-- Get Weather -->
    <div class="container">
      <form>
        <h2>Weather Data</h2>
        <div class="form-group">
          <label for="dt">id</label>
          <input type="text" class="form-control" id="idweather" name="idweather">
        </div>
        <div class="form-group">
          <label for="dt">icon</label>
          <input type="text" class="form-control" id="icon" name="icon">
        </div>
        <div class="form-group">
          <label for="dt">description</label>
          <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
          <label for="dt">main</label>
          <input type="text" class="form-control" id="main" name="main">
        </div>
      </form>
    </div>

    <!-- Get uvi -->
    <div class="container">
      <form>
        <h2>uvi Data</h2>
        <div class="form-group">
          <label for="dtuvi">dt</label>
          <input type="text" class="form-control" id="dtuvi" name="dtuvi">
        </div>
        <div class="form-group">
          <label for="uvi">uvi</label>
          <input type="text" class="form-control" id="uvi" name="uvi">
        </div>
      </form>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
      function postDataAPI(){
        var st = document.getElementById('newPolyId')
        var raw = st.value
        var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
      };

      fetch("http://api.mapmycrop.com/polygon", requestOptions).then((response)=>{
        return response.json();
      }).then((data)=>{
        console.log(data);
        idValue = data.id;
        polyid.value = idValue;
      })
      }
      
      </script>

      <script>
      // GET DATA function
      function getDataAPI() {
        var idValue = document.getElementById('polyid').value;
          url = "http://api.mapmycrop.com/soil?polyid="+idValue;

          fetch(url).then((response)=>{
              return response.json();
          }).then((data)=>{
              dtValue = data.dt;
              moistureValue = data.moisture;
              t0Value = data.t0;
              t10Value = data.t10;
              // assign the value to html field
              dt.value = dtValue;
              moisture.value = moistureValue;
              t0.value = t0Value;
              t10.value = t10Value;
          })

          url = "http://api.mapmycrop.com/weather?polyid="+idValue;

          fetch(url).then((response)=>{
              return response.json();
          }).then((data)=>{
              descriptionValue = data.weather[0].description;
              idValue = data.weather[0].id;
              iconValue = data.weather[0].icon;
              mainValue = data.weather[0].main;
              // assign the value to html field
              description.value = descriptionValue;
              idweather.value = idValue;
              icon.value = iconValue;
              main.value = mainValue;

          })

          url = "http://api.mapmycrop.com/uvi?polyid="+idValue;

          fetch(url).then((response)=>{
              return response.json();
          }).then((dataUVI)=>{
              dtuviValue = dataUVI.dt;
              uviValue = dataUVI.uvi;
              // assign the value to html field
              dtuvi.value = dtuviValue;
              uvi.value = uviValue;
          })
          
      }
    // getData.addEventListener('click',getDataAPI)
    </script>
    <!-- <script src="api.js"></script> -->
  </body>
</html>