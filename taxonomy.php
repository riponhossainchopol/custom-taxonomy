<?php
		// Start the loop.
		while ($port->have_posts()) : $port->the_post()?>
                    <h1><?php the_title()?></h1>
                    <p>
                        <?php the_post_thumbnail()?>
                    </p>
                    <?php $read='<p><a href="'.get_permalink().'">read more</a></p>'?>
                        <p>
                            <?php echo wp_trim_words(get_the_content(),'10',$read)?>
                        </p>
        <p>topics:
            <?php 
            $topic=get_the_terms(get_the_ID(),'topics');
            foreach($topic as $topics){
                $showpipic=$topics->name;
                $link=get_term_link($topics,'topics');
                echo '<a href="'.$link.'">'.$showpipic.'</a> ';
            }
            ?>            
        </p>
                        <?php
		// End the loop.
		endwhile;
		?>
    
    
    
    register_post_type('portfolios',array(
    'labels'=>array(
    'name'=>'portfolio',
    'add_new_item'=>'add new portfolio'
    ),
        'public'=>true,
        'supports'=>array('title','editor','thumbnail')
    ));
    register_taxonomy('topics','portfolios',array(
    'labels'=>array(
    'name'=>'topics',
    'add_new_item'=>'add new topics',
        'parent_item'=>'new topics'
    ),
        'public'=>true,
        'hierarchical'=>true
    ));
