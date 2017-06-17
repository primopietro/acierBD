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
		});

function getContentHtml(windowName){
	var content = "";
	
	if(windowName === "ongletPrime"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des primes </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class='table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

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
		content += "<label for='name'>Nom</label><input name='name' class='form-control inputMarginTop inputForm' placeholder='Nom du département'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
		content += "<label for='amount'>Taux </label><input name='amount' class='form-control inputMarginTop inputForm' type='number' placeholder='Taux du département'></input>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly'"
				+ "   typeName='prime'>Ajouter</a></form>";
		content += "</div>";
		
	} else if(windowName === "ongletSemaine"){
		
		content += "<div class='container-fluid'>";

		content += "<h1> Liste des semaines </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class='table table-bordered tblObject' width='100%'  cellspacing='0'><thead><tr id='header'>";

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
		content += "<label for='name'>Suffixe</label><input name='name' class='form-control inputMarginTop inputForm' placeholder='Suffixe pour la semaine' id='suffixe'></input>";
		content += "</div>";

		content += "<div class='form-group formLeft col-lg-6 col-md-6 col-xs-12'>";
		content += "<label for='begin_date'>Terminant le</label><input name='begin_date' class='form-control inputMarginTop' type='date' id='debut'></input>";
		content += "</div>";

		content += "<span id='errorForm'></span>";

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly' onclick='ajoutSemaine();' typeName='work_week'>Ajouter</a></form>";

		content += "</div>";
		
	} else if(windowName === "ongletEmploye"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des employés </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class='table table-bordered tblObject' width='100%'  cellspacing='0'><thead><tr id='header'>";

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

		content += "<a data-animation='ripple'  class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo'   typeName='employe'>Ajouter</a></form>";

		
		
		content += "</div>";
		
	} else if(windowName === "ongletProjet"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des projets </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class='table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

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

		content += "<a data-animation='ripple' class='btn btn-default col-lg-3 col-md-3 col-xs-12 cursor btnForm addInfo' readonly='readonly'  typeName='project'>Ajouter</a></form>";
		content += "</div>";
		
	} else if(windowName === "ongletDepartement"){
		
		content += "<div class='container-fluid'>";
		content += "<h1> Liste des départements </h1>";
		content += "<div class='table-responsive'>";
		content += "<table class='table table-bordered tblObject' width='100%' cellspacing='0'><thead><tr id='header'>";

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
		
	}

	
	return content;
}

$(document)
.on(
		"click",
		".addInfo",
		function() {
			var form = $(this).closest("form");
			var dataToSend = form.serialize();
			var windowName = $(".active > a").attr("id");
			var formName = $(this).attr("typename");
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
							if (response == "success") {
								updateTable(windowName);

								form.reset();

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

		
		}
	});
}



















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
											transform:scale(0)`
		
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
