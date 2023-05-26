(() => {
    'use strict'
    feather.replace({ 'aria-hidden': 'true' })
})();


$(document).ready(function () {

    // جلب البيانات من ملف JSON
    $.ajax({
        url: 'http://127.0.0.1:8000/recommendations/all',
        type: 'get',
        success: function (response) {

            console.log(response)
            data = response.recommendations;
            // تحديث Pagination
            displayAll();

        },
        error: function (response) {
            console.log(response);

        }
    });

});



function displayAll() {

    // عرض الصفوف
    const recommendations = document.getElementById('recommendations');
    if (data.length == 0) {
        recommendations.append('لا يوجد بيانات')
    } else {
        for (var i = 0; i < data.length; i++) {
            const Recommendation = data[i];
            addRecommendationRow(recommendations, Recommendation)
        }
    }
}

function addRecommendationRow(recommendations, Recommendation) {



    card_header = document.createElement('div');
    card_header.classList.add('card-header');
    card_header.append(Recommendation.title)


    card_body = document.createElement('div');
    card_body.classList.add('card-body');

    content_text = Recommendation.content
    content = document.createElement('p');
    if (content_text.length > 1000) {
        content_text = content_text.substring(0, 1000) + '... '
        show_more = document.createElement('b');
        show_more.innerText = 'اعرض المزيد.'
        show_more.classList.add('show_more');
        show_more.setAttribute("data-bs-toggle", "modal")
        show_more.setAttribute("data-bs-target", "#recommendationBackdrop")
        show_more.onclick = function () {
            show_more_recommendation(Recommendation.title, Recommendation.content)
        }
        content.append(content_text, show_more)

    } else {
        content.append(content_text)
    }
    card_body.append(content)


    card = document.createElement('div');
    card.classList.add('row', 'card', 'mb-3');

    card.append(card_header, card_body);
    recommendations.append(card);



}



function show_more_recommendation(title, content) {


    document.getElementById('recommendationBackdropLabel').innerHTML = title;
    document.getElementById('recommendationBackdropContent').innerHTML = content;

}
