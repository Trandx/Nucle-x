export default  {
    methods:{
        changeActiveMenu(event) {
        let elt = this.$el.querySelector('.'+this.activeCss.class)
        
        if(elt) {
            elt.classList.remove(...this.activeCss.value)

            elt.classList.add(...this.activeCss.default)
            
        }
        
        event.currentTarget.firstChild.classList.remove(...this.activeCss.default)
        event.currentTarget.firstChild.classList.add(...this.activeCss.value);
      }
    }
}
