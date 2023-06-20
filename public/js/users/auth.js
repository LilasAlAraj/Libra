let role ;//= 1; //1->supervisor , 2->secretaria, 3->lawyer, 4->client


function fetchUserRole (){
    return new Promise((resolve, reject) => {
        $.ajax({
            url: IP_PORT+"/user/role",
            type: "get",
            success: function (response) {
                role = response.role;
                resolve(role);
            },
            error: function (response) {
                reject(response.responseJSON);
            },
        });
    });
};
