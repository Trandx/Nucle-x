import $ from 'jquery'
// import M from 'materialize-css'
export default {
    methods: {
        next1(){
            $('.step1').css({"transform": "translateX(-305px)"}).addClass('slide')
            $('.step2').css({"transform": "translateX(0)"}).removeClass('slide') 
            $('#progress').css({"width": "200px"})
        },
        next2(){
            $('.step2').css({"transform": "translateX(730px)"}).addClass('slide')
            $('.step3').css({"transform": "translateX(0)"}).removeClass('slide') 
            $('#progress').css({"width": "290px"})  
        },
        slideReset(){
            
            $('.step-item').each(function(key) {  
                if(key == 0){
                    $(this).css({"transform": "unset"}).removeClass('slide') 
                }else{
                    $(this).css({"transform": "unset"}).addClass('slide') 
                }
                
            })
            $('#progress').css({"width": "100px"})
        }
    }
}