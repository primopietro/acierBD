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
	content += "<th>Date début</th>";
	content += "<th>Date fin</th></tr></thead><tfoot><tr>";
				
	content += "<th>Suffixe</th>";
	content += "<th>Date début</th>";
	content += "<th>Date fin</th></tr></tfoot><tbody><tr>";
	content += "<td>22-avril-2017</td>";
	content += "<td>2017-04-22</td>";
	content += "<td>2017-04-29</td></tr><tr>";
	content += "<td>29-avril-2017</td>";
	content += "<td>2017-04-29</td>";
	content += "<td>2017-05-06</td></tr><tr>";
	content += "<td>6-mai-2017</td>";
	content += "<td>2017-05-06</td>";
	content += "<td>2017-05-13</td></tr><tr>";
	content += "<td>13-mai-2017</td>";
	content += "<td>2017-05-13</td>";
	content += "<td>2017-05-20</td></tr><tr>";
	content += "<td>20-mai-2017</td>";
	content += "<td>2017-05-20</td>";
	content += "<td>2017-05-27</td>";
	content += "</tr></tbody></table></div>";
	
	content+= "</div>";
	
	$("#content").html(content);
}


$(document).on("click", "#ongletSemaine", function() {
	fillDiv();
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