let role = 1; //1->supervisor , 2->secretaria, 3->lawyer, 4->client

(() => {
    console.log(role);

   /* $.ajax({
        url: "http://127.0.0.1:8000/user/role",
        type: "get",

        success: function (response) {
            console.log(response)
            rule = response.role;
        },

        error: function (response) {
            console.log(response.responseJSON);
        }
    });
*/
role = 2;

})();

