export default {

    formatVerify: (pattern, data)=>{
       const regex = new RegExp(pattern)

        return regex.test(data)
    }

}