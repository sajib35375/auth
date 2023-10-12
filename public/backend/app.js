(function ($){

    $(document).ready(function (){
        $(document).on('change','input[name="image"]',function (e){
            e.preventDefault();
            let url = URL.createObjectURL(e.target.files[0]);
            $('img#img').attr('src',url).width('100px').height('100px');
        })
    })

    $(document).ready(function (){
        $(document).on('change','input[name="slider_img"]',function (e){
            e.preventDefault();
            let url = URL.createObjectURL(e.target.files[0]);
            $('img#img').attr('src',url).width('100px').height('100px');
        })
    })

})(jQuery)
