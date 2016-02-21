/**
 * Created by felipe on 25/11/15.
 */


function addItem (e){

    var $detalles = $("ul.items");
    var $index = $detalles.data('index') || 0;
    var $detalle = $detalles.attr("data-prototype").replace(/__name__/g, $index );
    var $li = $('<li></li>').append($detalle);
    //var $removeFormA = $('<div class="form-group"><a href="#" class="delete_item"> <span  class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a></div>');
    //$li.children().append($removeFormA);
    $detalles.append( $li);

    $detalles.data('index', $index + 1);
};

function deleteItem(e){
    e.preventDefault();
    $(this).parent().parent().remove();
    $(".subtotal").trigger("keyup");

};

function style(){
    //$(".item_importe, .item_detalle").parent().addClass("form-group");
    //$(".item_importe").parent().addClass("form-group")
    $("li .form-group").css("float", "left");
    $("li .form-group:first-of-type").css("clear", "left");
    $(".item_importe").parent().addClass("col-lg-3");
    $(".item_bienes").parent().addClass("col-lg-4");
    $("ul li").css("list-style-type", "none");

}
jQuery(document).ready(function () {

    $("body").delegate("#addItem", "click", addItem);
    $("body").delegate(".delete_item", "click", deleteItem);
    //$("body").delegate("#addItem", "click", style);

    $("body").delegate(".conceptoTipo", "change", function () {

        var id = parseInt(jQuery(this).find("option:selected").attr("value"));

        if(id === 1){
            $("#appbundle_factura_fechaServicioInicio, #appbundle_factura_fechaServicioFin, #appbundle_factura_fechaVencimiento").parent().parent().parent().css("display", "none")
        }else{
            $("#appbundle_factura_fechaServicioInicio, #appbundle_factura_fechaServicioFin, #appbundle_factura_fechaVencimiento").parent().parent().parent().css("display", "block")
        }

        var productName = (jQuery(this).attr("name"));
        var priceName = productName.replace("product", "price");



    });

    var d = new Date();
    var today_day = d.getDate();
    var today_month = d.getMonth();
    var today_year = d.getFullYear();

    var today_hour = d.getHours();
    var today_minutes = d.getMinutes();


    var day = $("select[name='appbundle_factura[fechaEmision][date][day]']").find("option[value=" + today_day +"]");
    day.attr("selected", "selected");

    var month = $("select[name='appbundle_factura[fechaEmision][date][month]']").find("option[value=" + today_month +"]");
    month.attr("selected", "selected");

    var year = $("select[name='appbundle_factura[fechaEmision][date][year]']").find("option[value=" + today_year +"]");
    year.attr("selected", "selected");

    var hour = $("select[name='appbundle_factura[fechaEmision][time][hour]']").find("option[value=" + today_hour +"]");
    hour.attr("selected", "selected");

    var minute = $("select[name='appbundle_factura[fechaEmision][time][minute]']").find("option[value=" + today_minutes +"]");
    minute.attr("selected", "selected");


    var path = window.location.pathname;

    var pos = path.search(/factura\/new/);
    if (pos > 0) {
        $("#addItem").trigger("click");
    }

    $("body").delegate(".product", "change", function () {

        var id = parseInt(jQuery(this).find("option:selected").attr("value"));

        var productName = (jQuery(this).attr("name"));
        var priceName = productName.replace("bienes", "precioUnitario");
        var porcentajeIvaName = productName.replace("bienes", "porcentajeIva");

        if(isNaN(id ))
            return;
        $.get("app_dev.php/bienes/api/" + id, function (data, status) {
            $("input[name='" + priceName + "']").val(data.precio);
            $("input[name='" + porcentajeIvaName + "']").val(data.categoria.iva_tipo.porcentaje);

        });

    });

    $("body").delegate(".item_cantidad", "keyup", function (){
        var element = jQuery(this);


        var elementName = element.attr("name");
        var priceName = elementName.replace('cantidad', 'precioUnitario');
        var subtotalName = elementName.replace('cantidad', 'importe');
        var porcentajeIvaName = elementName.replace("cantidad", "porcentajeIva");
        var ivaName = elementName.replace("cantidad", "iva");



        var priceElement = $("input[name='" + priceName + "']");
        var subtotalElement = $("input[name='" + subtotalName + "']");
        var porcentajeIvaElement = $("input[name='" + porcentajeIvaName + "']");
        var ivaElement = $("input[name='" + ivaName + "']");

        var qty = parseFloat( element.val() );
        var price = parseFloat( priceElement.val() );
        var porcentaje = parseFloat( porcentajeIvaElement.val() );

        var subtotal = qty * price;
        var monto_iva = subtotal  * porcentaje ;
        var importe = monto_iva + subtotal;
        subtotalElement.val(importe);
        ivaElement.val( monto_iva );

    });

    $("body").delegate(".item_cantidad,.product,.item_precioUnitario, .item_importe", "keyup", function (e){
        var sum = 0;
        $(".item_importe").each(function () {
            if (!isNaN(this.value) && this.value.length !== 0) {
                sum += parseFloat(this.value);
            }
        });
        $("#appbundle_factura_total").val(sum.toFixed(2));
    });

    $("body").delegate("#goBack", "click", function (e){
        var path = window.location.pathname;
        var pos = path.search(/\/new/);
        var newPath ;
        if (pos > 0) {
            newPath = path.replace(/\/new/, '');
            location.href=newPath;
            return;
        }
        pos = path.search(/\/\d+\/edit/);
        if (pos > 0) {
            newPath = path.replace(/\/\d+\/edit/, '');
            location.href=newPath;
            return;
        }

        pos = path.search(/\/edit/);
        if (pos > 0) {
            newPath = path.replace(/\/edit/, '');
            location.href=newPath;
            return;
        }
        pos = path.search(/\/change-password/);
        if (pos > 0) {
            newPath = path.replace(/\/change-password/, '');
            location.href=newPath;
            return;
        }

            newPath = path.replace(/\d+$/, '');
            location.href=newPath;
            return;

    });

    $("body").delegate("#newEntity", "click", function (e){
        var path = window.location.pathname;
        var newPath = path + "new" ;
        location.href=newPath;
        return;
    });

    $("body").delegate("#changePassword", "click", function (e){
        var path = window.location.pathname;
        path = path.replace(/\/edit/, '');

        var newPath = path + "/change-password" ;
        location.href=newPath;
        return;
    });

    $("body").delegate("#editEntity", "click", function (e){
        var path = window.location.pathname;
        var newPath = path + "/edit" ;
        location.href=newPath;
        return;
    });


    $("body").delegate("#saveEntity", "click", function (e){
        $("button[name='appbundle_category[submit]'], button[name='appbundle_person[submit]'], button[name='appbundle_product[submit]'],  button[name='appbundle_operation[submit]'] ,button[name='appbundle_user[submit]']").click();
    });

    $("body").delegate("#deleteEntity", "click", function (e){
        $("button[name='form[submit]']").click();
    });

    $("body").delegate("#deleteOperation", "click", function (e){
        $("button[name='form[submit]']").click();
    });


    pos = path.search(/sale\/new|sale\/\d+\/edit/);
    if (pos > 0) {
        $("body").delegate(".qty", "keyup", function (){
            var element = jQuery(this);


            var elementName = element.attr("name");
            var priceName = elementName.replace('qty', 'price');
            var subtotalName = elementName.replace('qty', 'subtotal');


            var priceElement = $("input[name='" + priceName + "']");
            var subtotalElement = $("input[name='" + subtotalName + "']");

            var qty = parseFloat( element.val() );
            var price = parseFloat( priceElement.val() );


            subtotalElement.val((qty * price).toFixed(2));


        });
        $("body").delegate(".price", "keyup", function (){
            var element = jQuery(this);


            var elementName = element.attr("name");
            var qtyName = elementName.replace('price', 'qty');
            var subtotalName = elementName.replace('price', 'subtotal');


            var qtyElement = $("input[name='" + qtyName + "']");
            var subtotalElement = $("input[name='" + subtotalName + "']");

            var price = parseFloat( element.val() );
            var qty = parseFloat( qtyElement.val() );


            subtotalElement.val((qty * price).toFixed(2));


        });


        $("body").delegate(".subtotal", "keyup",  function (){
            var element = jQuery(this);


            var elementName = element.attr("name");
            var qtyName = elementName.replace('subtotal', 'qty');
            var priceName = elementName.replace('subtotal', 'price');


            var qtyElement = $("input[name='" + qtyName + "']");
            var priceElement = $("input[name='" + priceName + "']");

            var subtotal = parseFloat( element.val() );
            var price = parseFloat( priceElement.val() );


            qtyElement.val((subtotal / price).toFixed(2));


        });

        $("body").delegate(".product", "change", function () {

            var id = parseInt(jQuery(this).find("option:selected").attr("value"));

            var productName = (jQuery(this).attr("name"));
            var priceName = productName.replace("product", "price");

            if(isNaN(id ))
                return;
            $.get("app_dev.php/product/api/" + id, function (data, status) {
                $("input[name='" + priceName + "']").val(data.price);


            });

        });

        $("body").delegate(".qty,.cost,.subtotal", "keyup", function (e){
            var sum = 0;
            $(".subtotal").each(function () {
                if (!isNaN(this.value) && this.value.length !== 0) {
                    sum += parseFloat(this.value);
                }
            });
            $(".total").val(sum.toFixed(2));
        });
    }








});
