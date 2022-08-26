
export default {
    methods: {
        openCredentialClient(client){
            this.$refs.modal.open = true;
            this.modalData.title = "Credentiels of "+client.name
            this.view.name = "CredentialClient"
            this.view.datas = client
        },
        openCreate(componentName, title){
            this.$refs.modal.open = true;
            this.modalData.title = "create new "+title
            this.view.name = componentName
             this.view.datas = null
        },

        openEdit(componentName, datas, title){
            
            this.$refs.modal.open = true;
            this.modalData.title = "edit "+title
            this.view.name = componentName
            this.view.datas = datas

        },

        openDelete(name){
            this.$refs.modalComfirm.open = true;
            this.modalComfirm.message = `Are you sure to delete ${name} ?`
        },

    }
}