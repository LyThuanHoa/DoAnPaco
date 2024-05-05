const host = "https://vapi.vnappmob.com/api/province";
var callAPI = (api) => {
    return axios.get(api)
        .then((response) => {
            console.log(response)
            renderData(response, "province_name");
        });
}

$.ajax({
    url: 'https://vapi.vnappmob.com/api/province',
    type: 'GET',
    success: function(response) {
        console.log(response)
        for(var i=0 ; i<=5; i++){
            console.log(response.results[i].province_name)
        row += `<option data-id="${response.results[i].province_id}" value="${response.results[i].province_name}">${response.results[i].province_name}</option>`

        }
 
    document.querySelector("#" + select).innerHTML = row
    }

})


// callAPI('https://vapi.vnappmob.com/api/province/district/');
// var callApiDistrict = (api) => {
//     return axios.get(api)
//         .then((response) => {
//             renderData(response.data.districts, "district");
//         });
// }
// var callApiWard = (api) => {
//     return axios.get(api)
//         .then((response) => {
//             renderData(response.data.wards, "ward");
//         });
// }


// var renderData = (array, select) => {
//     let row = ' <option disable value="">Chọn</option>';
//     array.forEach(element => {
//         console.log(element)
//         row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
//     });
//     document.querySelector("#" + select).innerHTML = row
// }


// $("#city").change(() => {
//     callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
   
// });
// $("#district").change(() => {
//     callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
 
// });
// $("#ward").change(() => {
   
// })