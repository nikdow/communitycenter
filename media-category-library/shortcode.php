        <table>
                <tbody>
<?php foreach ( $posts as $post ): ?>
<?php $link = wp_get_attachment_url( $post->ID ); ?>
<?php $time_format = get_option( 'date_format' ) . ' ' .  get_option( 'time_format' ); ?>
                        <tr>
                                <td class="cell-title"><a target="_BLANK" href="<?php echo $link; ?>"><?php echo get_the_title( $post->ID ); ?></a></td>
                        </tr>
<?php endforeach; ?>
                </tbody>
        </table>
