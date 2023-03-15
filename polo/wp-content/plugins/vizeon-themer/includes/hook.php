<?php
 function gaviasthemer_build_meta_box() {
   echo'<div class="gva-meta-tabs"><div id="gva-meta-tabs-boxes"></div></div>';
}
   
function gaviasthemer_register_meta_box_holder() {
   add_meta_box( 'gaviasthemer_meta_box', esc_html__( 'Meta Options', 'vizeon-themer' ), 'gaviasthemer_build_meta_box', '', 'normal', 'low' );
}

add_action( 'add_meta_boxes', 'gaviasthemer_register_meta_box_holder' );

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

add_filter( 'tec_events_views_v1_should_display_deprecated_notice', '__return_false' );
