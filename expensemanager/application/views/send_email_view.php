<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('send_email_c', $attributes); ?>

<p>
        <label for="registered_email_id">Registered Email id:- <span class="required">*</span></label>
	<?php echo form_error('registered_email_id'); ?>
	<br />
							
	<?php echo form_textarea( array( 'name' => 'registered_email_id', 'rows' => '1', 'cols' => '40', 'value' => set_value('registered_email_id') ) )?>
</p
<p>
        <label for="message">Message:- <span class="required">*</span></label>
	<?php echo form_error('message'); ?>
	<br />
							
	<?php echo form_textarea( array( 'name' => 'message', 'rows' => '5', 'cols' => '80', 'value' => set_value('message') ) )?>
</p>


<p>
        <?php echo form_submit( 'submit', 'Send email'); ?>
</p>

<?php echo form_close(); ?>
