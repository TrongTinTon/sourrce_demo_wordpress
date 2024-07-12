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
<div class="custom-field-variation-wrapper phoen_minss phoenwwe_<?php echo $variation_id; ?> form-row form-row-wide custom_<?php echo sanitize_title( $options['name'] ); ?>" style="display:none;" >
	<?php if ( ! empty( $options['label'] ) ) :
		$show  = "<label>";
		$show .= wptexturize( $options['label'] ) . ' ' . $price; 
		$show .= ($required == 1) ? '<abbr title="required" class="required">*</abbr>' : '';
		$show .= "</label>";
	endif; ?>
	<?= _e($show) ?>

   	<div class="custom-field-variation-container custom-color-field-variation-container">
	   <label class="custom-field-variation-label color-input-label" data-input="<?php echo $variation_id.'-'.$option_name; ?>-remote-input">
	   		<img src="<?php echo plugin_dir_url( __FILE__ )."../image/paint.svg" ?>">
	   </label>
	   <div>
	   	<input type="text" id="<?php echo $variation_id.'-'.$option_name; ?>-remote-input" class="color-input-text" data-jscolor="{previewElement:'#set-bg-<?php echo $variation_id.'-'.$option_name; ?>', value: '#e6e6e6'}"  onChange="updateValue(this,'#color-input-<?php echo $variation_id.'-'.$option_name; ?>')" onInput="updateBackground(this,'#set-bg-<?php echo $variation_id.'-'.$option_name; ?>')"/>
	   </div>
	  	
	   <div class="color-review-bg" id="set-bg-<?php echo $variation_id.'-'.$option_name; ?>" ></div>
   	</div>

	
	<input type="hidden" id="color-input-<?php echo $variation_id.'-'.$option_name; ?>" type="text" class="input-text custom-variation custom_color_field" data-price="<?php echo $options['price'] ? $options['price'] : '0'; ?>" name="custom-variation[<?php echo $variation_id; ?>][<?php echo sanitize_title( $option_name ); ?>]" value="<?php if( ! empty($entered_data) ){ echo $entered_data; } ?>" <?php if ( ! empty( $options['max'] ) ) echo 'maxlength="' . $options['max'] .'"'; ?>  />

  
</div>

