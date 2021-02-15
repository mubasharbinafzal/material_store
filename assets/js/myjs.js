
$(document).ready(function(){
    
    var globel_bool = 0;
   //  $('#items_id').select2();

 $('#stock_table').DataTable({
    "order": [[ 0, 'desc' ]]
});

 $('#customer_table').DataTable( {
    "order": [[ 0, 'desc' ]]
});
 
    $(".pagination li a").addClass("page-link"); // add class in pagination page link

    $('#country').change(function(){    // on change add country state or city
    	var country_id = $('#country').val();
    	if(country_id != ''){

    		$.ajax({
    			url:"dynamic_dependent/fetch_state",
    			method: "POST",
    			data:{country_id:country_id},
    			success:function(data)
    			{
                    $('#state').html(data);
                    $('#city').html('<option value="">Select City</option>');
    				
    			}
    		});
    	}else{
            
            $('#state').html('<option value="">Select state</option>');
            $('#city').html('<option value="">Select City</option>');
        }
    });


      $('#state').change(function(){    // on change add country state or city
        var state_id = $('#state').val();
        if(state_id != ''){

            $.ajax({
                url:"dynamic_dependent/fetch_city",
                method: "POST",
                data:{state_id:state_id},
                success:function(data)
                {
                    $('#city').html(data);
                }
            });
        }else{

            $('#state').html('<option value="">Select state</option>');
            $('#city').html('<option value="">Select City</option>');
        }
    });





// set qty and size in ft
var i, qty_option, stock_no, select_qty; 
$("#items_id").change(function() {

    stock_no = $("#items_id").val();

    if (stock_no !='') {
        $.ajax({
            url: base_url+"admin/get_qty",
            method: "POST",
            data: "stock_no=" + stock_no, //pass your required data here
          
            success: function(data) {
                data = JSON.parse(data); 
                qty = data[0].rem_qty;
                sizein_ft = data[0].sizein_ft;
                qty_option = "";
                if (qty == 0) {
                    $('#qty').html('<option value="">No Quantity</option>');
                } else {
                    for (i = 1; i <= qty; i++) {

                        qty_option += "<option value=" + i + ">" + i + "</option>";
                    }

                    $('#qty').html(qty_option);
                }
                
                   sizein_ft_option = "";
                if (sizein_ft == 0) {
                    $('#qty').html('<option value="0">ft is not avalible</option>');
                } else {
                        for (i = 0.5; i <= sizein_ft; i = i+0.5) {

                        sizein_ft_option += "<option value=" + i + ">" + i + "</option>";
                    }

                    $('#sizein_ft').html(sizein_ft_option);
                }

            }
        });
    } else {

        $('#qty').html('<option value="">There is no scock value</option>');
        $('#sizein_ft').html('<option value="">There is no scock value</option>');
    }
});
      // set qty
 
$('#invoice_form').on('submit', function(event){
    event.preventDefault(); 
    $("#submitBtn").attr("disabled", true);
    var main_invoice_id = $("input[name=main_invoice_id]").val(); 
    var form_data = $(this).serialize();  
    $.ajax({ 
        method:"POST",
        url: base_url+"Admin/add_invoice_items",
        data: form_data,
        success:function(data)
        {
           // $('#invoice_form')[0].reset(); 
           $('#items_id').val("");
            genrate_invice(); 
            $('#stock_remaining_ajax').DataTable().ajax.reload();
            $("#submitBtn").attr("disabled", false); 
             $('#stock_remaining_ajax_wrapper input').focus();// focus on search items
        }
    })
});
 
// page invoice functions 
  genrate_invice();
function genrate_invice()
{ 
var url = $(location).attr('href');
var parts = url.split("/");
var main_invoice_id = parts[parts.length-1];
  $.ajax({
    url: base_url+"Admin/selected_items/"+main_invoice_id,
    method:"POST",  
    success:function(data)
    {   
        $('#display_invoice_items').html(data);
    }
  })
}

remaining_stock();

function remaining_stock()
{
    $('#stock_remaining_ajax').DataTable({
        "ajax" : base_url+"Admin/get_invoice_remaining_stock", 
        "order": [],
    });

}

 $('#stock_remaining_ajax_wrapper input').focus();// focus on search items
 
 $('#stock_remaining_ajax_wrapper input').on('focusout', function(e) {
     $('#items_id').focus(); 
      e.preventDefault();
 });
    
  // add stock focus 
     $('#add_section').focus();// focus on search items

});



