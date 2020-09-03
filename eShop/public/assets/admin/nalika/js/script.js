/*Updating Brand-Status using ajax*/
$(document).ready(function(){
    $('body').on('change', '#brandStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
            var status = 1;
        }else{
            var status = 0;
        }
        $.ajax({
            url: 'brandStatus/'+id+'/'+status,
            method: 'get',
            success: function(result){
                console.log(result);
            }
        });
    });

    /*Updating Category-Status using ajax*/
    $('body').on('change', '#categoryStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
            var status = 1;
        }else{
            var status = 0;
        }
        $.ajax({
            url: 'categoryStatus/'+id+'/'+status,
            method: 'get',
            success: function(result){
                console.log(result);
            }
        });
    });

    /*Updating subCategory-Status using ajax*/
    $('body').on('change', '#subCategoryStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
            var status = 1;
        }else{
            var status = 0;
        }
        $.ajax({
            url: 'subCategoryStatus/'+id+'/'+status,
            method: 'get',
            success: function(result){
                console.log(result);
            }
        });
    });

    /*Updating Slider-Status using ajax*/
    $('body').on('change', '#sliderStatus', function(){
        var id = $(this).attr('data-id');
        if(this.checked){
            var status = 1;
        }else{
            var status = 0;
        }
        $.ajax({
            url: 'sliderStatus/'+id+'/'+status,
            method: 'get',
            success: function(result){
                console.log(result);
            }
        });
    });
});


/*Delete conformation pop-up*/
$(document).on("click", "#delete", function(e) {
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Are you want to delete permanently!", function(confirmed) {
        if(confirmed){
            window.location.href = link;
        };
    });
});