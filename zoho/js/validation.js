function validations() {
console.log("validattion---"+$('#bill_to_email').val());

    $(".next-btn").prop('disabled', false);
//alert("inside validated");
    var org_name = $("#org_name").val();
    //Sold to contact information

    var sold_to_first_name = $('#sold_to_first_name').val();
    var sold_to_last_name = $('#sold_to_last_name').val();
    var sold_to_pnum = $('#sold_to_pnum').val();
    var sold_to_add_one = $('#sold_to_add_one').val();
    var sold_to_add_two = $('#sold_to_add_two').val();
    var sold_to_country = $('#sold_to_country').val();
    var sold_to_city = $('#sold_to_city').val();
    var sold_to_pcode = $('#sold_to_pcode').val();
    var sold_to_email = $('#sold_to_email').val();

    if(sold_to_country == "USA" || sold_to_country == "CAN")
        var sold_to_state = $('#sold_to_stateD').val();
    else
        var sold_to_state = $('#sold_to_stateT').val();

    //Bill to contact information

    var bill_to_email = $('#bill_to_email').val();
    var bill_to_display_name = $('#bill_to_display_name').val();
    var bill_to_first_name = $('#bill_to_first_name').val();
    var bill_to_last_name = $('#bill_to_last_name').val();
    var bill_to_pnum = $('#bill_to_pnum').val();
    var bill_to_add_one = $('#bill_to_add_one').val();
    var bill_to_add_two = $('#bill_to_add_two').val();
    var bill_to_country = $('#bill_to_country').val();
    var bill_to_city = $('#bill_to_city').val();
    var bill_to_pcode = $('#bill_to_pcode').val();

   
    if(bill_to_country == "USA" || bill_to_country == "CAN")
        var bill_to_state = $('#bill_to_stateD').val();
    else
        var bill_to_state = $('#bill_to_stateT').val();

    if(org_name == ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text("Required");
        return false;
    }else if(bill_to_display_name === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_display_name-span').text("Required");
        return false;
    }else if(bill_to_first_name === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_first_name-span').text("Required");
        return false;
    }else if(bill_to_last_name === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#bill_to_first_name-span').text(" ");
        $('#org_name-span').text(" ");
        $('#bill_to_last_name-span').text("Required");
        return false;
    }else if(!IsEmail(bill_to_email)){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_email-span').text("Required");
        return false;
    }else if(bill_to_country === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
        $('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_country-span').text("Required");
        return false;
    }else if(bill_to_add_one === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
        $('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_country-span').text(" ");
        $('#bill_to_add_one-span').text("Required");
        return false;
    }else if(bill_to_city === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
		$('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_add_one-span').text(" ");
        $('#bill_to_country-span').text(" ");
        $('#bill_to_city-span').text("Required");
        return false;
    }else if(bill_to_state === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
		$('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_city-span').text(" ");
        $('#bill_to_add_one-span').text(" ");
        $('#bill_to_country-span').text(" ");
        if(bill_to_country == "United States"){
            $('html, body').animate({
                scrollTop: 200
            }, 300);
            $('#bill_to_state-span').text("Required");
            return false;
        }
        else{
            $('html, body').animate({
                scrollTop: 200
            }, 300);
            $('#bill_to_state-span').text("Required");
            return false;
        }
    }else if(bill_to_pcode === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
		$('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_add_one-span').text(" ");
        $('#bill_to_country-span').text(" ");
        $('#bill_to_state-span').text(" ");
        $('#bill_to_city-span').text(" ");
        $('#bill_to_pcode-span').text("Required");
        return false;
    }else if(bill_to_pnum === ''){
        $('html, body').animate({
            scrollTop: 200
        }, 300);
        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
		$('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_add_one-span').text(" ");
        $('#bill_to_country-span').text(" ");
        $('#bill_to_state-span').text(" ");
        $('#bill_to_city-span').text(" ");
        $('#bill_to_pcode-span').text("");
        $('#bill_to_pnum-span').text("Required");
        return false;
    }else{

        $('#org_name-span').text(" ");
        $('#bill_to_email-span').text(" ");
		$('#bill_to_display_name-span').text(" ");
        $('#bill_to_first_name-span').text(" ");
        $('#bill_to_last_name-span').text(" ");
        $('#bill_to_pnum-span').text(" ");
        $('#bill_to_add_one-span').text(" ");
        $('#bill_to_country-span').text(" ");
        $('#bill_to_state-span').text(" ");
        $('#bill_to_city-span').text(" ");
        $('#bill_to_pcode-span').text("");

        sessionStorage.setItem('org_name',org_name);
        sessionStorage.setItem('bill_to_email',bill_to_email);
        sessionStorage.setItem('bill_to_display_name',bill_to_display_name);
        sessionStorage.setItem('bill_to_first_name',bill_to_first_name);
        sessionStorage.setItem('bill_to_last_name',bill_to_last_name);
        sessionStorage.setItem('bill_to_pnum',bill_to_pnum);
        sessionStorage.setItem('bill_to_add_one',bill_to_add_one);
        sessionStorage.setItem('bill_to_add_two',bill_to_add_two);
        sessionStorage.setItem('bill_to_country',bill_to_country);
        sessionStorage.setItem('bill_to_state',bill_to_state);
        sessionStorage.setItem('bill_to_city',bill_to_city);
        sessionStorage.setItem('bill_to_pcode',bill_to_pcode);

        /*if($("#billtosold").is(':checked')){
//alert("insidevalidatedif");
            document.getElementById("sold_to_pnum").value = bill_to_pnum;
			alert("sdfhdsf"+document.getElementById("sold_to_pnum").value);
            document.getElementById("sold_to_add_one").value = bill_to_add_one;
            document.getElementById("sold_to_add_two").value = bill_to_add_two;
            document.getElementById("sold_to_country").value = bill_to_country;

            if(bill_to_country == "USA" || bill_to_country == "CAN")
                document.getElementById("sold_to_stateD").value = bill_to_state;
            else
                document.getElementById("sold_to_stateT").value = bill_to_state;

            document.getElementById("sold_to_city").value = bill_to_city;
            document.getElementById("sold_to_pcode").value = bill_to_pcode;
//alert(document.getElementById("sold_to_pcode").value);
            sessionStorage.setItem('sold_to_pnum',bill_to_pnum);
            sessionStorage.setItem('sold_to_add_one',bill_to_add_one);
            sessionStorage.setItem('sold_to_add_two',bill_to_add_two);
            sessionStorage.setItem('sold_to_country',bill_to_country);
            sessionStorage.setItem('sold_to_state',bill_to_state);
            sessionStorage.setItem('sold_to_city',bill_to_city);
            sessionStorage.setItem('sold_to_pcode',bill_to_pcode);
//alert("end");
            return true;
        }
        else
        {
            $('html, body').animate({
                scrollTop: 200
            }, 300);
            soldtovalidation();

        }*/
		soldtovalidation();
    }

}

function soldtovalidation(){

    //Sold to contact information
	var sold_to_pnum = $('#sold_to_pnum').val();
    var sold_to_add_one = $('#sold_to_add_one').val();
    var sold_to_add_two = $('#sold_to_add_two').val();
    var sold_to_country = $('#sold_to_country').val();
    var sold_to_city = $('#sold_to_city').val();
    var sold_to_pcode = $('#sold_to_pcode').val();
    
    if(sold_to_country == "USA" || sold_to_country == "CAN")
        var sold_to_state = $('#sold_to_stateD').val();
    else
        var sold_to_state = $('#sold_to_stateT').val();

     if(sold_to_pnum === ''){
        $('#sold_to_pnum-span').text("Required");
        return false;
    }else if(sold_to_add_one === ''){
        $('#sold_to_pnum-span').text(" ");
        $('#sold_to_add_one-span').text("Required");
        return false;
    }else if(sold_to_country === ''){
        $('#sold_to_pnum-span').text(" ");
        $('#sold_to_add_one-span').text(" ");
        $('#sold_to_country-span').text("Required");
        return false;
    }else if(sold_to_state === ''){
        $('#sold_to_pnum-span').text(" ");
        $('#sold_to_add_one-span').text(" ");
        $('#sold_to_country-span').text(" ");
        $('#sold_to_state-span').text("Required");
        return false;

    }else if(sold_to_city === ''){
        $('#sold_to_pnum-span').text(" ");
        $('#sold_to_add_one-span').text(" ");
        $('#sold_to_country-span').text(" ");
        $('#sold_to_state-span').text(" ");
        $('#sold_to_city-span').text("Required");
        return false;
    }else if(sold_to_pcode === ''){
        $('#sold_to_pnum-span').text(" ");
        $('#sold_to_add_one-span').text(" ");
        $('#sold_to_country-span').text(" ");
        $('#sold_to_state-span').text(" ");
        $('#sold_to_city-span').text(" ");
        $('#sold_to_pcode-span').text("Required");
        return false;
    }else{
        sessionStorage.setItem('sold_to_pnum',sold_to_pnum);
        sessionStorage.setItem('sold_to_add_one',sold_to_add_one);
        sessionStorage.setItem('sold_to_add_two',sold_to_add_two);
        sessionStorage.setItem('sold_to_country',sold_to_country);
        sessionStorage.setItem('sold_to_state',sold_to_state);
        sessionStorage.setItem('sold_to_city',sold_to_city);
        sessionStorage.setItem('sold_to_pcode',sold_to_pcode);
         return true;
    }
}
