import $ from 'jquery'
import M from 'materialize-css'
export default {
    methods: {
        listLang(){
          this.listLangs.keys = process.env.VUE_APP_I18N_SUPPORTED_LOCALE.split(','); 
          this.listLangs.vals = process.env.VUE_APP_LANGS.split(',')
        },
        changeLanguage()
        {
        
          //console.log(this.lang)

            this.$i18n.locale = this.lang
            localStorage.setItem("lang", this.lang)
            this.changeTitle()
            //console.log( this.$route)

            let pathLang = this.$route.params.lang // get a route language
            let fullPath = this.$route.fullPath // get a fullpath of route
            let path = fullPath.split(`/${pathLang}`)[1]; 
            //console.log(path)

            this.$router.push({ path: `/${this.lang}${path}`})

         /* if (this.$i18n.locale === "en")
          {
            this.$i18n.locale = "en"
            localStorage.setItem("lang", "en")
            this.changeTitle()
          }
          else
          {
            this.$i18n.locale = "en"
            localStorage.setItem("lang", "en")
            this.changeTitle()
          }
          */
        },
    
        changeTitle(){
           document.title = this.$i18n.t("views."+this.JsonComponentName+".title")
        },
        getGoodLang(){

          let pathLang = this.$route.params.lang // get a route language
          this.$i18n.locale = pathLang
          localStorage.setItem("lang", pathLang)

          this.changeTitle()

          return pathLang
        },
        updateSelect(lang){
           /// initialize materialize
            //M.FormSelect.init();
            $('select option[value="'+lang+'"]').prop('selected', true);
           
            M.AutoInit();

            $(".dropdown-content li:not(.disabled) span").css({"color":"#000"})
            $(".select-wrapper input.select-dropdown").css({"color":"#fff"})
        }
      },
};