function fillDiv(){
	var content = "";
	
	$("#classEmploye").removeClass("active");
	$("#classProjet").removeClass("active");
	$("#classDepartement").removeClass("active");
	
	$("#classSemaine").addClass("active");
	
	content += "<div class='container-fluid'>";

	//Example Tables Card

	content += "<h2><u>Liste des semaines</u></h2>";
	content += "<div class='table-responsive'>";
	content += "<table class='table table-bordered' width='100%' id='dataTable' cellspacing='0'><thead><tr>";
			
	content += "<th>Suffixe</th>";
	content += "<th>Début de la semaine</th></tr></thead><tfoot><tr>";
				
	content += "<th>Suffixe</th>";
	content += "<th>Début de la semaine</th>";
	content += "</tr></tfoot><tbody>";

	content += "</tbody></table></div>";
	content += "<div class='form-group col-lg-12 col-md-12 col-xs-12'><input class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor' value='Imprimer' id='btnImpressionSemaine'></input></div>";
	
	content += "<h3 class='formTitleMargin'>Ajout semaine</h3>";
	content += "<form id='formSemaine'>";
	content += "<span id='error'></span>";
	
	content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
	content += "<label for='suffixe'>Suffixe</label><input name='suffixe' class='form-control inputMarginTop inputSuffixe' placeholder='Suffixe pour la semaine' id='suffixe'></input>";
	content += "</div>";
	
	content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
	content += "<label for='debut'>Début de la semaine</label><input name='debut' class='form-control inputMarginTop' type='date' id='debut'></input>";
	content += "</div>";
	
	//content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
	//content += "<label for='fin'>Fin de la semaine</label><input name='fin' class='form-control inputMarginTop' type='date' id='fin'></input>";
	//content += "</div>";
	
	content += "<input class='btn btn-default col-lg-4 col-md-4 col-xs-12 cursor' readonly='readonly' onclick='ajoutSemaine();' value='Ajouter' id='btnAjoutSemaine'></input></form>";
	
	content += "</div>";
	
	$("#content").html(content);
}

function ajoutSemaine(){
	var dataToSend = $("#formSemaine").serialize();
	$.ajax({
		  method: "GET",
		  data: dataToSend,
		  url: "ajaxRelated/ajout-semaine_process.php",
		  beforeSend: function() {
              $(this).html('<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
              $(this).prop("disabled", true);
          },
          success: function(response) {
              //response = response.replace(/\s/g, '');
              if (response == "success") {
                  
                  //var nextInsert = table.lenght - 1;
            	  var suffixe = $('#suffixe').val();
            	  var debut = $('#debut').val();
        		  var fin = "";
        		  
            	  var rowContent = "";
            	  
            	  rowContent += "<tr class='cursor tableHover'><td>";
            	  rowContent += suffixe;
            	  rowContent += "</td><td>";
            	  rowContent += debut;
            	  rowContent += "</td><td>";
            	  rowContent += fin;
            	  rowContent += "</td></tr>";
                  
                  $('#dataTable tbody').append(rowContent);
              } else {
                  $("#error").fadeIn(3000,
                          function() {
                              $(this).html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Veuillez remplir tous les champs');
                          });
              }
             
              $(this).prop("disabled", false);
          }
      });
}


$(document).on("click", "#ongletSemaine", function() {
	fillDiv();
	//TO DO implement same AJAX as window load
});

$(document).on("click", "#ongletEmploye", function() {
	$("#classSemaine").removeClass("active");
	$("#classProjet").removeClass("active");
	$("#classDepartement").removeClass("active");
	
	$("#classEmploye").addClass("active");
	
	var content = "";
	
	content += "<div class='container-fluid'>";
	content += "<p>employé</p>";
	content+= "</div>";
	
	$("#content").html(content);
});

$(document).on("click", "#ongletProjet", function() {
	$("#classSemaine").removeClass("active");
	$("#classEmploye").removeClass("active");
	$("#classDepartement").removeClass("active");
	
	$("#classProjet").addClass("active");
	
	var content = "";
	
	content += "<div class='container-fluid'>";
	content += "<p>projet</p>";
	content+= "</div>";
	
	$("#content").html(content);
});

$(document).on("click", "#ongletDepartement", function() {
	$("#classSemaine").removeClass("active");
	$("#classEmploye").removeClass("active");
	$("#classProjet").removeClass("active");
	
	$("#classDepartement").addClass("active");
	
	var content = "";
	
	content += "<div class='container-fluid'>";
	content += "<p>département</p>";
	content+= "</div>";
	
	$("#content").html(content);
});

$(document).ready(function(){
	$.ajax({
		  method: "GET",
		  url: "MVC/View/getWeekCalendar.php",
		  beforeSend: function() {
         //TO INSERT -  loading animation
      },
      beforeSend: function() {
          $('#dataTable tbody').append("<span id='download'>Telechargement..</span>");
          },
      success: function(response) {
    	  $('#download').remove();
    	   $('#dataTable tbody').append(response);
         
      }
  });
});