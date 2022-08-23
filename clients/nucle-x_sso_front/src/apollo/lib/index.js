/*
** this lib is marked by Trandx 
***** All this function can help us to format GQL Query or datas
*/

   const objectToGqlString = function(data) {
        //console.log(this);
        let gqlString ="{"
        //const _this = this
        let n = 0
        const l = Object.keys(data).length
        Object.entries(data).forEach(
            entry => {
                const [index, value] = entry
                gqlString += `${index}:"${value}"`
                gqlString += (n < l-1)?', ':'}'
                n++
            }
        )

        return gqlString

    }


// function run () {
//     vObject.keys(lib).map(key => {
//         Object.prototype[key] = lib[key]
//     })
// }

// export default run()

export {objectToGqlString, }
