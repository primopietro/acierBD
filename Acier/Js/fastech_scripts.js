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
	content += "<th>Début de la semaine</th>";
	content += "<th>Fin de la semaine</th></tr></thead><tfoot><tr>";
				
	content += "<th>Suffixe</th>";
	content += "<th>Début de la semaine</th>";
	content += "<th>Fin de la semaine</th>";
	content += "</tr></tfoot><tbody>";

	content += "</tbody></table></div>";
	
	content += "<h3 class='formTitleMargin'>Ajout semaine</h3>";
	content += "<form id='formSemaine'>";
	
	content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
	content += "<label for='suffixe'>Suffixe</label><input name='suffixe' class='form-control inputMarginTop inputForm' placeholder='Suffixe pour la semaine' id='suffixe'></input>";
	content += "</div>";
	
	content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
	content += "<label for='debut'>Début de la semaine</label><input name='debut' class='form-control inputMarginTop' type='date' id='debut'></input>";
	content += "</div>";
	
	content += "<span id='errorForm'></span>";
	
	content += "<input class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly' onclick='ajoutSemaine();' value='Ajouter' id='btnAjoutSemaine'></input></form>";
	
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
                	  $('#dataTable tbody').html("");
                	   $('#dataTable tbody').append(response);
                     
                  }
              });
              } else {
                  $("#errorForm").fadeIn(3000,
                          function() {
                              $(this).html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Veuillez remplir tous les champs');
                          });
              }
             
              $(this).prop("disabled", false);
              document.getElementById("formSemaine").reset();
          }
      });
	//document.getElementById("formSemaine").reset();
}

function ajoutEmploye(){
	var dataToSend = $("#formEmploye").serialize();
	$.ajax({
		  method: "GET",
		  data: dataToSend,
		  url: "ajaxRelated/ajout-employe_process.php",
		  beforeSend: function() {
              $(this).html('<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
              $(this).prop("disabled", true);
          },
          success: function(response) {
              //response = response.replace(/\s/g, '');
              if (response == "success") {
            	  var nom = $('#nom').val();
            	  var prenom = $('#prenom').val();
            	  
            	  var rowContent = "";
            	  rowContent += "<tr class='cursor tableHover'><td>";
            	  rowContent += nom;
            	  rowContent += "</td><td>";
            	  rowContent += prenom;
            	  rowContent += "</td></tr>";
            	  
            	  $('#tblEmploye tbody').append(rowContent);
            	  
            	  document.getElementById("formEmploye").reset();
        		
              } else {
                  $("#errorForm").fadeIn(3000,
                          function() {
                              $(this).html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Veuillez remplir tous les champs');
                          });
              }
             
              $(this).prop("disabled", false);
          }
      });
}

function ajoutProjet(){
	var dataToSend = $("#formProjet").serialize();
	$.ajax({
		  method: "GET",
		  data: dataToSend,
		  url: "ajaxRelated/ajout-projet_process.php",
		  beforeSend: function() {
              $(this).html('<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
              $(this).prop("disabled", true);
          },
          success: function(response) {
              //response = response.replace(/\s/g, '');
              if (response == "success") {
            	  var suffixe = $('#suffixeProjet').val();
            	  var date = $('#debutProjet').val();
            	  var budget = $('#budget').val();
            	  
            	  var rowContent = "";
            	  rowContent += "<tr class='cursor tableHover'><td>";
            	  rowContent += suffixe;
            	  rowContent += "</td><td>";
            	  rowContent += date;
            	  rowContent += "</td><td>";
            	  rowContent += budget;
            	  rowContent += " $</td></tr>";
            	  
            	  $('#tblProjet tbody').append(rowContent);
            	  
            	  document.getElementById("formProjet").reset();
        		
              } else {
                  $("#errorForm").fadeIn(3000,
                          function() {
                              $(this).html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Veuillez remplir tous les champs');
                          });
              }
             
              $(this).prop("disabled", false);
          }
      });
}

function ajoutDepartement(){
	var dataToSend = $("#formDepartement").serialize();
	$.ajax({
		  method: "GET",
		  data: dataToSend,
		  url: "ajaxRelated/ajout-departement_process.php",
		  beforeSend: function() {
              $(this).html('<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
              $(this).prop("disabled", true);
          },
          success: function(response) {
              //response = response.replace(/\s/g, '');
              if (response == "success") {
            	  var nom = $('#nom').val();
            	  var taux = $('#taux').val();
            	  
            	  var rowContent = "";
            	  rowContent += "<tr class='cursor tableHover'><td>";
            	  rowContent += nom;
            	  rowContent += "</td><td>";
            	  rowContent += taux;
            	  rowContent += " $</td></tr>";
            	  
            	  $('#tblDepartement tbody').append(rowContent);
            	  
            	  document.getElementById("formDepartement").reset();
        		
              } else {
                  $("#errorForm").fadeIn(3000,
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

$(document).on("click", ".disable", function(e) {
	var key = $(this).attr( "key" );
	  var trTobeDeleted = $(this).closest("tr");
	var urlToSend = "MVC/removeWeek.php?key="+ key;
	
		$.ajax({
			  method: "GET",
			  data: key,
			  url: urlToSend,
			  beforeSend: function() {
	       //TO INSERT -  loading animation
	    },
	    beforeSend: function() {
	        $('#dataTable tbody').append("<span id='download'>Telechargement..</span>");
	        },
	    success: function(response) {
	    
	  	  $('#download').remove();
	  	  if(response == "success"){
	  		  trTobeDeleted.remove();      
	  	  }
	       
	    }
	});
	
});




//fill div with form employé
$(document).on("click", "#ongletEmploye", function() {
	$("#classSemaine").removeClass("active");
	$("#classProjet").removeClass("active");
	$("#classDepartement").removeClass("active");
	
	$("#classEmploye").addClass("active");
	
	var content = "";
	
	content += "<div class='container-fluid'>";
	content += "<h2><u>Liste des employés</u></h2>";
	content += "<div class='table-responsive'>";
	content += "<table class='table table-bordered' width='100%' id='tblEmploye' cellspacing='0'><thead><tr>";
	
	content += "<th>Nom</th>";
	content += "<th>Prénom</th></tr></thead><tfoot><tr>";
				
	content += "<th>Nom</th>";
	content += "<th>Prénom</th>";
	content += "</tr></tfoot><tbody>";

	content += "</tbody></table></div>";
	content += "<div class='form-group col-lg-12 col-md-12 col-xs-12'><input class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' value='Imprimer' id='btnImpressionEmploye'></input></div>";
	
	
	content += "<h3 class='formTitleMargin'>Ajout employé</h3>";
	content += "<form id='formEmploye'>";
	
	content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
	content += "<label for='nom'>Nom</label><input name='nom' class='form-control inputMarginTop inputForm' placeholder='Nom de lemployé' id='nom'></input>";
	content += "</div>";
	
	content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
	content += "<label for='prenom'>Prénom</label><input name='prenom' class='form-control inputMarginTop inputForm' placeholder='Prénom de lemployé' id='prenom'></input>";
	content += "</div>";
	
	content += "<span id='errorForm'></span>";
	
	content += "<input class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly' onclick='ajoutEmploye();' value='Ajouter' id='btnAjoutEmploye'></input></form>";
	
	content+= "</div>";
	
	$("#content").html(content);
});

//fill div with form projet
$(document).on("click", "#ongletProjet", function() {
	$("#classSemaine").removeClass("active");
	$("#classEmploye").removeClass("active");
	$("#classDepartement").removeClass("active");
	
	$("#classProjet").addClass("active");
	
	var content = "";
	
	content += "<div class='container-fluid'>";
	content += "<h2><u>Liste des projets</u></h2>";
	content += "<div class='table-responsive'>";
	content += "<table class='table table-bordered' width='100%' id='tblProjet' cellspacing='0'><thead><tr>";
			
	content += "<th>Suffixe</th>";
	content += "<th>Date début</th>";
	content += "<th>Budget</th></tr></thead><tfoot><tr>";
				
	content += "<th>Suffixe</th>";
	content += "<th>Date début</th>";
	content += "<th>Budget</th>";
	content += "</tr></tfoot><tbody>";

	content += "</tbody></table></div>";
	content += "<div class='form-group col-lg-12 col-md-12 col-xs-12'><input class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' value='Imprimer' id='btnImpressionEmploye'></input></div>";
	
	
	content += "<h3 class='formTitleMargin'>Ajout employé</h3>";
	content += "<form id='formProjet'>";
	
	content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
	content += "<label for='suffixe'>Suffixe</label><input name='suffixe' class='form-control inputMarginTop inputForm' placeholder='Code utilisé pour le projet' id='suffixeProjet'></input>";
	content += "</div>";
	
	content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
	content += "<label for='debutProjet'>Date début</label><input name='debutProjet' class='form-control inputMarginTop inputForm' type='date' id='debutProjet'></input>";
	content += "</div>";
	
	content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
	content += "<label for='budget'>Budget</label><input name='budget' class='form-control inputMarginTop inputForm' placeholder='Budget pour le projet' type='number' id='budget'></input>";
	content += "</div>";
	
	content += "<span id='errorForm'></span>";
	
	content += "<input class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly' onclick='ajoutProjet();' value='Ajouter' id='btnAjoutProjet'></input></form>";
	content+= "</div>";
	
	$("#content").html(content);
});

//fill div with form departement
$(document).on("click", "#ongletDepartement", function() {
	$("#classSemaine").removeClass("active");
	$("#classEmploye").removeClass("active");
	$("#classProjet").removeClass("active");
	
	$("#classDepartement").addClass("active");
	
	var content = "";
	
	content += "<div class='container-fluid'>";
	content += "<h2><u>Liste des départements</u></h2>";
	content += "<div class='table-responsive'>";
	content += "<table class='table table-bordered' width='100%' id='tblDepartement' cellspacing='0'><thead><tr>";
	
	content += "<th>Nom</th>";
	content += "<th>Taux</th></tr></thead><tfoot><tr>";
				
	content += "<th>Nom</th>";
	content += "<th>Taux</th>";
	content += "</tr></tfoot><tbody>";

	content += "</tbody></table></div>";
	content += "<div class='form-group col-lg-12 col-md-12 col-xs-12'><input class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' value='Imprimer' id='btnImpressionDepartement'></input></div>";
	
	
	content += "<h3 class='formTitleMargin'>Ajout département</h3>";
	content += "<form id='formDepartement'>";
	
	content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
	content += "<label for='nom'>Nom</label><input name='nom' class='form-control inputMarginTop inputForm' placeholder='Nom du département' id='nom'></input>";
	content += "</div>";
	
	content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
	content += "<label for='taux'>Taux</label><input name='taux' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux du département' id='taux'></input>";
	content += "</div>";

	content += "<span id='errorForm'></span>";
	
	content += "<input class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly' onclick='ajoutDepartement();' value='Ajouter' id='btnAjoutDepartement'></input></form>";
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