<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Section
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
WPBakeryShortCode_VC_Tta_Section::$self_count ++;
WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;
$isPageEditable = vc_is_page_editable();

$output = '';

$output .= '<div class="' . esc_attr( $this->getElementClasses() ) . '"  data-color="'.esc_attr($atts['tab_color']).'" style="background:'.esc_attr($atts['tab_color']).'"';
$output .= ' id="' . esc_attr( $this->getTemplateVariable( 'tab_id' ) ) . '"';
$output .= ' data-vc-content=".vc_tta-panel-body">';
$output .= '<div class="vc_tta-panel-heading">';
$output .= $this->getTemplateVariable( 'heading' );
$output .= '</div>';
$output .= '<div class="vc_tta-panel-body"> ';
$output .= '<style type="text/css">';
$output .= ' #'.esc_attr( $this->getTemplateVariable( 'tab_id' ) ).' .vc_tta-panel-body {background:'.esc_attr($atts['tab_color']).' !important;}';
$output .= '</style>';
if ( $isPageEditable ) {
	$output .= '<div data-js-panel-body>'; // fix for fe - shortcodes container, not required in b.e.
}
$output .= $this->getTemplateVariable( 'content' );
if ( $isPageEditable ) {
	$output .= '</div>';
}
$output .= '</div>';
$output .= '</div>';

echo $output;