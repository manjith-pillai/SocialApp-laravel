<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
@include('includes.header')
    <div class="container">
    	@yield('content')
    </div>

    <!-- Js Script -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>

    var postId = 0;
    var postBodyElement = null;
        $('.post').find('.interaction').find('.edit').on('click',function(e){
            e.preventDefault();

            postBodyElement = e.target.parentNode.parentNode.childNodes[1];
            var postBody = postBodyElement.textContent;
            postId = e.target.parentNode.parentNode.dataset['postid'];
            $('#post-body').val(postBody);
            $('#edit-modal').modal();
        });

        // Ajax ------
        $('#modal-save').on('click', function(){
            $.ajax({
                method:'POST',
                url:'/edit',
                data:{body:$('#post-body').val(), postId: postId,_token:token}
            })
            .done(function(msg){
                $(postBodyElement).text(msg['new_body']);
                $('#edit-modal').modal('hide');
            });
            
        });
    </script>
</body>
</html>
