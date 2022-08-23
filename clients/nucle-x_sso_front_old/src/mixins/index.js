export default function(elt = null){
    return customJs.$(elt)
}

let customJs = {
    selectedElts: null,
    $: function(elt = null){
        if(!elt){
            
            return document
        }

        this.selectedElts = document.querySelectorAll('elt')
        
        return this

    },
    on : function ( event, selectorOrFunc, handler = "") {

        if(typeof selectorOrFunc == "function"){
            
            this.selectedElts.map((elt) => {
                elt.addEventListener(event, function(evt){
                    selectorOrFunc(evt)
                })
            })
            
            return this

        }else{
            if (typeof selectorOrFunc == "string") {

                let rootElement = document.querySelector('body');
                //since the root element is set to be body for our current dealings
                rootElement.addEventListener(event, function (evt) {
                        var targetElement = evt.target;
                        while (targetElement != null) {
                            if (targetElement.matches(selectorOrFunc)) {
                                handler(evt);
                                return;
                            }
                            targetElement = targetElement.parentElement;
                        }
                    },
                    true
                );
                
                return this

            } else {
                
                return console.error("parameter 2 will be a String or a Function");

            }
        }
        
    }

}
