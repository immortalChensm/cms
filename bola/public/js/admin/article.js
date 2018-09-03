$(function (e) {

    $(".search").click(function (e) {

        var title = $(":input[name=title]").val();

        var search_url = $(this).attr("data-url");
        window.location.href = search_url+"?title="+title;

    });

})