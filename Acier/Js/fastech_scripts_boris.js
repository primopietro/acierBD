function clickProject(){
	$("#tblProjet tr")
	.click(
			function() {
				id = $(this).closest('tr').attr('id');
				if (id != "header" && id != "footer") {
					content = "";

					content += "<div class='container-fluid'>";
					
					content += "<h2 style='margin-bottom: 2px;'>Projet: " + $(this).find('td').eq(0).text() + "</h2>";
					content += "<h5 style='margin-bottom: 10px;'>" + $(this).find('td').eq(2).text() + "</h5>";

					// ******TABLEAU******
					content += "<div class='table-responsive'>";
					content += "<table class='table table-bordered' width='100%' id='tblHeureProjet' cellspacing='0'><thead><tr id='header'>";

					content += "</tr></thead><tfoot><tr id='footer'>";

					content += "</tr></tfoot><tbody>";
					
					
					content += "<td></td></tr>";
					content += "</tbody></table></div>";
					content += "<a data-animation='ripple' class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' value='Imprimer' id='btnImpressionHeureSemaine'></a>";
					
					content += "</div>";

					$("#content").html(content);
					
					$.ajax({method : "GET",
						url : "MVC/View/getDepartementListTable.php",
						beforeSend : function() {
							// TO INSERT - loading animation
						},
						success : function(response) {
							$("#header").html(response);
							$("#footer").html(response);
							}
					
						});
					
					$.ajax({method : "GET",
						url : "MVC/View/getProjectWeeks.php",
						beforeSend : function() {
							// TO INSERT - loading animation
						},
						success : function(response) {
							$("tbody").html(response);
							}
					
						});
				}
			});
}


$(document)
.on(
		"click",
		"#btnAjoutHeure",
		function() {
			var dataToSend = encodeURI($("#formHeureSemaine").serialize());
			$
					.ajax({
						method : "GET",
						data : dataToSend,
						url : "ajaxRelated/ajout-heure_process.php",
						beforeSend : function() {
							$(this)
									.html(
											'<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
							$(this).prop("disabled", true);
						},
						success : function(response) {
							// response = response.replace(/\s/g, '');
							if (response == "success") {
									
								document.getElementById("formHeureSemaine")
										.reset();

							} else {
								$("#errorForm")
										.fadeIn(
												3000,
												function() {
													$(this)
															.html(
																	'<span class="glyphicon glyphicon-log-in"></span> &nbsp; Veuillez remplir tous les champs');
												});
							}

							$(this).prop("disabled", false);
						}
					});
		});

$(document)
.on(
		"click",
		"#ongletPrime",
		function() {
			var content = "";
			
			$("#classSemaine").removeClass("active");
			$("#classEmploye").removeClass("active");
			$("#classProjet").removeClass("active");
			$("#classDepartement").removeClass("active");

			$("#classPrime").addClass("active");

			var content = "";

			content += "<div class='container-fluid'>";
			content += "<h1> Liste des primes </h1>";
			content += "<div class='table-responsive'>";
			content += "<table class='table table-bordered' width='100%' id='tblPrime' cellspacing='0'><thead><tr id='header'>";

			content += "<th>Nom</th>";
			content += "<th>Taux ($/h)</th></tr></thead><tfoot><tr id='footer'>";

			content += "<th>Nom</th>";
			content += "<th>Taux ($/h)</th>";
			content += "</tr></tfoot><tbody>";

			content += "</tbody></table></div>";
			content += "<a data-animation='ripple' class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' id='btnImpressionDepartement'>Imprimer</a>";

			content += "<h3 class='formTitleMargin'>Ajout prime</h3>";
			content += "<form id='formPrime'>";

			content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
			content += "<label for='nom'>Nom</label><input name='nom' class='form-control inputMarginTop inputForm' placeholder='Nom du département' id='nom'></input>";
			content += "</div>";

			content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
			content += "<label for='taux'>Taux </label><input name='taux' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux du département' id='taux'></input>";
			content += "</div>";

			content += "<span id='errorForm'></span>";

			content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly'"
					+ "  id='btnAjoutPrime'>Ajouter</a></form>";
			content += "</div>";
			
			$("#content").html(content);

			$
			.ajax({
				method : "GET",
				url : "MVC/View/getPrimes.php",
				beforeSend : function() {
					// TO INSERT - loading animation
				},
				beforeSend : function() {
					$('#tblPrime tbody')
							.append(
									"<span id='download'>Telechargement..</span>");
				},
				success : function(response) {
					$('#download').remove();
					$('#tblPrime tbody').append(response);

				
				}
			});
		});

$(document)
.on(
		"click",
		"#btnAjoutPrime",
		function() {
			var dataToSend = $("#formPrime").serialize();

			$
					.ajax({
						method : "GET",
						data : dataToSend,
						url : "ajaxRelated/ajout-prime_process.php",
						beforeSend : function() {
							$(this)
									.html(
											'<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
							$(this).prop("disabled", true);
						},
						success : function(response) {
							// response = response.replace(/\s/g, '');
							if (response == "success") {
								$
								.ajax({
									method : "GET",
									url : "MVC/View/getPrimes.php",
									beforeSend : function() {
										// TO INSERT - loading animation
									},
									beforeSend : function() {
										$('#tblPrime tbody')
												.append(
														"<span id='download'>Telechargement..</span>");
									},
									success : function(response) {
										$('#download').remove();
										$('#tblPrime tbody').html("");
										$('#tblPrime tbody').append(response);

									
									}
								});

								document.getElementById(
										"formPrime").reset();

							} else {
								$("#errorForm")
										.fadeIn(
												3000,
												function() {
													$(this)
															.html(
																	'<span class="glyphicon glyphicon-log-in"></span> &nbsp; Veuillez remplir tous les champs');
												});
							}

							$(this).prop("disabled", false);
						}
					});
		});

$(document).on("change","input",function(){
	
	var form = $(this).closest("form");
	if(form.hasClass("editPrime")){
		
		var idPrime = $(this).closest("form").attr("idPrime");
		var data = "name="+$(this).attr("name")+"&value="+$(this).prop("value") +"&id=" +idPrime;
		
		
		$.ajax({method : "GET",
			url : "AjaxRelated/edit-prime_process.php",
			data : data,
			beforeSend : function() {
				// TO INSERT - loading animation
			},
			success : function(response) {
					if(response== "success"){
						$.ajax({
							method : "GET",
							url : "MVC/View/getPrimes.php",
							beforeSend : function() {
								// TO INSERT - loading animation
							},
							beforeSend : function() {
								$('#tblPrime tbody')
										.append(
												"<span id='download'>Telechargement..</span>");
							},
							success : function(response) {
								$('#download').remove();
								$('#tblPrime tbody').html("");
								$('#tblPrime tbody').append(response);

							
							}
						});
					}
					else{
						alert("fail");
					}
				}
		
			});
		
	}
});