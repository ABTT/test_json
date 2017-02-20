<?php
/**
 * Created by PhpStorm.
 * User: boott
 * Date: 19.02.2017
 * Time: 15:51
 */
?>
<h2>fh</h2> <hr />
<div class="col-lg-3 col-lg-offset-4">
    <h2>Вход</h2>
    <form action="{% SITE %}/test_json/action/heh" method="post">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
        </div>
        <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Войти</button>
    </form>
</div>
<script>
    $('button.btn-block').on('click', function(){

        $.ajax({
            type: "POST",
            url: $("form").attr('action'),
            data: $("form").serialize(),
            dataType: 'JSON',
            success: function(msg){
                alert(msg.text);
                $('input').val('');
            }
        });
        return false
    });
</script>

