<!-- <div class="modal fade" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-body" style="background-color: green;color:#f5f5f5;text-align: center;border-radius: 20px;">
                <h4 id="text_msg"></h4>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="msg_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #ee4d2d;color:#fff; border-radius: 25px;">
            <br>
            <div class="modal-body3" style="text-align: center;">
                <h4 id="text_msg" style="color:#fff ;"></h4>
            </div>
            <br>
        </div>
    </div>
</div>
<script>
    function load_msg(dt) {
        $('#msg_modal').modal('show')
        $('#text_msg').html(dt)
        setTimeout(function() {
            $('#msg_modal').modal('hide')
        }, 3000)
     
    }
</script>