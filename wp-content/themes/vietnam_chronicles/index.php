<script>
    window.location.replace("<?php echo get_site_url() ?>");
</script>
<h2>INDEX.PHP</h2>

<?php


    $content = file("<?php echo get_site_url() ?>/wp-content/themes/vietnam_chronicles/xml_import/import.txt");

    

    //$posts = simplexml_load_file("<?php echo get_site_url() ?>/wp-content/themes/vietnam_chronicles/xml_import/import.xml");

   /* 

    $values = explode(";", $content);
    echo $values[17] ;

    */

    foreach($content as $line){
        /*$comment = new stdClass();
        $values = explode('|', $line);
     
        $postId = get_page_by_title($values[0], OBJECT, 'post')->ID;
        $author_email = $values[1];
        $content = $values[2];
        $date = $values[3];
        
        $commentdata = array(
            'comment_post_ID'=> $postId,
            'comment_author_email'=> $author_email,
            'comment_content'=>$content,
            'comment_date'=> $date
        );    */

        
        //$id = wp_insert_comment( $commentdata );
        //echo "Inserted comment no. " . $id . '<br>';
 
        /*

        $values = explode(";", $line);
        
        $post->title = $values[1];
        $post->categories = $values[2];
        $post->tags = $values[3];
        $post->author = $values[4];
        $post->featured_image = $values[5];
        $post->date = $values[6];
        $post->content = $values[7];
        $post->excerpt = $values[8];

        $postarr = array(
            'post_author' => get_user_by('email', $post->author)->ID,
            'post_date' => $post->date,
            'post_content' => strval($post->content),
            'post_title' => $post->title,
            'post_excerpt' => $post->excerpt,
            'meta_input' => array(
                'featured_image' => $post->featured_image
            )
        );

        */
        
        //wp_insert_post( $postarr ); 

        //echo "<h1>Insertan novi post " . $post->title . "</h1>";
    }
?>