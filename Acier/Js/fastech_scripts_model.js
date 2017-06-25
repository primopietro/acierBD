//onglet click event
$(document)
.on(
		"click",
		".changeOnglet",
		function() {
			
			var windowName = $(this).attr("id");
		
			var content = "";
			
			$(".changeOnglet").closest("li").removeClass("active");
			$(this).closest("li").addClass("active");
			
			var content = getContentHtml(windowName);
			$("#content").html("");
			$("#content").html(content);
			
			updateTable(windowName);
			if(windowName == "ongletEmploye")
				$("#departementList").load("MVC/view/getDepSelect.php");
		});

//fill content with onglet
function getContentHtml(windowName){
	var content = "";
	
	if(windowName === "ongletPrime"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des primes </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class=' table-responsive table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

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
		content += "<label for='name'>Nom</label><input name='name' class='form-control inputMarginTop inputForm' placeholder='Nom de la prime'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
		content += "<label for='amount'>Taux </label><input name='amount' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux de la prime'></input>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly'"
				+ "   typeName='prime'>Ajouter</a></form>";
		content += "</div>";
		
	} else if(windowName === "ongletSemaine"){
		
		content += "<div class='container-fluid'>";

		content += "<h1> Liste des semaines </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class=' table-responsive table table-bordered tblObject' width='100%'  cellspacing='0'><thead><tr id='header'>";

		content += "<th>Suffixe</th>";
		content += "<th>Terminant le</th>";
		content += "<th>Payable le</th>";
		content += "</tr></thead><tfoot><tr id='footer'>";

		content += "<th>Suffixe</th>";
		content += "<th>Terminant le</th>";
		content += "<th>Payable le</th>";
		content += "</tr></tfoot><tbody>";

		content += "</tbody></table></div>";

		content += "<h3 class='formTitleMargin'>Ajout semaine</h3>";
		content += "<form id='formSemaine'>";

		content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
		content += "<label for='name'>Suffixe</label><input name='name' class='form-control inputMarginTop inputForm' placeholder='Suffixe pour la semaine' id='suffixe'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
		content += "<label for='begin_date'>Terminant le</label><input name='begin_date' class='form-control inputMarginTop' type='date' id='debut'></input>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly' typeName='work_weeks'>Ajouter</a></form>";

		content += "</div>";
		
	} else if(windowName === "ongletEmploye"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des employés </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class=' table-responsive table table-bordered tblObject' width='100%'  cellspacing='0'><thead><tr id='header'>";

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
		content += "<label for='id_employe'>Code</label><input name='id_employe' class='form-control inputMarginTop inputForm' type='number' placeholder='Code de lemployé' id='idEmploye'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
		content += "<label for='family_name'>Nom</label><input name='family_name' class='form-control inputMarginTop inputForm' placeholder='Nom de lemployé' id='nom'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
		content += "<label for='first_name'>Prénom</label><input name='first_name' class='form-control inputMarginTop inputForm' placeholder='Prénom de lemployé' id='prenom'></input>";
		content += "</div>";
		
		content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
		content += "<label for='hour_rate'>Taux horaire</label><input name='hour_rate' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux horaire de lemployé' id='taux'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-2 col-md-2 col-xs-12'>";
		content += "<label for='departement'>Département</label><select id='departementList' name='departement' class='form-control formLeft inputMarginTop inputForm'><option value='departement1'>departement1</option>";
		content += "<option value='departement2'>departement2</option>";
		content += "<option value='departement3'>departement3</option>";
		content += "<option value='departement4'>departement4</option></select>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple'  class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo'   typeName='employees'>Ajouter</a></form>";

		
		
		content += "</div>";
	   
		
	} else if(windowName === "ongletProjet"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des projets </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class=' table-responsive table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

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
		content += "<label for='name'>Suffixe</label><input name='name' class='form-control inputMarginTop inputForm' placeholder='Code utilisé pour le projet' id='suffixeProjet'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
		content += "<label for='start_date'>Date début</label><input name='start_date' class='form-control inputMarginTop inputForm' type='date' id='debutProjet'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-4 col-md-4 col-xs-12'>";
		content += "<label for='budget'>Budget</label><input name='budget' class='form-control inputMarginTop inputForm' placeholder='Budget pour le projet' type='number' id='budget'></input>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly'  typeName='projects'>Ajouter</a></form>";
		content += "</div>";
		
	} else if(windowName === "ongletDepartement"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des départements </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class=' table-responsive table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

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
		content += "<label for='name'>Nom</label><input name='name' class='form-control inputMarginTop inputForm' placeholder='Nom du département' id='nom'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
		content += "<label for='amount'>Taux </label><input name='amount' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux du département' id='taux'></input>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly'"
				+ "  typeName='departement'>Ajouter</a></form>";
		content += "</div>";
		
	} else if(windowName === "ongletCompte"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Informations du compte </h1>";
		
		content += "<table class=' table-responsive table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

		content += "<th>Nom d'utilisateur</th>";
		content += "<th>Mot de passe</th></tr></thead><tfoot><tr id='footer'>";

		content += "<th>Nom d'utilisateur</th>";
		content += "<th>Mot de passe</th>";
		content += "</tr></tfoot><tbody>";

		content += "</tbody></table></div>";
		content += "</div>";
		
	}

	
	return content;
}


//btn ajout event
$(document)
.on(
		"click",
		".addInfo",
		function() {
			var form = $(this).closest("form");
			var dataToSend = form.serialize();
			var windowName = $(".active > a").attr("id");
			var formName = $(this).attr("typename");
			console.log(dataToSend);
			console.log(formName);
			console.log(windowName);
			$
					.ajax({
						method : "POST",
						data : dataToSend,
						url : "ajaxRelated/ajout-object_process.php?typeName=" + formName,
						beforeSend : function() {
							$(this)
									.html(
											'<span class="glyphicon glyphicon-transfer"></span> &nbsp;Ajout...');
							$(this).prop("disabled", true);
						},
						success : function(response) {
							// response = response.replace(/\s/g, '');
							if (response == "success" || response =="Wsuccess") {
								updateTable(windowName);

								$(document).find("form").find("input").val("");

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

function updateTable(windowName){
	
	$
	.ajax({
		method : "GET",
		url : "MVC/View/getObjectDynamicTable.php?objectName=" + windowName,
		beforeSend : function() {
			// TO INSERT - loading animation
		},
		beforeSend : function() {
			/*$('.tblObject tbody')
					.append(
							"<span id='download'>Telechargement..</span>");*/
		},
		success : function(response) {
			//$('#download').remove();
			$('.tblObject tbody').html("");
			$('.tblObject tbody').append(response);
			if(windowName == "ongletSemaine"){
				addConsultButtons();
			}
		}
	});
	
}

function addConsultButtons(){
	$('.tblObject thead tr').append("<th></th>");
	$('.tblObject tbody tr').each(function(){
		$(this).append("<td><a class='cursor clickWeek'>Consulter</a></td>");
	});
	$('.tblObject tfoot tr').append("<th></th>");
}



//on change tbl event
$(document.body).on('change',".editable",function (e) {
	
	var self = $(this);

	
	var form = self.closest(".edit");
	var windowName = $(".active > a").attr("id");
	var idObj = self.closest(".edit").attr("idObj");
	var formName = form.attr("table");

	var data = "name="+ self.attr("name")+"&value="+ self.prop("value") +"&id=" +idObj;
	var rowIndex = self.closest('tr').prevAll().length; 
	rowIndex+=2;
	var state ="";
	console.log(data);
	$.ajax({method : "POST",
		url : "AjaxRelated/edit-object_process.php?typeName=" + formName,
		data : data,
		beforeSend : function() {
			// TO INSERT - loading animation
		},
		success : function(response) {
			
				if(response== "success" || response =="Wsuccess"){
					updateTable(windowName);
					state = response;
				}else{
					state = "danger";
				}
		},
		complete : function(){
			setTimeout(function()
			{
			highlightRow(rowIndex,state);
			}, 100);
		}
	
		});
	
});

function highlightRow(rowIndex, state){
	var compter =0;
	$('.tblObject tr').each(function() {
		if (compter==rowIndex){
			$(this).addClass(state).delay(1000).queue(function(){
				if(state=="success" || state=="Wsuccess"){
					$(this).delay(1000).removeClass(state).dequeue();
					$(this).delay(1000).removeClass("Wsuccess").dequeue();
					$(this).delay(1000).removeClass("danger").dequeue();
				}
				
				return null;
			});
		}
	
		compter++;
	});
	
	
}

//on click week (stand by)
/*$(document)
.on(
		"click",
		".clickWeek",
		function() {
			id = $(".tblObject").closest('tr').attr('id');
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
		});*/

















const isMobile = window.navigator.userAgent.match(/Mobile/) && window.navigator.userAgent.match(/Mobile/)[0] === "Mobile";
const event = isMobile ? "touchstart" : "click";	

$(document).on("click", '*[data-animation="ripple"]', function(e) {
		
		e.preventDefault();
		const button = e.target,
					rect = button.getBoundingClientRect(),
					originalBtn = this,
					btnHeight = rect.height,
					btnWidth = rect.width;
		let posMouseX = 0,
				posMouseY = 0;
		
		if (isMobile) {
			posMouseX = e.changedTouches[0].pageX - rect.left;
			posMouseY = e.changedTouches[0].pageY - rect.top;
			
		} else {
			posMouseX = e.pageX - rect.left;
			posMouseY = e.pageY - rect.top;
		}
		

		const baseCSS =  `position: absolute;
											width: ${btnWidth * 2}px;
											height: ${btnWidth * 2}px;
											transition: all linear 700ms;
											transition-timing-function:cubic-bezier(0.4, 0.0, 0.2, 1);
											border-radius: 50%;
											background: var(--color-ripple);
											top:${posMouseY - btnWidth}px;
											left:${posMouseX - btnWidth}px;
											pointer-events: none;
											transform:scale(0)`;
		
		var rippleEffect = document.createElement("span");
		rippleEffect.style.cssText = baseCSS;
		
		//prepare the dom
		$(this).css("overflow", "hidden");
		this.appendChild(rippleEffect);
		
		//start animation
		setTimeout( function() { 
			rippleEffect.style.cssText = baseCSS + `transform:scale(1); opacity: 0;`;
		}, 5);
		
		setTimeout( function() {
			rippleEffect.remove();
			//window.location.href = currentBtn.href;
		},700);
	});
