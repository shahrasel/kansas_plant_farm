jQuery( function() {
    $(".minicart-remove").on('click', function (e){
        e.preventDefault();
        var $form = $(this).parent();
        $.ajax({
            url: $form.data('url'),
            method: 'POST',
            data: $form.serialize(),
            success: function (data) {
                $("#cart_div").html(data);
            },
            error: function (message) {

            }
        });
    });

    $(".delete_btn a").on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('ref');
        //console.log(id);
        var $form = $(".main_cart_form_"+id);
        $.ajax({
            url: $form.data('url'),
            method: 'POST',
            data: $form.serialize(),
            success: function (data) {
                $("#cart_div").html(data);
            },
            error: function (message) {

            }
        });
    })


    //var ifModalClosed = 0;
    if($( "#shop_by_color" ).length) {
        $(window).scroll(function () {
            console.log(ifModalClosed);
            if(ifModalClosed != 1) {
                let indicatorPosition = $('#shop_by_color').offset().top;
                var totalScroll = $(window).scrollTop();
                if (totalScroll > indicatorPosition) {
                    if ($("#myModal").css('display') != 'block')
                    $("#myModal").fadeIn("slow");
                }
            }
        });
    }

    // Close the Modal
    $("#close_modal").on('click', function (e) {
        e.preventDefault();
        ifModalClosed = 1;
        $("#myModal").fadeOut("slow");
    });

    $("#sign_for_feed").on('submit', function (e){
        e.preventDefault();
        var $form = $(e.currentTarget);

        $.ajax({
            url: $form.data('url'),
            method: 'POST',
            data: $form.serialize(),
            success: function (data) {
                $form.find(".row").html("<div class=\"col-lg-12\" style='padding-top:120px;text-align: center'><h3>Thank You</h3><p>Your information is successfully inserted into our database.</p></div>");
                setTimeout(function () {
                    $("#myModal").fadeOut("slow");
                    ifModalClosed = 1;
                }, 3000);
            },
            error: function (message) {
                var errordata = JSON.parse(message.responseText);
                $form.find(":input").each(function () {
                    var fieldname = $(this).attr('name');
                    if(errordata.errors[fieldname]) {
                        //console.log(errordata.errors[fieldname][0]);
                        $("#"+fieldname).parent().find(".error_block").remove();
                        $("#"+fieldname).parent().append('<span class="error_block">'+errordata.errors[fieldname][0]+'</span>');
                    }

                })
            },

        })
    });

    jQuery.widget( "custom.catcomplete", jQuery.ui.autocomplete, {
        _create: function() {
            this._super();
            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
        },
        _renderMenu: function( ul, items ) {
            var that = this,
            currentCategory = "";
            jQuery.each( items, function( index, item ) {
                var li;
                if ( item.category != currentCategory ) {
                    ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                    currentCategory = item.category;
                }
                li = that._renderItemData( ul, item );
                if ( item.category ) {
                    li.attr( "aria-label", item.category + " : " + item.label );
                }
            });
        }
    });
    //var data = @json($product->getAllProductsNames());
    jQuery( "#search_store" ).catcomplete({
        delay: 0,
        source: data,
        select: function (event, ui) {
            var label = ui.item.label;
            var value = ui.item.value;
            //alert(ui.item.slug);


            jQuery("#search_store_form").attr('action', $("#search_store_form").data('url')+"/"+ui.item.slug);
            jQuery("#search_store_form").submit();
        }
    });

    jQuery( "#search_store2" ).catcomplete({
        delay: 0,
        source: data,
        select: function (event, ui) {
            var label = ui.item.label;
            var value = ui.item.value;
            //alert(ui.item.slug);

            //jQuery("#search_store_form2").attr('action',"{{ url('/plants') }}/"+ui.item.slug);
            jQuery("#search_store_form2").attr('action',$("#search_store_form").data('url')+"/"+ui.item.slug);
            jQuery("#search_store_form2").submit();
        }
    });

    jQuery.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
});

function submitMobileForm() {
    $("#cat_form2").submit();
}
function showFilterDiv() {
    jQuery("#filter_div").slideToggle("slow","swing", function(){
        if(jQuery("#filter_div").css('display') == 'none') {
            $('html, body').css({
                overflow: 'auto',
                height: 'auto'
            });
            $("#filteranchor").css('display','block');
            $("#filterselanchor").css('display','none');
        }
        else {

            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            });
            $("#filteranchor").css('display','none');
            $("#filterselanchor").css('display','block');
        }
    });
}



function hideAllPrice() {
    jQuery("#44_size_price").css('display','none');
    jQuery("#55gal_size_price").css('display','none');
    jQuery("#flat66_size_price").css('display','none');
}

function change_price(id, user_type) {
    $.ajax({url: "../get-product-price?id="+id+"&user_type="+user_type+"&size="+jQuery('#size_select_box').val(), success: function(retval){
            var result = $.parseJSON(retval);
            if(user_type == 'contractor') {
                if(result['price'][0]) {
                    jQuery(".price-regular-ajax-contractor").html('$' + result['price'][0]);
                    jQuery("#unit_price_contractor").val(result['price'][0]);

                    if(parseInt(result['available'])>0) {
                        if(parseInt(result['available']) >= 10)
                            jQuery("#product_count").html('Currently '+parseInt(result['available'])+' in stock');
                        else
                            jQuery("#product_count").html('Only '+parseInt(result['available'])+' in stock');

                        jQuery("#max_item").val(result['available']);
                        jQuery("#pot_size").val(result['pot_size']);
                        jQuery("#quantity").val(1);

                    }
                }
            }
            else {
                if(result['price'][0]) {
                    jQuery(".price-regular-ajax").html('$' + result['price'][0]);
                    jQuery("#unit_price_user1").val(result['price'][0]);
                    jQuery("#unit_price_user2").val(result['price'][0]);
                }

                if(result['price'][1])
                    jQuery(".price-old-ajax").html('<del>$'+result['price'][1]+'</del>');


                if(user_type == 'superadmin') {
                    if (parseInt(result['available']) >= 10)
                        jQuery("#product_count").html('This size ' + parseInt(result['available']) + ' in stock');
                    else
                        jQuery("#product_count").html('This size ' + parseInt(result['available']) + ' in stock');


                    jQuery("#addtocart_btn").removeClass('d-none');
                    jQuery("#addtocart_btn").addClass('d-flex');
                    jQuery("#addtocart_btn").css('display','block');
                    jQuery("#max_item").val(1000);
                    jQuery("#pot_size").val('a');
                    jQuery("#quantity").val(1);
                }
                else {
                    if (isNaN(parseInt(result['available']))) {
                        jQuery("#product_count").html('THIS SIZE NOT AVAILABLE');
                        jQuery("#addtocart_btn").removeClass('d-flex');
                        jQuery("#addtocart_btn").addClass('d-none');
                    }
                    else {
                        if (parseInt(result['available']) > 0) {

                            if (parseInt(result['available']) >= 10)
                                jQuery("#product_count").html('This size ' + parseInt(result['available']) + ' in stock');
                            else
                                jQuery("#product_count").html('This size ' + parseInt(result['available']) + ' in stock');

                            //jQuery("#addtocart_btn").css('display', 'block');
                            jQuery("#addtocart_btn").removeClass('d-none');
                            jQuery("#addtocart_btn").addClass('d-flex');
                            jQuery("#addtocart_btn").css('display','block');
                            jQuery("#max_item").val(result['available']);
                            jQuery("#pot_size").val(result['pot_size']);
                            jQuery("#quantity").val(1);

                        }
                        else {
                            jQuery("#product_count").html('THIS SIZE NOT AVAILABLE');

                            jQuery("#addtocart_btn").removeClass('d-flex');
                            jQuery("#addtocart_btn").addClass('d-none');
                        }
                    }
                }
            }
        }});
}

/*function wishlist_form_submit(formid) {
    //alert(formid);
    $.ajax({
        url: "{{ url('/add-to-wishlist') }}",
        type: "POST",
        data: $("#wishlist_form_"+formid).serialize(),
        success: function(msg) {
            if(msg == 'Added to the wishlist successfully!') {
                $("#like_active").addClass('like_active');
                $("#wish_text").html('Added to wishlist');
            }
            else if(msg == 'Removed from the wishlist successfully!') {
                $("#like_active").removeClass('like_active');
                $("#wish_text").html('Add to wishlist');
            }
        }
    });
}*/
