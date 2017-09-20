
//Floating labels//

$("input[type ='text']").click(function(){
    var $this = $(this);
    $this.attr("placeholder", "");
    $this.parent().find(".float-label").addClass("label-top");

});

//Ends here//
