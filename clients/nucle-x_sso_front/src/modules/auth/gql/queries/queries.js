// import {runQuery} from "./run";

// import types from "./types";


// const queries = {
    
//     user: (field= types.user) => {
        
//         const q = ` 
//             user{
//                 ${field}
//             }
//         `;
       
//        return runQuery(q)

//     },
//     users: ({count =2 , field =types.user }) => {
  
//         const q = ` 
//             users(count:${count}){
//                 ${field}
//             }
//         `;

//         return runQuery(q)

//     }
    
// }

// export default queries