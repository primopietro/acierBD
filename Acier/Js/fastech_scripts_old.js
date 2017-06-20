function fillDiv() {
	$("#ongletSemaine").trigger("click");
}

function ajoutSemaine() {
	var dataToSend = $("#formSemaine").serialize();
	$
			.ajax({
				method : "GET",
				data : dataToSend,
				url : "ajaxRelated/ajout-semaine_process.php",
				beforeSend : function() {
					$(this)
							.html(
									'<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
					$(this).prop("disabled", true);
				},
				success : function(response) {
					// response = response.replace(/\s/g, '');
					if (response == "success") {

						// var nextInsert = table.lenght - 1;
						var suffixe = $('#suffixe').val();
						var debut = $('#debut').val();

						$
								.ajax({
									method : "GET",
									url : "MVC/View/getWeekCalendar.php",
									beforeSend : function() {
										// TO INSERT - loading animation
									},
									beforeSend : function() {
										$('#dataTable tbody')
												.append(
														"<span id='download'>Telechargement..</span>");
									},
									success : function(response) {
										$('#download').remove();
										$('#dataTable tbody').html("");
										$('#dataTable tbody').append(response);

										clickWeek();
									}
								});
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
					document.getElementById("formSemaine").reset();
				}
			});
}

function clickWeek() {
	$("#dataTable tr")
			.click(
					function() {
						id = $(this).closest('tr').attr('id');
						if (id != "header" && id != "footer") {
							content = "";

							content += "<div class='container-fluid'>";

							// ******TABLEAU******
							content += "<div class='table-responsive'>";
							
							content += "<table class='table table-bordered' width='100%' id='tblHeure' cellspacing='0'><thead><tr id='header'>";
							content += "</tr></thead><tfoot><tr id='footer'>";
							content += "</tr></tfoot><tbody>";
							content += "</tbody></table></div>";
							
							
							content += "<a data-animation='ripple' class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' id='btnImpressionHeureSemaine'>Imprimer</a>";

							// ******AJOUT HEURE*******
							content += "<div class='formMargin'>";
							content += "<h3 class='h3Form'>Ajout heure(s)</h3>";
							content += "<form id='formHeureSemaine'>";

							content += "<div class='form-group formLeft col-lg-3 col-md-3 col-xs-12'>";
							content += "<label for='employe'>Employé</label><select id='selectEmp' name='employe' class='form-control formLeft inputMarginTop inputForm'>";
							content += "</select>";
							content += "</div>";

							content += "<div class='form-group formLeft col-lg-3 col-md-3 col-xs-12'>";
							content += "<label for='projet'>Projet</label><select id='selectProjet' name='projet' class='form-control formLeft inputMarginTop inputForm'>";
							content += "</select>";
							content += "</div>";

							content += "<div class='form-group formLeft col-lg-3 col-md-3 col-xs-12'>";
							content += "<label for='departement'>Département</label><select id='selectDep' name='departement' class='form-control formLeft inputMarginTop inputForm'>";
							content += "</select>";
							content += "</div>";

							content += "<div class='form-group formLeft col-lg-3 col-md-3 col-xs-12'>";
							content += "<label for='nbHeure'>Nb. heure(s)</label><input id='heure' name='nbHeure' class='form-control inputMarginTop inputForm' placeholder='Heure(s)'></input>";
							content += "</div>";

							content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 btnForm' id='btnAjoutHeure'>Ajouter</a></form>";
							content += "<span id='errorForm'></span>";
							content += "</div>";

							content += "</div>";

							$("#content").html(content);
							
							var semaine = $(this).find('td').eq(0).text();
							
							$.ajax({method : "GET",
								url : "MVC/View/getPrimesTable.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								success : function(response) {
									$("#header").html("<th>code</th>" + "<th>" + semaine + "</th>" + response);
									$("#footer").html("<th>code</th>" + "<th>" + semaine + "</th>" + response);
									}
							
								});
							
							$.ajax({method : "GET",
								url : "MVC/View/getEmployeesList.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								success : function(response) {
									$("#selectEmp").html(response);
									}
							
								});
							
							$.ajax({method : "GET",
								url : "MVC/View/getEmployeesListTable.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								success : function(response) {
									$("tbody").html(response);
									}
							
								});
							
							$.ajax({method : "GET",
								url : "MVC/View/getProjetsList.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								success : function(response) {
									$("#selectProjet").html(response);
									}
							
								});
							
							$.ajax({method : "GET",
								url : "MVC/View/getDepartementList.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								success : function(response) {
									$("#selectDep").html(response);
									}
							
								});
						}
					});
}

function ajoutProjet() {
	var dataToSend = $("#formProjet").serialize();
	$
			.ajax({
				method : "GET",
				data : dataToSend,
				url : "ajaxRelated/ajout-projet_process.php",
				beforeSend : function() {
					$(this)
							.html(
									'<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
					$(this).prop("disabled", true);
				},
				success : function(response) {
					// response = response.replace(/\s/g, '');
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
						rowContent += " h</td>"
						rowContent += "<td>0 $</td>";
						"</tr>";

						$('#tblProjet tbody').append(rowContent);
						
						clickProject();

						document.getElementById("formProjet").reset();

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
}

$(document)
		.on(
				"click",
				"#ongletSemaine",
				function() {
					var content = "";

					$("#classEmploye").removeClass("active");
					$("#classProjet").removeClass("active");
					$("#classDepartement").removeClass("active");
					$("#classPrime").removeClass("active");

					$("#classSemaine").addClass("active");

					content += "<div class='container-fluid'>";

					content += "<h1> Liste des semaines </h1>";
					content += "<div class='table-responsive'>";
					content += "<table class='table table-bordered' width='100%' id='dataTable' cellspacing='0'><thead><tr id='header'>";

					content += "<th>Suffixe</th>";
					content += "<th>Terminant le</th>";
					content += "<th>Payable le</th></tr></thead><tfoot><tr id='footer'>";

					content += "<th>Suffixe</th>";
					content += "<th>Terminant le</th>";
					content += "<th>Payable le</th>";
					content += "</tr></tfoot><tbody>";

					content += "</tbody></table></div>";

					content += "<h3 class='formTitleMargin'>Ajout semaine</h3>";
					content += "<form id='formSemaine'>";

					content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
					content += "<label for='suffixe'>Suffixe</label><input name='suffixe' class='form-control inputMarginTop inputForm' placeholder='Suffixe pour la semaine' id='suffixe'></input>";
					content += "</div>";

					content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
					content += "<label for='debut'>Terminant le</label><input name='debut' class='form-control inputMarginTop' type='date' id='debut'></input>";
					content += "</div>";

					content += "<span id='errorForm'></span>";

					content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly' onclick='ajoutSemaine();' id='btnAjoutSemaine'>Ajouter</a></form>";

					content += "</div>";

					$("#content").html(content);

					$
							.ajax({
								method : "GET",
								url : "MVC/View/getWeekCalendar.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								beforeSend : function() {
									$('#dataTable tbody')
											.append(
													"<span id='download'>Telechargement..</span>");
								},
								success : function(response) {
									$('#download').remove();
									$('#dataTable tbody').html("");
									$('#dataTable tbody').append(response);
									
									clickWeek();

								}
							});

				});

$(document).on(
		"click",
		".disable",
		function(e) {
			var key = $(this).attr("key");
			var trTobeDeleted = $(this).closest("tr");
			var urlToSend = "MVC/removeWeek.php?key=" + key;

			$.ajax({
				method : "GET",
				data : key,
				url : urlToSend,
				beforeSend : function() {
					// TO INSERT - loading animation
				},
				beforeSend : function() {
					$('#dataTable tbody').append(
							"<span id='download'>Telechargement..</span>");
				},
				success : function(response) {

					$('#download').remove();
					if (response == "success") {
						trTobeDeleted.remove();
					}

				}
			});

		});

// fill div with form employé
$(document)
		.on(
				"click",
				"#ongletEmploye",
				function() {
					$("#classSemaine").removeClass("active");
					$("#classProjet").removeClass("active");
					$("#classDepartement").removeClass("active");
					$("#classPrime").removeClass("active");

					$("#classEmploye").addClass("active");

					var content = "";

					content += "<div class='container-fluid'>";
					content += "<h1> Liste des employés </h1>";
					content += "<div class='table-responsive'>";
					content += "<table class='table table-bordered' width='100%' id='tblEmploye' cellspacing='0'><thead><tr id='header'>";

					content += "<th>Code</th>";
					content += "<th>Nom</th>";
					content += "<th>Prénom</th>";
					content += "<th>Taux horaire</th><th>Département</th></tr></thead><tfoot><tr id='footer'>";

					content += "<th>Code</th>";
					content += "<th>Nom</th>";
					content += "<th>Prénom</th>";
					content += "<th>Taux horaire</th>";
					content += "<th>Département</th>";
					content += "</tr></tfoot><tbody>";

					content += "</tbody></table></div>";
					content += "<a data-animation='ripple' class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' id='btnImpressionEmploye'>Imprimer</a>";

					content += "<h3 class='formTitleMargin'>Ajout employé</h3>";
					content += "<form id='formEmploye'>";
					
					content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
					content += "<label for='idEmploye'>Code</label><input name='idEmploye' class='form-control inputMarginTop inputForm' type='number' placeholder='Code de lemployé' id='idEmploye'></input>";
					content += "</div>";

					content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
					content += "<label for='nom'>Nom</label><input name='nom' class='form-control inputMarginTop inputForm' placeholder='Nom de lemployé' id='nom'></input>";
					content += "</div>";

					content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
					content += "<label for='prenom'>Prénom</label><input name='prenom' class='form-control inputMarginTop inputForm' placeholder='Prénom de lemployé' id='prenom'></input>";
					content += "</div>";
					
					content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
					content += "<label for='taux'>Taux horaire</label><input name='taux' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux horaire de lemployé' id='taux'></input>";
					content += "</div>";

					content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
					content += "<label for='departement'>Département</label><select id='departementList' name='departement' class='form-control formLeft inputMarginTop inputForm'><option value='departement1'>departement1</option>";
					content += "<option value='departement2'>departement2</option>";
					content += "<option value='departement3'>departement3</option>";
					content += "<option value='departement4'>departement4</option></select>";
					content += "</div>";

					content += "<span id='errorForm'></span>";

					content += "<a data-animation='ripple'  class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm'   id='btnAjoutEmploye'>Ajouter</a></form>";

					
					
					content += "</div>";

					$("#content").html(content);

					$.ajax({method : "GET",
								url : "MVC/View/getEmployees.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								beforeSend : function() {
									/*$('#tblEmploye tbody')
											.append(
													"<span id='download'>Telechargement..</span>");*/
								},
								success : function(response) {
									$('#download').remove();
									$('#tblEmploye tbody').append(response);
								}
							});
					
					$.ajax({method : "GET",
						url : "MVC/View/getDepartementList.php",
						beforeSend : function() {
							// TO INSERT - loading animation
						},
						success : function(response) {
							$("#departementList").html(response);
							}
					
						});
				});

// fill div with form projet
$(document)
		.on(
				"click",
				"#ongletProjet",
				function() {
					$("#classSemaine").removeClass("active");
					$("#classEmploye").removeClass("active");
					$("#classDepartement").removeClass("active");
					$("#classPrime").removeClass("active");

					$("#classProjet").addClass("active");

					var content = "";

					content += "<div class='container-fluid'>";
					content += "<h1> Liste des projets </h1>";
					content += "<div class='table-responsive'>";
					content += "<table class='table table-bordered' width='100%' id='tblProjet' cellspacing='0'><thead><tr id='header'>";

					content += "<th>Suffixe</th>";
					content += "<th>Date début</th>";
					content += "<th>Cumulatif production</th><th>Budget</th></tr></thead><tfoot><tr id='footer'>";

					content += "<th>Suffixe</th>";
					content += "<th>Date début</th>";
					content += "<th>Cumulatif production</th><th>Budget</th>";
					content += "</tr></tfoot><tbody>";

					content += "</tbody></table></div>";
					content += "<a data-animation='ripple' class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' id='btnImpressionProjet'>Imprimer</a>";

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

					content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly' onclick='ajoutProjet();' id='btnAjoutProjet'>Ajouter</a></form>";
					content += "</div>";
					var dataToSend = "";

					$
							.ajax({
								method : "GET",
								url : "MVC/View/getProjets.php",
								beforeSend : function() {
									// TO INSERT - loading
									// animation
								},
								beforeSend : function() {
									$('#tblProjet tbody')
											.append(
													"<span id='download'>Telechargement..</span>");
								},
								success : function(response) {
									$('#download').remove();
									$('#tblProjet tbody').html("");
									$('#tblProjet tbody').append(response);
									
									clickProject();

								}
							});

					$("#content").html(content);
				});

$(document)
		.on(
				"click",
				"#btnAjoutDepartement",
				function() {
					var dataToSend = $("#formDepartement").serialize();

					$
							.ajax({
								method : "GET",
								data : dataToSend,
								url : "ajaxRelated/ajout-departement_process.php",
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
											url : "MVC/View/getDepartements.php",
											beforeSend : function() {
												// TO INSERT - loading animation
											},
											beforeSend : function() {
												$('#tblDepartement tbody')
														.append(
																"<span id='download'>Telechargement..</span>");
											},
											success : function(response) {
												$('#download').remove();
												$('#tblDepartement tbody').html("");
												$('#tblDepartement tbody').append(response);

											
											}
										});

										document.getElementById(
												"formDepartement").reset();

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

// fill div with form departement
$(document)
		.on(
				"click",
				"#ongletDepartement",
				function() {
					$("#classSemaine").removeClass("active");
					$("#classEmploye").removeClass("active");
					$("#classProjet").removeClass("active");
					$("#classPrime").removeClass("active");

					$("#classDepartement").addClass("active");

					var content = "";

					content += "<div class='container-fluid'>";
					content += "<h1> Liste des départements </h1>";
					content += "<div class='table-responsive'>";
					content += "<table class='table table-bordered' width='100%' id='tblDepartement' cellspacing='0'><thead><tr id='header'>";

					content += "<th>Nom</th>";
					content += "<th>Taux ($/h)</th></tr></thead><tfoot><tr id='footer'>";

					content += "<th>Nom</th>";
					content += "<th>Taux ($/h)</th>";
					content += "</tr></tfoot><tbody>";

					content += "</tbody></table></div>";
					content += "<a data-animation='ripple' class='btn btn-default col-lg-2 col-md-2 col-xs-2 cursor btnForm' readonly='readonly' id='btnImpressionDepartement'>Imprimer</a>";

					content += "<h3 class='formTitleMargin'>Ajout département</h3>";
					content += "<form id='formDepartement'>";

					content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
					content += "<label for='nom'>Nom</label><input name='nom' class='form-control inputMarginTop inputForm' placeholder='Nom du département' id='nom'></input>";
					content += "</div>";

					content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
					content += "<label for='taux'>Taux </label><input name='taux' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux du département' id='taux'></input>";
					content += "</div>";

					content += "<span id='errorForm'></span>";

					content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm' readonly='readonly'"
							+ "  id='btnAjoutDepartement'>Ajouter</a></form>";
					content += "</div>";

					$("#content").html(content);
					$
							.ajax({
								method : "GET",
								url : "MVC/View/getDepartements.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								beforeSend : function() {
									$('#tblDepartement tbody')
											.append(
													"<span id='download'>Telechargement..</span>");
								},
								success : function(response) {
									$('#download').remove();
									$('#tblDepartement tbody').append(response);

								
								}
							});
				});