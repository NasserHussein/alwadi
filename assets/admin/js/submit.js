$(document).ready(function(){
    $('.form-prevent-multiple-submits').on('submit',function(){
        $('.button-prevent-multiple-submits').attr('disabled', 'true');
        $('.spinner-button').show();
    })
});
