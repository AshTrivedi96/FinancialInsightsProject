<script type="text/javascript">
	
$("#send_email").on('click',function(){

let href = "<?php echo base_url(); ?>stock/stock_contact/sendMail";
let name = $("#name").val();
let email = $("#email").val();
let subject = $("#subject").val();
let message = $("#message").val();
$.ajax({

url:href,
type:'post',
data:{name:name,email:email,subject:subject,message:message},
beforeSend: function()
{
	$("#send_email").text('Sending...');
	$("#send_email").attr('disabled','disabled');

},
success: function(data)
{
	console.log(data);
	$("#send_email").text('Mail Sent');
	$("#send_email").removeAttr('disabled');

}

});


});


</script>