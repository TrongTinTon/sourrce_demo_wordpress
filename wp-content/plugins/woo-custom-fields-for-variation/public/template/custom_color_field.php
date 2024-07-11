<?php
$required 		= isset($options['required']) ? $options['required'] : '';
$price 			= ($options['price'] != 0) ? ':- ('.wc_price( $options['price'] ).')' : '';
$option_name 	= isset($options['name'])?strtolower(str_replace(' ','-',$options['name'] )):'';

$entered_data = '';

if(isset($_POST['custom-variation'][sanitize_title( $options['name'] )])){

	$entered_data = isset($_POST['custom-variation'][sanitize_title( $options['name'] )])?$_POST['custom-variation'][sanitize_title( $options['name'] )]:'';
	$entered_data = str_replace('\"','"',$entered_data);
	$entered_data = str_replace("\'","'",$entered_data);	
} ?>
<p class="phoen_minss phoenwwe_<?php echo $variation_id; ?> form-row form-row-wide custom_<?php echo sanitize_title( $options['name'] ); ?>" style="display:none;" >
	<?php if ( ! empty( $options['label'] ) ) :
		$show  = "<label>";
		$show .= wptexturize( $options['label'] ) . ' ' . $price; 
		$show .= ($required == 1) ? '<abbr title="required" class="required">*</abbr>' : '';
		$show .= "</label>";
	endif; ?>
	<?= _e($show) ?>

	

	<input id="color-input-<?php echo $variation_id.'-'.$option_name; ?>" type="text" class="input-text custom-variation custom_color_field" data-price="<?php echo $options['price'] ? $options['price'] : '0'; ?>" name="custom-variation[<?php echo $variation_id; ?>][<?php echo sanitize_title( $option_name ); ?>]" value="<?php if( ! empty($entered_data) ){ echo $entered_data; } ?>" <?php if ( ! empty( $options['max'] ) ) echo 'maxlength="' . $options['max'] .'"'; ?>  />
	
	<input class="chose-color-press" value="#e6e6e6" data-jscolor="{alpha:0.7}" onChange="updateValue(this,'#color-input-<?php echo $variation_id.'-'.$option_name; ?>')" onInput="updateBackground(this,'#set-bg-<?php echo $variation_id.'-'.$option_name; ?>')">
	<em id="set-bg-<?php echo $variation_id.'-'.$option_name; ?>" style="display:inline-block; padding:1em;background:#e6e6e6;">input event pr4</em>
</p>

