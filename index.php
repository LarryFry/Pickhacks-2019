<!DOCTYPE html>
<html>
  <head>
    <title>Protein Pal</title>
    <meta charset="UTF-8">

    <!-- Title Bar Image-->
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


    <!--Stylesheet-->
    <link rel="stylesheet" href="CSS/index.css">
	  <!-- carousel library 0-->
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	  <link rel="stylesheet" type="text/css" href="CSS/slick/slick/slick.css"/>

  </head>

  <body>
  	<div id="blackwrapper">
  	  <header>
  		    <h1 id="Title">Protein Pal</h1>
  	  </header>

  	   <div id="maindiv">
    		<form autocomplete = "off">
    		  <input id="searchBox" type="text" name="search" placeholder="e.g. Spaghetti and Meatballs">

    		  <div id="boxAndDropdown">
            <!--Dropdown-->
      			<div class="Adv-Opt">
      			  <select class="diet">
      				<option value="High-Protein">High-Protein</option>
      				<option value="Balanced">Balanced</option>
      				<option value="Low-Carb">Low-Carb</option>
      				<option value="Low-Fat">Low-Fat</option>
      			  </select>
      			</div>

            <!-- Search Button -->
    			  <input id="searchBtn" type="button" value="Enter">

    		  </div> <!--boxAndDropdown -->
    		</form>








<!-- HARDCODED SLICK CAROUSEL -->
        <section class="vertical-center slider">
          <div>
            <img src="http://placehold.it/350x100?text=1">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=2">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=3">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=4">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=5">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=6">
          </div>

          <div>
            <img src="http://placehold.it/350x100?text=7">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=8">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=9">
          </div>
          <div>
            <img src="http://placehold.it/350x100?text=10">
          </div>
        </section>














  		<!-- OUTPUT -->
  		  <div class="output">
  		  </div>

	  </div>
  </div>

  <!--Nutrition Box in-->
<section class="performance-facts">
  <header class="performance-facts__header">
    <h1 class="performance-facts__title">Nutrition Facts</h1>
    <p id="ServingSize">Serving Size 1/2 cup (about 82g)</p>
  </header>
  <table class="performance-facts__table">
    <thead>
      <tr>
        <th colspan="3" class="small-info">
          Amount Per Serving
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th colspan="2" id="calories">
          <b>Calories</b>
          5
        </th>
      </tr>
      <tr class="thick-row">
        <td colspan="3" class="small-info">
          <b>% Daily Value*</b>
        </td>
      </tr>
      <tr>
        <th colspan="2" id="totalFat">
          <b>Total Fat</b>
          14g
        </th>
        <td>
          <b id="totalFatPercent">22%</b>
        </td>
      </tr>
      <tr>
        <td class="blank-cell">
        </td>
        <th id="saturatedFat">
          Saturated Fat
          9g
        </th>
        <td>
          <b id="saturatedFatPercent">22%</b>
        </td>
      </tr>
      <tr>
        <td class="blank-cell">
        </td>
      </tr>
      <tr>
        <th colspan="2" id="cholesterol">
          <b>Cholesterol</b>
          55mg
        </th>
        <td>
          <b id="cholesterolPercent">18%</b>
        </td>
      </tr>
      <tr>
        <th colspan="2" id="sodium">
          <b>Sodium</b>
          40mg
        </th>
        <td>
          <b id="sodiumPercent">2%</b>
        </td>
      </tr>
      <tr>
        <th colspan="2" id="totalCarbs">
          <b>Total Carbohydrate</b>
          17g
        </th>
        <td>
          <b id="totalCarbsPercent">6%</b>
        </td>
      </tr>
      <tr>
        <td class="blank-cell">
        </td>
        <th id="fiber">
          Dietary Fiber
          1g
        </th>
        <td>
          <b id="fiberPercent">4%</b>
        </td>
      </tr>
      <tr>
        <td class="blank-cell">
        </td>
        <th id="sugar">
          Sugars
          14g
        </th>
        <td>
        </td>
      </tr>
      <tr class="thick-end">
        <th colspan="2" id="protein">
          <b>Protein</b>
          3g
        </th>
        <td>
        </td>
      </tr>
    </tbody>
  </table>
  
  
  <p class="small-info">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs:</p>
  
  <table class="performance-facts__table--small small-info">
    <thead>
      <tr>
        <td colspan="2"></td>
        <th>Calories:</th>
        <th>2,000</th>
        <th>2,500</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th colspan="2">Total Fat</th>
        <td>Less than</td>
        <td>65g</td>
        <td>80g</td>
      </tr>
      <tr>
        <td class="blank-cell"></td>
        <th>Saturated Fat</th>
        <td>Less than</td>
        <td>20g</td>
        <td>25g</td>
      </tr>
      <tr>
        <th colspan="2">Cholesterol</th>
        <td>Less than</td>
        <td>300mg</td>
        <td>300 mg</td>
      </tr>
      <tr>
        <th colspan="2">Sodium</th>
        <td>Less than</td>
        <td>2,400mg</td>
        <td>2,400mg</td>
      </tr>
      <tr>
        <th colspan="3">Total Carbohydrate</th>
        <td>300g</td>
        <td>375g</td>
      </tr>
      <tr>
        <td class="blank-cell"></td>
        <th colspan="2">Dietary Fiber</th>
        <td>25g</td>
        <td>30g</td>
      </tr>
    </tbody>
  </table>
  
  <p class="small-info">
    Calories per gram:
  </p>
  <p class="small-info text-center">
    Fat 9
    &bull;
    Carbohydrate 4
    &bull;
    Protein 4
  </p>
  
</section>
      </div><!--maindiv -->
  	</div><!-- blackwrapper -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="SCRIPTS/slick.js" type="text/javascript" charset="utf-8"></script>
    <!--  Custom Logic Script-->
    <script src="SCRIPTS/main.js"></script>
  </body>
</html>
