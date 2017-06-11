

$(document).on("change","input",function(){
	
	var form = $(this).closest("form");
	if(form.hasClass("editDep")){
		
		var idDep = $(this).closest("form").attr("idDep");
		var data = "name="+$(this).attr("name")+"&value="+$(this).prop("value") +"&id=" +idDep;
		
		
		$.ajax({method : "GET",
			url : "AjaxRelated/edit-departement_process.php",
			data : data,
			beforeSend : function() {
				// TO INSERT - loading animation
			},
			success : function(response) {
					if(response== "success"){
						$.ajax({
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
					}
					else{
						alert("fail");
					}
				}
		
			});
		
	}
	else if(form.hasClass("editEmp")){
			
			var idEmp = $(this).closest(".editEmp").attr("idemp");
			var data = "name="+$(this).attr("name")+"&value="+$(this).prop("value") +"&id=" +idEmp;
			
			$.ajax({method : "GET",
				url : "AjaxRelated/edit-employe_process.php",
				data : data,
				beforeSend : function() {
					// TO INSERT - loading animation
				},
				success : function(response) {
						if(response== "success"){
							$.ajax({
								method : "GET",
								url : "MVC/View/getEmployees.php",
								beforeSend : function() {
									// TO INSERT - loading animation
								},
								beforeSend : function() {
									$('#tblEmploye tbody')
											.append(
													"<span id='download'>Telechargement..</span>");
								},
								success : function(response) {
									$('#download').remove();
									$('#tblEmploye tbody').html("");
									$('#tblEmploye tbody').append(response);

								
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


$(document.body).on('change',"select",function (e) {
	var form = $(this).closest(".editEmp");
	var idEmp = $(this).closest(".editEmp").attr("idemp");
	var data = "name="+$(this).attr("name")+"&value="+$(this).prop("value") +"&id=" +idEmp;
	
	$.ajax({method : "GET",
		url : "AjaxRelated/edit-employe_process.php",
		data : data,
		beforeSend : function() {
			// TO INSERT - loading animation
		},
		success : function(response) {
				if(response== "success"){
					$.ajax({
						method : "GET",
						url : "MVC/View/getEmployees.php",
						beforeSend : function() {
							// TO INSERT - loading animation
						},
						beforeSend : function() {
							$('#tblEmploye tbody')
									.append(
											"<span id='download'>Telechargement..</span>");
						},
						success : function(response) {
							$('#download').remove();
							$('#tblEmploye tbody').html("");
							$('#tblEmploye tbody').append(response);

						
						}
					});
				}
				else{
					alert("fail");
				}
			}
	
		});
});












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

