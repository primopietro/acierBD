function clickProject(){
	$("#tblProjet tr")
	.click(
			function() {
				id = $(this).closest('tr').attr('id');
				if (id != "header" && id != "footer") {
					content = "";

					content += "<div class='container-fluid'>";
					
					content += "<h2 style='margin-bottom: 2px;'>Projet: requete code</h2>";
					content += "<h5 style='margin-bottom: 10px;'>budget</h5>";

					// ******TABLEAU******
					content += "<div class='table-responsive'>";
					content += "<table class='table table-bordered' width='100%' id='tblEmploye' cellspacing='0'><thead><tr id='header'>";

					content += "<th>Semaine</th>";
					for(var i = 1; i < 6; i++){
						content += "<th>dep" + i + "</th>";
					}
					content += "<th>TOTAL HRES</th>";
					content += "</tr></thead><tfoot><tr id='footer'>";

					content += "<th>Semaine</th>";
					for(var i = 1; i < 6; i++){
						content += "<th>dep" + i + "</th>";
					}
					content += "<th>TOTAL HRES</th>";
					content += "</tr></tfoot><tbody>";
					
					content += "<tr><td>Total:</td>";
					for(var i = 1; i < 7; i++){
						content += "<td>calcul" + i + "</td>";
					}
					
					content += "</tr><tr><td>Taux:</td>";
					for(var i = 1; i < 6; i++){
						content += "<td>taux" + i + "</td>";
					}
					content += "<td></td></tr>";
					content += "</tbody></table></div>";
					content += "<div class='form-group col-lg-12 col-md-12 col-xs-12'><input class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' value='Imprimer' id='btnImpressionHeureSemaine'></input></div>";
					
					content += "</div>";

					$("#content").html(content);
				}
			});
}