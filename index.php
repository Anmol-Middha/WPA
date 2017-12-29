<!DOCTYPE html>
<html>
<head>
<title>Population Analyzer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/currency-autocomplete.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://d3js.org/topojson.v1.min.js"></script>
<script src="http://datamaps.github.io/scripts/datamaps.world.min.js"></script>
<script src="https://use.fontawesome.com/c97c3faabd.js"></script>
<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>

<!--displaying selected countries on table-->
<script>
function search_country(){
d3.csv("totalpopulation.csv", function(data) {
  var v=f1.search.value; 
  for(var i=0;i<data.length;i++){
  	if(data[i].Name==v){
  		document.getElementById('tablediv').style.visibility="visible";
  		document.getElementById('poptable').innerHTML+="<tr id='"+data[i].Name+"' onclick='current_country(this.id)' style='cursor:pointer'><td>" + data[i].Name + "</td><td>" + (data[i].a1961/1000000).toFixed(2) + "</td><td>" + (data[i].a2016/1000000).toFixed(2) + "</td></tr>";
    }	
  }
});

}
function current_country(curr_id){
  console.log(curr_id);
}
</script>

<!-- Search bar -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-3">
          <form name="f1" class="navbar-form" role="search">
            <div class="input-group add-on" style="width: 100%">
              <input type="text" name="search" id="search" class="form-control" placeholder="Search By Country">
                <div class="input-group-btn">
                  <button type="button" name="srchbtn" class="btn btn-primary" onclick="search_country()"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
          </form>       
        </div>
    </div>
  </div>
  
  <!-- World Map -->
  <div class="jumbotron">
    <div class="container">
    <div id="container" style="width:100% ; height:550px; border-radius: 12px"></div>
    <div class="row">
      <div class="col-xs-2">
      </div>
      <div class="col-xs-8">
        <div id="slidebar" style="width:100%;height:30px;background-color:black; opacity: 0.5; padding:5px 15px 5px 15px; border-radius: 20px;">
          <input type="range" id="YearSlider" min="1960" max="2017" value="2017">
        </div>
      </div>
      <div class="col-xs-2">
      </div>
    </div>
    </div>
  </div>

  <!-- Selected Countries Table -->
  <div class="container" id="tablediv" style="visibility: hidden">
    <div class="row">
      <div class="col-xs-12">
      	<table class="table table-hover table-responsive" id="poptable" style="width:100%;">
          <caption><center><h4>Selected Countries</h4></center></caption>
          <tr class="info">
            <th>Country</th>
            <th>1961 (in millions)</th>
            <th>2016 (in millions)</th>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <button class="btn btn-danger btn-sm"> Reset </button>
        <button class="btn btn-primary btn-sm">Compare</button>
      </div>
    </div>
  </div>



<script>
	  // Controliing the Slider
    var population;
    var slider = document.getElementById('YearSlider');
    

    slider.oninput = function() {
    var yearselected=(this.value);
    population='p' + yearselected;
    }

    // Plotting World Map
    var map = new Datamap({
      element: document.getElementById('container'),
      scope: 'world',
      responsive: true,
    // plotting data on World Map
      dataUrl: 'TotalPopulation.csv',
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

    // data to be displayed when hovered over a country on world map
        popupTemplate: function(geo, dataUrl) { 

          return '<div class="hoverinfo"><i class="fa fa-flag-checkered" aria-hidden="true" style ="color:#FC8D59"></i><strong> ' + geo.properties.name + '</strong></div>' + 
            '<div class="hoverinfo"><i class="fa fa-users" aria-hidden="true" style ="color:#FC8D59"></i><strong> ' + (dataUrl[population]/1000000).toFixed(2) + ' (millions)</strong></div> '
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
