
    function ajaxCall() {
        this.send = function(data, url, method, success, type) {
            console.log(data);
          type = type||'json';
          var successRes = function(data) {
              success(data);
          };
            var errorRes = function(e) {
              console.log(e);
              alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
          };
            $.ajax({
                url: url,
                type: method,
                data: { data ,'_token':$("input[name=_token]").val() },
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

          }

        }

function locationInfo() {
    var rootUrl = $("input[name=countries_route]").val();
    //var rootUrl = "api.php";
    var call = new ajaxCall();

    this.getCities = function(id) {

        $(".cities option:gt(0)").remove();
        var url = rootUrl+'?type=getCities&countryId=' + id;
        var method = "post";
        var data = {};
        $('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.cities').find("option:eq(0)").html("Select City");
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.cities').append(option);
                });
                $(".cities").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getCountries = function() {
        var url = rootUrl+'?type=getCountries';
        var method = "post";
        var data = {};
        var job_post_type = $('#job_post_type').val();
        if (job_post_type != 3){
            $('.countries').find("option:eq(0)").html("Please wait..");
        }

        call.send(data, url, method, function(data) {
            $('.countries').find("option:eq(0)").html("Select Country");
            /*console.log(data);*/
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.countries').append(option);
                });
                $(".countries").prop("disabled",false);

                var job_post_type = $('#job_post_type').val();
                if (job_post_type == 2){
                    var country_id_value = $('#country_id').val();
                    $("#countryId").val(country_id_value);
                }
            }
            else{
                alert(data.msg);
            }
        });
    };

}

$(function() {
var loc = new locationInfo();
    loc.getCountries();
 $(".countries").on("change", function(ev) {
        var countryId = $(this).val();
        var countryName = $("#countryId option:selected").text();
        $('input[name="country_name"]').val(countryName);

        if(countryId != ''){
        loc.getCities(countryId);
        }
        else{
            $(".cities option:gt(0)").remove();
        }
    });
 $(".cities").on("change", function(ev) {
        var cityId = $(this).val();
     var cityName = $("#cityId option:selected").text();
     $('input[name="city_name"]').val(cityName);

    });
    $(".currency").on("change", function(ev) {
        var currencyId = $(this).val();
        var currencyName = $("#currency option:selected").text();
        $('input[name="currency_name"]').val(currencyName);

    });
});


