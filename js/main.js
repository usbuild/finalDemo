$(function() {
    $("#post").click(function(){
        var content = $(".post-content").val();
        $.post("post.php", {data:content}, function(e){
            if(e.code == 0) {
                var div = $('<div class="alert alert-block alert-info"></div>');
                div.html(e.data);
                $(".post-list").prepend(div);
                $(".post-content").val("");
            }
        }, "json");
    });;
});
