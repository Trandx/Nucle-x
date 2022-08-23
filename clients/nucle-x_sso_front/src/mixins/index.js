 import $ from 'jquery'
// import M from 'materialize-css'
export default {
    methods: {
      fieldRequired(elt){
        return (this.radioInputErrorFadeIn(elt) || this.selectInputErrorFadeIn(elt))? true:false
      },

      requiredField(elt){
        $(elt).attr('required', true)
      },
     selectInputErrorFadeOut(){
        
        $('body').on('change', 'select', function(){
          $(this).parent().find('.errorMssg').fadeOut()
        })
      },
     selectInputErrorFadeIn(form){
      window.test = false
        $(form+" .selectRequired").each(function() { 
          let errorMssg = $(this).find('.errorMssg')
          let select = $(this).find('select').val()
          //console.log(select)
          if(select == "" || select == null){
            errorMssg.fadeIn()
            window.test = true
          }
          
        });
      
         return window.test
      },
      radioInputErrorFadeOut(){
        
        $('body').on('focusin', 'input[type=radio]', function(){
          $(this).parent().parent().parent().find('.errorMssg').fadeOut()
        })
      },
      radioInputErrorFadeIn(form){
       window.test = false
       $(form+" .radioRequired").each(function() { 
          let errorMssg = $(this).find('.errorMssg')
          let radio = $(this).find('input[type=radio]:checked')

          if(radio.length == 0){
            errorMssg.fadeIn()
            window.test = true
          }
          
        });
      
        return window.test 

      },
        addPhoneField(phones){

            if(phones.length < 3){

              phones.push(null) // add a null field on phone array
              this.isRequired = true

            }

            if(phones.length >= 3){
              // remove add btn
              this.btnDisable = "disabled"

            }
            
          },
          removePhoneField(phones){
            phones.pop()
            this.btnDisable = null
          },
      },
};