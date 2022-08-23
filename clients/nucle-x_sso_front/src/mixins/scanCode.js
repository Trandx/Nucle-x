// import $ from 'jquery'
// // import M from 'materialize-css'
import {Html5Qrcode} from "html5-qrcode"
export default {
    data (){
        return {
            cameraIndexed: 0,
            cameraList : {},
            html5QrCode : null,
            scanState: false
        }
    },
    methods: {
        scanCodeOnFile(eltId, callback, eltShowFileId = null){
            this.html5QrCode = new Html5Qrcode(eltShowFileId??'scanCode')

            this.eltId = document.getElementById(eltId);

            this.eltId.addEventListener('change', e => {

                if (e.target.files.length == 0) {
                    // No file selected, ignore 

                    return console("No file selected, ignore ")
                }

                const imageFile = e.target.files[0];

                this.html5QrCode.scanFile(imageFile, true)
                    .then(qrCodeMessage => {
                        
                        // verify qrcode
                        callback(qrCodeMessage)
                    })
                    .catch(err => {
                        // failure, handle it.
                       
                        alert(`Error scanning file. Reason: ${err}`)
                    })

            })
        },

        scanCodeWithWebCam(eltId, callback){
           this. html5QrCode = new Html5Qrcode(eltId);
            const qrCodeSuccessCallback = (code) => { 
                /// stop streamming
               this. html5QrCode.stop()

                callback(code)

            }
            const config = { fps: 10, qrbox: {width: 250, height: 250} };

            if(this.cameraIndexed){
               this. html5QrCode.start(this.cameraList[this.cameraIndexed].deviceId, config, qrCodeSuccessCallback)
               .then(()=>{
                this.scanState = true
               })
                .catch(err => {
                    this.scanState = false
                    alert(err)
                });
            }else{
                navigator.mediaDevices.enumerateDevices().then(devices => {

                // get list of cameras 
                    this.cameraList = devices.filter(device=>device.kind == 'videoinput')
                    
                    // run streamming code
                   this. html5QrCode.start(this.cameraList[0].deviceId, config, qrCodeSuccessCallback)
                   .then(()=>{
                    this.scanState =true
                   })
                    .catch(err => {
                        this.scanState = false
                        alert(err)
                    });

                    
                })
            }

            
        },
        getAllCameras (){
            navigator.mediaDevices.enumerateDevices().then(devices => {

            // get list of cameras 
                this.cameraList = devices.filter(device=>device.kind == 'videoinput')
                //this.cameraIndexed = 0
                
            })
        },
        closeWebCam(){
           this. html5QrCode.stop()
        },
        // covert url to file 
        urltoFile(url, filename, mimeType){
            return (fetch(url)
                .then(function(res){return res.arrayBuffer();})
                .then(function(buf){return new File([buf], filename,{type:mimeType});})
            );

        }
    }
}