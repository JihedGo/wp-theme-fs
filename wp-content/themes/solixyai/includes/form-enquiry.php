<div id="success" class="alert alert-success" style="display: none;"></div>
<?php //echo wp_create_nonce(); 
?>
<form id="enquiry">
    <h2>Send an enquiry about <?php the_title() ?></h2>
    <input type="hidden" name="registration" value="<?php the_field('registration') ?>">
    <div class="form-group row">
        <div class="col-lg-6">
            <input type="text" class="form-control" name="fname" placeholder="First Name" required id="">
        </div>
        <div class="col-lg-6">
            <input type="text" class="form-control" name="lname" placeholder="Last Name" required id="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <input type="email" name="email" placeholder="Email Address" class="form-control" required id="">
        </div>
        <div class="col-lg-6">
            <input type="tel" name="phone" placeholder="Phone" class="form-control" required id="">
        </div>
    </div>
    <div class="form-group">
        <textarea name="enquiry" class="form-control" required placeholder="Your Enquiry"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Send your enquiry</button>
    </div>

</form>
<script>
    (function($) {

        $('#enquiry').submit(function(event) {



            event.preventDefault(); // stop the form from submitting
            var endpoint = '<?php echo admin_url('admin-ajax.php') ?>';
            //alert(endpoint);
            var form = $('#enquiry').serialize();
            //console.log(form);
            var formdata = new FormData;
            formdata.append('action', 'enquiry');
            formdata.append('enquiry', form);
            formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce') ?>');
            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false, // turn ajax action
                contentType: false, // default: application/xx-form
                success: function(res) {
                    // console.log(res.data);
                    $('#enquiry').fadeOut(2000);
                    $('#success').text('Thanks for your enquiry').show();

                    $('#enquiry').trigger('reset');
                    $('#enquiry').fadeIn(500);
                },
                error: function(err) {
                    alert(err.responseJSON.data);
                }
            });
        });
    })(jQuery)
</script>