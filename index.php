<!DOCTYPE html>
<html>
<head>
<title>Population Analyzer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/currency-autocomplete.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://d3js.org/topojson.v1.min.js"></script>
<script src="http://datamaps.github.io/scripts/datamaps.world.min.js"></script>
<script src="https://use.fontawesome.com/c97c3faabd.js"></script>
<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
<script>
    
function search_country(){
  var name=document.f1.search.value;
  document.getElementById('poptable').style.visibility="visible";
  var result = $.csv.toArrays();
}
</script>
  <div class="container">
    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-3">
          <form name="f1" class="navbar-form" role="search">
            <div class="input-group add-on">
              <input type="text" name="search" id="search" class="form-control" placeholder="Search By Country">
                <div class="input-group-btn">
                  <button type="button" name="srchbtn" class="btn btn-primary" onclick="search_country()"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
          </form>       
        </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div id="container" style="width:100% ; height:600px;"></div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <table class="table" id="poptable" style="width:100%; visibility:hidden;">
          <tr>
            <th>Country</th>
            <th>2016 Population (in millions)</th>
          </tr>
        </table> 
      </div>
    </div>
  </div>




<script>

    var map = new Datamap({
      element: document.getElementById('container'),
      scope: 'world',

    
      dataUrl: 'worldpopulation.csv',
      dataType: 'csv',
      data:{},

      fills: {
          defaultFill: 'blue'
      },

      geographyConfig: {
        hideAntarctica: true,
        hideHawaiiAndAlaska : false,
        borderWidth: 1,
        borderOpacity: 1,

      
        popupTemplate: function(geo, dataUrl) { 

          return '<div class="hoverinfo"><i class="fa fa-flag-checkered" aria-hidden="true" style ="color:#FC8D59"></i><strong> ' + geo.properties.name + '</strong></div>' + 
            '<div class="hoverinfo"><i class="fa fa-users" aria-hidden="true" style ="color:#FC8D59"></i><strong> ' + ((dataUrl.abc)/1000000).toFixed(2) + ' (millions)</strong></div>';
        },

        
        popupOnHover: true,
        highlightOnHover: true,
        highlightFillColor: '#FC8D59',
        highlightBorderColor: 'rgba(250, 15, 160, 0.2)',
        highlightBorderWidth: 2,
        highlightBorderOpacity: 1,
    
    }
    });  



</script>
</body>
</html>
