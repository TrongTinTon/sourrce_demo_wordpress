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
<div class="wrapper-color-input-element phoen_minss phoenwwe_<?php echo $variation_id; ?> form-row form-row-wide custom_<?php echo sanitize_title( $options['name'] ); ?>" style="display:none;" >
	<?php if ( ! empty( $options['label'] ) ) :
		$show  = "<label>";
		$show .= wptexturize( $options['label'] ) . ' ' . $price; 
		$show .= ($required == 1) ? '<abbr title="required" class="required">*</abbr>' : '';
		$show .= "</label>";
	endif; ?>
	<?= _e($show) ?>

	
	 <div class="color-input-wrapper">
   	<div class="color-input-container">
   		   <label class="color-input-label" data-input="<?php echo $variation_id.'-'.$option_name; ?>-remote-input">
   		   	<img src="<?php echo plugin_dir_url( __FILE__ )."../image/paint.svg" ?>">

   		   </label>
   		   <div>
   		   	<input type="text" id="<?php echo $variation_id.'-'.$option_name; ?>-remote-input" class="color-input-text" data-jscolor="{previewElement:'#set-bg-<?php echo $variation_id.'-'.$option_name; ?>', value: '#e6e6e6'}"  onChange="updateValue(this,'#color-input-<?php echo $variation_id.'-'.$option_name; ?>')" onInput="updateBackground(this,'#set-bg-<?php echo $variation_id.'-'.$option_name; ?>')"/>
   		   </div>
   		  	
   		   <div class="color-review-bg" id="set-bg-<?php echo $variation_id.'-'.$option_name; ?>" ></div>

   	</div>

	</div>
	
	<input type="hidden" id="color-input-<?php echo $variation_id.'-'.$option_name; ?>" type="text" class="input-text custom-variation custom_color_field" data-price="<?php echo $options['price'] ? $options['price'] : '0'; ?>" name="custom-variation[<?php echo $variation_id; ?>][<?php echo sanitize_title( $option_name ); ?>]" value="<?php if( ! empty($entered_data) ){ echo $entered_data; } ?>" <?php if ( ! empty( $options['max'] ) ) echo 'maxlength="' . $options['max'] .'"'; ?>  />

  
</div>
<style>
	.color-input-wrapper {
	
	}
	.color-input-container {

			display: flex;
    gap: 8px;
	}
	.color-input-container .color-input-text {
		width: 70px;
    height: 25px;
    padding: 0;
    margin: 0;
	}
	.color-review-bg {
		display:inline-block;background:#e6e6e6;
	}
	.color-review-bg {

    min-width: 3em;
    height: 1.5em;
    border-radius: 4px
	}
	.color-input-label {
		cursor: pointer;
		margin: 0;
	}
	.color-input-label:active, .color-input-label svg:active {
		 transform: scale(1.03);
		 transition: all 0.2s ease;
	}


</style>

