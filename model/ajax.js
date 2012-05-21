//функция: передает countryDropdown value в getarea.php
function getArea() {
	var countryValue = $("#countryDropdown option:selected").val();
	var area = $("#areaDropdown");
	
	area.attr("disabled",false);
	area.load("model/getarea.php",{country : countryValue});
}

//функция: передает areaDropdown value в getdept.php
function getDept() {
	var countryValue = $("#countryDropdown option:selected").val();
	var areaValue = $("#areaDropdown option:selected").val();
	var dept = $("#departmentDropdown");
	
	dept.attr("disabled",false);
	dept.load("model/getdept.php",{area : areaValue});
}

//функция: передает departmentDropdown value в getList.php
function getList() {
	var countryValue = $("#countryDropdown option:selected").val();
	var areaValue = $("#areaDropdown option:selected").val();
	var deptValue = $("#departmentDropdown option:selected").val();
	var list = $("#departmentList");
		
	list.show("slow");
	list.load("model/getlist.php",{department : deptValue});
}

//функция: обнуление areaDropdown
function clearArea() {

	var area = $("#areaDropdown");
	area.empty();		
	area.attr("disabled",true);
	//alert ("clearArea");
}

//функция: обнуление departmentDropdown
function clearDept() {
	
	var dept = $("#departmentDropdown");
	dept.empty();
	dept.attr("disabled",true);
}

//функция: обнуление departmentList
function clearList() {
	
	var list = $("#departmentList");
	//list.empty();
	//list.attr("disabled",true);
	list.hide("slow");
}


//Обработка полей p_name и p_phone
$(document).ready(function() {
	$("#p_name").click(function () {
	var name = document.getElementById('p_name');
	name.onclick = name.setAttribute("value", "");
	})
	
	$("#p_phone").click(function () {
	var phone = document.getElementById('p_phone');
	phone.onclick = phone.setAttribute("value", "");
	})

	$('#p_name').blur(function()	{
		if( !this.value ) {
			alert ('Please fill in the Name!');
		}
	});
	
	$('#p_phone').blur(function()	{
		if( !this.value ) {
			alert ('Please fill in the Contact Phone!');
		}
	});
	
});

//
//ТОЧКА ВХОДА
//

$(document).ready(function() {
	
	//обработка события по onChange на countryDropdown
	$("#countryDropdown").change(function() {
		
		var countryValue = $("#countryDropdown option:selected").val();
		//проверка на нулевое положение countryDropdown select
		if (countryValue == "") {
		
			clearArea(); //очистить areaDropdown
			clearDept(); //очистить departmentDropdown
			clearList();
		} else {
			
			getArea();
			clearDept();
			clearList();
		}
	})

	//обработка события по onChange на areaDropdown
	$("#areaDropdown").change(function() {
	
		var areaValue = $("#areaDropdown option:selected").val();
		//проверка на нулевое положение areaDropdown select
		if (areaValue == "") {
			
			clearDept(); //очистить departmentDropdown select
			clearList();
		} else {
			
			getDept();
		}
	})
	
	//обработка события по onChange на departmentDropdown
	$("#departmentDropdown").change(function() {
	
		var deptValue = $("#departmentDropdown option:selected").val();
		//проверка на нулевое положение areaDropdown select
		if (deptValue == "") {
			
			clearList(); //очистить departmentList
		} else {
			
			getList();
		}
	})
});