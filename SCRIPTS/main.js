// Gloval Variables
var appID = "4052db9a"; // edamamAPI application ID
var appKey = "4a96e69729ab34fad8cf058ecddf5d4a"; // edamamAPI application key
var searchParam = ""; // the search param to use for the api query
var excluded = ""; // ingredient to exclude from results (for future functionality)
var diet = ""; // diet selector
var from = 0; // index of the first result to return from the API
var to = 5; // index of the last result to return from the API
var space = "%20"; // use this instead of spaces between words
var regEx = /[^a-zA-Z\s]/gi; //only letters and spaces
var recipes = []; // holds an array of 'Recipe' objects that we fetched from the API

// Constructor for individiual recipe objects created by the JSON import
function Recipe(label, ingredients, image, url) {
  this.label = label;
  this.ingredients = ingredients;
  this.image = image;
  this.url = url;
}

// iterate over the ingredients list and creates an unordered list of ingredients
Recipe.prototype.listIngredients = function() {
  var ingList = $("<ul>");
  for (var i = 0; i < this.ingredients.length; i++) {
    var currentRecipe = this.label;
    var currentIngredient = this.ingredients[i].text;
    var ing = $("<li>")
    .append(
    $("<a>")
      .attr({href:"javascript:void(0)", onclick: 'nutritionixSearch($(this).text())'})
      .text(this.ingredients[i].text));
    ingList.append(ing);
  }
  return ingList;
};

// builds the card items and appends them to the page
Recipe.prototype.showRecipe = function() {
  var link = $("<a>").attr({
    href: this.url,
    target: "_blank"
  });

  var ingredientDropdown = $("<div>")
    .addClass("dropdown is-up")
    .append([
      $("<div>")
        .addClass("dropdown-trigger")
        .append(
          $("<h2>").addClass("ing-text")
            .append([
              $("<span>")
                .addClass("icon is-small")
                .append(
                  $("<i>")
                    .addClass("fas fa-utensils")
                    .attr("aria-hidden", true)
                ),
              $("<span>").text("Ingredient List")
            ])
        ),
      $("<div>")
        .addClass("dropdown-menu")
        .attr({
          id: "dropdown-menu2",
          role: "menu"
        })
        .append(
          $("<div>")
            .addClass("dropdown-content")
            .append(
              $("<div>")
                .addClass("dropdown-item has-text-left")
                .append(this.listIngredients())
            )
        )
    ]);

  var card = $("<div>")
    .addClass("cardContainer")
    .append(
      $("<div>")
        .addClass("card")
        .append(
          link.append([
            $("<div>")
              .addClass("card-image")
              .append(
                $("<figure>")
                  .addClass("image is-square")
                  .append($("<img>").attr("src", this.image))
              ),
            $("<div>")
              .addClass("card-content card-header")
              .append(
                $("<h1>")
                  .addClass("recipe-name")
                  .text(this.label)
              )
          ])
        )
        .append(
          $("<p>")
            .addClass("ingredients")
            .append(ingredientDropdown)
        )
    );
  $("#output").append(card);
$('.vertical-center').slick('unslick');
showButton();
sliderInit();

  };

  function showButton(){
    document.getElementById("favorite").style.display='block';
  }

// replaces the spaces in the string with "%20"
function replaceSpaces(str) {
  return str.split(" ").join("%20");
}

// removes numbers and special characters
function removeNonLettes(str) {
  return str.replace(regEx, "");
}

// searchParam => contains lettes only and "%20" instead of spaces
function parseSearchParam() {
  //searchParam = removeNonLettes(searchParam);
//  searchParam = replaceSpaces(searchParam);
}

// create Recipe objects from the API's json file and display them
function apiSuccess(json) {
  for (var i = 0; i < json.hits.length; i++) {
    var recipe = new Recipe(
      json.hits[i].recipe.label,
      json.hits[i].recipe.ingredients,
      json.hits[i].recipe.image,
      json.hits[i].recipe.url
    );
    recipes.push(recipe);
    //try putting javascript call here
    recipe.showRecipe();
  }
  // THE AUTO PULL OF NUTRIENT INFO ON SEARCH ---------------------------------------------------------------------------
  //nutritionixSearch(json.hits[0].recipe.ingredients[0].text);
}

// zero-out the search fields and variables
function initFields() {
  $("#searchBox").val("");
  $(".diet").val("Balanced");
}

// API
function runAPI() {
  var apiURL =
    "https://api.edamam.com/search?app_id=" +
    appID +
    "&app_key=" +
    appKey +
    "&q=" +
    searchParam +
    "&from=" +
    from +
    "&to=" +
    to +
    diet; // the URL for the API to use
  $.ajax({
    type: "GET",
    dataType: "json",
    async: "false",
    url: apiURL,
    success: function(json) {
      // on API success
      apiSuccess(json);
      $("#searchBox").attr("placeholder", "What are we making today?");
      // opens ingredients dropdown on mouse click and closes on mouseout
    },
    error: function() {
      // on API error
      $("#moreResults").hide();
      var msg = $("<h3>")
        .attr({
          title: "Please try different search parameters"
        })
        .css({
          "justify-content": "center",
          position: "absolute",
          right: "36%"
        });
      $("#output").append(msg);
      initFields();
      $("#searchBox").attr(
        "placeholder",
        "Please try different search parameters"
      );
    }
  });
}

$("#notification").hide(); // hide the notification
$("#advancedAfter").hide(); // hide the advanced options
$("#moreResults").hide(); // hide the more results button

$(document).ready(function() {
  // show ingredients list on click
  $(document).on("click", ".dropdown", function() {
    this.classList.toggle("is-active");
    $(this).mouseout(function() {
      this.classList.remove("is-active");
    });
  });


  // displays more results to the user
  $("#moreResults").click(function() {
    $(this).addClass("is-loading");
    setTimeout(function() {
      $("#moreResults").removeClass("is-loading");
    }, 2000);
    $("#output").empty();
    from += 5;
    to += 5;
    runAPI();
  });
  // update the search parameter on button click
  $("#searchBtn").click(function() {
    if ($("#searchBox").val() !== "") {
      // init search range
      $("#moreResults").hide();
      from = 0;
      to = 5;
      setTimeout(function() {
        $("#moreResults").show();
      }, 3000);

      $(this).addClass("is-loading");
      setTimeout(function() {
        $("#searchBtn").removeClass("is-loading");
      }, 2000);

      $("#output").empty();
      recipes.length = 0;
      searchParam = $("#searchBox").val();

      parseSearchParam();
      runAPI();

      $(".search").animate(
        {
          "padding-top": "-=100px"
        },
        1500
      );
    }
  });

  // assign the diet variable the selected option from the select form
  $(".diet")
    .change(function() {
      $(".diet option:selected").each(function() {
        var str = $(this)
          .text()
          .toLowerCase();
        if (str !== "") diet = "&diet=" + str;
        else diet = "";
      });
    })
    .trigger("change");



});

/*HARDCODED CAROUSEL STUFF*/
function sliderInit(){
    $('.vertical-center').slick({
        dots: true
    });
};

$(document).on('ready', function() {
  $(".vertical-center").slick({
  });
});



//Larry's API work
function nutritionixSearch(data){
  var xhr = new XMLHttpRequest();
  xhr.overrideMimeType("application/json");
  xhr.open('POST',"https://trackapi.nutritionix.com/v2/natural/nutrients",true);

  xhr.onload = function(){
    if(this.status == 200){
      console.log("Worked");
      //parsing and workng with the JSON
      var jsonResponse = JSON.parse(xhr.responseText);
      console.log(jsonResponse.foods[0]);
      document.getElementById("calories").innerHTML="Calories "+jsonResponse.foods[0].nf_calories;
      document.getElementById("ServingSize").innerHTML = "Serving Size "+ jsonResponse.foods[0].serving_qty + " " + jsonResponse.foods[0].serving_unit;
      document.getElementById("totalFat").innerHTML = "Total Fat "+ jsonResponse.foods[0].nf_total_fat + "g";
      document.getElementById("totalFatPercent").innerHTML = ((jsonResponse.foods[0].nf_total_fat/65)*100).toFixed(2)+"%";
      document.getElementById("saturatedFat").innerHTML = "Saturated Fat " + jsonResponse.foods[0].nf_saturated_fat + "g";
      document.getElementById("saturatedFatPercent").innerHTML = ((jsonResponse.foods[0].nf_saturated_fat/20)*100).toFixed(2)+"%";
      document.getElementById("cholesterol").innerHTML = "Cholesterol "+jsonResponse.foods[0].nf_cholesterol + "mg";
      document.getElementById("cholesterolPercent").innerHTML = ((jsonResponse.foods[0].nf_cholesterol/300)*100).toFixed(2)+"%";
      document.getElementById("sodium").innerHTML = "Sodium "+jsonResponse.foods[0].nf_sodium +"mg";
      document.getElementById("sodiumPercent").innerHTML = ((jsonResponse.foods[0].nf_sodium/2400)*100).toFixed(2)+"%";
      document.getElementById("totalCarbs").innerHTML = "Total Carbohydrates " + jsonResponse.foods[0].nf_total_carbohydrate+"g";
      document.getElementById("totalCarbsPercent").innerHTML = ((jsonResponse.foods[0].nf_total_carbohydrate/300)*100).toFixed(2)+"%";
      document.getElementById("fiber").innerHTML = "Dietary Fiber " + jsonResponse.foods[0].nf_dietary_fiber + "g";
      document.getElementById("fiberPercent").innerHTML = ((jsonResponse.foods[0].nf_dietary_fiber/25)*100).toFixed(2)+"%";
      document.getElementById("sugar").innerHTML = "Sugars "+jsonResponse.foods[0].nf_sugars +"g";
      document.getElementById("protein").innerHTML =  "Protein "+jsonResponse.foods[0].nf_protein + "g";
    } else {
      console.log(this.status);
    }
  }
  xhr.onerror = function(){
    console.log("Request Error");
  }

  // API Key
  xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
  xhr.setRequestHeader('x-app-id', '3d3fc303');
  xhr.setRequestHeader('x-app-key', '1bd34df9589ac1985af63cf9430863ce');
  xhr.setRequestHeader('x-remote-user-id', 'larryfry');
  xhr.setRequestHeader('accept', 'application/json');
  //xhr.responseType = 'json';
  //var data = document.getElementById("searchbar").value;
  data = '{"query":"'+data+'"}';
  xhr.send(data);
};


function ingredientStorage(currentRecipe, currentIngredient){
  console.log(currentRecipe +" "+ currentIngredient);
};


//new favorite dish
function newFav(){
    alert("SKEET");
    favXML = new XMLHttpRequest();
    favXML.open("POST",'favorite.php',true);
    var info = "chicken";
    info = '{"info":"'+info+'"}';

    favXML.send(info);
};
