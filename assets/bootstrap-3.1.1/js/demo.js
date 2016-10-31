$(function() {

    // var availableTags = [
    //   "departamento",
    //   "Sao Paulo",
    //   "Flamengo",
    //   "Palmeiras",
    //   "Vasco",
    //   "Ceara",
    //   "C",
    //   "C++",
    //   "Campo grande mato grosso do sul",
    //   "rio grande do norte",
    //   "Java",
    //   "JavaScript",
    //   "Lisp",
    //   "Perl",
    //   "PHP",
    //   "Python",
    //   "Ruby",
    //   "Scheme"
    // ];
    // url: "<?php echo site_url('welcome/get_jenis');?>",
    var availableTags = "<?php echo site_url('product/search');?>";

 //    alert(availableTags);
        
        
 //    $("#mostrar").autocomplete({
	// 	source: availableTags,
	// 	appendTo: $("form:first")
	// });
	
	// $("#mostrar").data( "ui-autocomplete" )._renderMenu = function( ul, items ) {
	// 	var that = this;		
	// 	ul.attr("class", "nav nav-pills nav-stacked");
	// 	$.each( items, function( index, item ) {
	// 		that._renderItemData( ul, item );
	// 	});
	// };	    
    
});


// <script>
//      $(function () {
//         $("#buscaComplete").autocomplete({
//             minLength:0,
//             delay:0,
//             source:'<?php echo site_url('welcome/get_dados'); ?>',
//             select:function(event, ui){
//                 $('#name').val(ui.item.description);
//                 }
//             });
//         });
//     </script>