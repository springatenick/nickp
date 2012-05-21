//�������: �������� countryDropdown value � getarea.php
function getArea() {
	var countryValue = $("#countryDropdown option:selected").val();
	var area = $("#areaDropdown");
	
	area.attr("disabled",false);
	area.load("model/getarea.php",{country : countryValue});
}

//�������: �������� areaDropdown value � getdept.php
function getDept() {
	var countryValue = $("#countryDropdown option:selected").val();
	var areaValue = $("#areaDropdown option:selected").val();
	var dept = $("#departmentDropdown");
	
	dept.attr("disabled",false);
	dept.load("model/getdept.php",{area : areaValue});
}

//�������: �������� departmentDropdown value � getList.php
function getList() {
	var countryValue = $("#countryDropdown option:selected").val();
	var areaValue = $("#areaDropdown option:selected").val();
	var deptValue = $("#departmentDropdown option:selected").val();
	var list = $("#departmentList");
		
	list.show("slow");
	list.load("model/getlist.php",{department : deptValue});
}

//�������: ��������� areaDropdown
function clearArea() {

	var area = $("#areaDropdown");
	area.empty();		
	area.attr("disabled",true);
	//alert ("clearArea");
}

//�������: ��������� departmentDropdown
function clearDept() {
	
	var dept = $("#departmentDropdown");
	dept.empty();
	dept.attr("disabled",true);
}

//�������: ��������� departmentList
function clearList() {
	
	var list = $("#departmentList");
	//list.empty();
	//list.attr("disabled",true);
	list.hide("slow");
}


//��������� ����� p_name � p_phone
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
//����� �����
//

$(document).ready(function() {
	
	//��������� ������� �� onChange �� countryDropdown
	$("#countryDropdown").change(function() {
		
		var countryValue = $("#countryDropdown option:selected").val();
		//�������� �� ������� ��������� countryDropdown select
		if (countryValue == "") {
		
			clearArea(); //�������� areaDropdown
			clearDept(); //�������� departmentDropdown
			clearList();
		} else {
			
			getArea();
			clearDept();
			clearList();
		}
	})

	//��������� ������� �� onChange �� areaDropdown
	$("#areaDropdown").change(function() {
	
		var areaValue = $("#areaDropdown option:selected").val();
		//�������� �� ������� ��������� areaDropdown select
		if (areaValue == "") {
			
			clearDept(); //�������� departmentDropdown select
			clearList();
		} else {
			
			getDept();
		}
	})
	
	//��������� ������� �� onChange �� departmentDropdown
	$("#departmentDropdown").change(function() {
	
		var deptValue = $("#departmentDropdown option:selected").val();
		//�������� �� ������� ��������� areaDropdown select
		if (deptValue == "") {
			
			clearList(); //�������� departmentList
		} else {
			
			getList();
		}
	})
});