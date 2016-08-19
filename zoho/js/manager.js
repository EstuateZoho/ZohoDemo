
//Select option functionality for states based on the country
function prepareState(addr){
    var country = document.getElementById(addr).value;

    if(addr == "bill_to_country"){
        addr = "bill_to_state";
    } else if(addr == "sold_to_country"){
        addr = "sold_to_state";
    }
    var dropdown = addr.concat('D');
    var text = addr.concat('T');
    alert(country);
    if(country == "U.S.A"){
        //Toggles between Text field and drop down field

        document.getElementById(dropdown).style.display="inline";
        document.getElementById(text).style.display="none";
        document.getElementById(text).value='';
        //Fetch US states
        $.getJSON("backend/index.php?type=ReadUSState",
            function(data){
                console.log(data);
                var usStates = data.msg;
                console.log(data);
                var container = document.getElementById(dropdown);
                container.options[0] = new Option('\u2014 Select One \u2014', '');

                $i = 1;

                $.each(usStates, function(k, v){
                    container.options[$i] = new Option(v, k);
                    $i++;
                });
            });



    } else if (country == "Canada") {
        document.getElementById(dropdown).style.display="inline";
        document.getElementById(text).style.display="none";
        document.getElementById(text).value='';
        //Fetch Canadian states
        $.getJSON("backend/index.php?type=ReadCanadianState",
            function(data){

                var caStates = data.msg;

                var container = document.getElementById(dropdown);

                //Remove any previous entries
                removeOptions(container);
                container.options[0] = new Option('\u2014 Select One \u2014', '');

                $i = 1;

                $.each(caStates, function(k, v){
                    container.options[$i] = new Option(v, k);
                    $i++;
                });
            });

    } else if (country == "Puerto Rico") {
        document.getElementById(dropdown).style.display="inline";
        document.getElementById(text).style.display="none";
        document.getElementById(text).value='';
        var container = document.getElementById(dropdown);
        removeOptions(container);
        container.options[0] = new Option("Puerto Rico", "Puerto Rico");

    }else {
        document.getElementById(dropdown).style.display="none";
        document.getElementById(dropdown).value = '';
        document.getElementById(text).style.display="inline";
    }

    return true;
}

//Select option functionality for states based on the country with call backoption
function prepareState(addr, callback){
    var country = document.getElementById(addr).value;

    if(addr == "bill_to_country"){
        addr = "bill_to_state";
    } else if(addr == "sold_to_country"){
        addr = "sold_to_state";
    }
    var dropdown = addr.concat('D');
    var text = addr.concat('T');
    if(country == "U.S.A"){
        //Toggles between Text field and drop down field

        document.getElementById(dropdown).style.display="inline";
        document.getElementById(text).style.display="none";
        //Fetch US states
        $.getJSON("backend/index.php?type=ReadUSState",
            function(data){
                var usStates = data.msg;
                var container = document.getElementById(dropdown);
                container.options[0] = new Option('\u2014 Select One \u2014', '0');

                $i = 1;

                $.each(usStates, function(k, v){
                    container.options[$i] = new Option(v, k);
                    $i++;
                });
                if(typeof callback == 'function')
                    callback();
            });



    } else if (country == "Canada") {
        document.getElementById(dropdown).style.display="inline";
        document.getElementById(text).style.display="none";

        //Fetch Canadian states
        $.getJSON("backend/index.php?type=ReadCanadianState",
            function(data){
                var container = document.getElementById(dropdown);

                var caStates = data.msg;

                //Remove any previous entries
                removeOptions(container);
                container.options[0] = new Option('\u2014 Select One \u2014', '0');

                $i = 1;

                $.each(caStates, function(k, v){
                    container.options[$i] = new Option(v, k);
                    $i++;
                });
                if(typeof callback == 'function')
                    callback();
            });

    } else if (country == "Puerto Rico") {
        document.getElementById(dropdown).style.display="inline";
        document.getElementById(text).style.display="none";
        document.getElementById(text).value='';
        var container = document.getElementById(dropdown);
        removeOptions(container);
        container.options[0] = new Option("Puerto Rico", "Puerto Rico");

    } else {
        document.getElementById(dropdown).style.display="none";
        document.getElementById(dropdown).value = '';
        document.getElementById(text).style.display="inline";
    }



}


//Removes all options from a drop down box
function removeOptions(selectbox)
{
    var i;
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        selectbox.remove(i);
    }
}

/**
 * setSateDropDown sets the state input field as drop down
 * @param {var} type bill_to or sold_to state
 * @param {var} state value of the state
 *
 */
function setSateDropDown(type, state){
    console.log("State ISO is : " + state);

    if(type == "bill_to_state"){
        divA = document.getElementById('bill_to_stateD');
        divB = document.getElementById('bill_to_stateT');
    } else if(type == "sold_to_state"){
        divA = document.getElementById('sold_to_stateD');
        divB = document.getElementById('sold_to_stateT');
    }

    divA.value = state;
    divB.style.display = 'none';
    divA.style.display = 'inline';
}

/*
 validation for the bill to and sold to
 */

$(document).on('click', "#billtosold", function(event) {
    if(this.checked)
        $('#soldto').fadeOut('slow');
    else
        $('#soldto').fadeIn('slow');

});