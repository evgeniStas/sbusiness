<?php
$id_page = 51;
?>
<?php
$post_id = get_the_ID();
$queried_post = get_post($post_id);
$img = get_field('photo', $post_id)["url"];
?>
<html <?php language_attributes(); ?>>
<head>
    <?php if(get_locale() == "en_US"){?>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php }else{ ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/rtl.css"/>
        <?php
    }
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
    <?php wp_head(); ?>
    <style>
        .maintitle .icon span {
            border: 3px solid #ffffff;
        }
        .icon2-Arrow_down_ic:before {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo get_home_url();?>">
                    <span class="icon-swiego_logo">
                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span>
                    </span>
                </a>
            </div>
            <div class="lines">
                <span class="icon2-Menu_ic"></span>
            </div>
            <div class="lang">
                <select id="lang-select">
                    <?php
                    $translations = pll_the_languages(array('raw'=>1));
                    foreach($translations as $lang){
                        $lang["locale"] = str_replace("-","_", $lang["locale"]);
                        $selected ="";
                        if($lang["locale"] == get_locale()) {
                            $selected="selected";
                            if(get_locale() == "en_US"){
                                $id_page = 51;
                            }else{
                                $id_page = 53;
                            }
                        }
                        ?>
                        <option <?php echo $selected;?> data-url="<?php echo $lang["url"];?>"><?php echo $lang["name"];?></option>
                        <?php
                    }
                    ?>
                    <select>
                    </select>
            </div>
            <div class="clear"></div>
            <div class="menu hidden">
                <div class="menu-info">
                    <div class="item">
                        <h1><?php  the_field("location_text", $id_page); ?></h1>
                        <div>
                            <?php  the_field("location", $id_page); ?>
                        </div>
                    </div>
                    <div class="item">
                        <h1><?php  the_field("contact_text", $id_page); ?></h1>
                        <div>
                            <?php  the_field("contact", $id_page); ?>
                        </div>
                    </div>
                    <div class="item">
                        <h1><?php  the_field("follow_us_text", $id_page); ?></h1>
                        <div>
                            <?php
                            $args = array(  'post_type'=> 'social', 'posts_per_page' => -1);
                            $Social = get_posts( $args );
                            wp_reset_postdata();
                            foreach( $Social as $item ) {
                                setup_postdata($item);
                                $meta_values = get_post_meta( $item->ID );
                                ?>
                                <div class="social">
                                    <a target="_blank" href="<?php echo $meta_values["link"][0];?>"><?php echo $meta_values["icon"][0];?></a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="menu-items">
                    <?php wp_nav_menu();?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php if($img){?>
    <div id="home" class="section">
        <div class="container">
            <div style="background: #304ffed1;" class="maintitle">
                <h1><?php echo $queried_post->post_title;?></h1>
                <div class="subtitle"><?php  the_field("subtitle", $id_page); ?></div>
                <div class="icon">
                    <a href="#view"><span class="icon2-Arrow_down_ic"></span></a>
                </div>
            </div>
            <div class="cover">
                <div style="background-image: url('<?php echo $img;?>')" class="img"></div>
            </div>
            <div style="margin-top: 10px;" class="publishet"><?php  the_field("date_text", $id_page); ?> <?php echo date('d.m.Y', strtotime($item->post_date));?></div>
        </div>
    </div>
    <?php }?>
    <div style="<?php if($img){?>padding-top: 40px;<?php }?>" id="view" class="section">
        <div class="container">
            <div class="box">
                <div class="title">
                    <div class="post_title"><?php echo $queried_post->post_title;?></div>
                    <div class="follow">
                        <?php  the_field("follow_us_text", $id_page); ?>
                        <div>
                            <?php
                            $args = array(  'post_type'=> 'social', 'posts_per_page' => -1);
                            $Social = get_posts( $args );
                            wp_reset_postdata();
                            foreach( $Social as $item ) {
                                setup_postdata($item);
                                $meta_values = get_post_meta( $item->ID );
                                ?>
                                <div class="social">
                                    <a target="_blank" href="<?php echo $meta_values["link"][0];?>"><?php echo $meta_values["icon"][0];?></a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="text">
                    <?php echo apply_filters('the_content', $queried_post->post_content);?>
                </div>
            </div>
            <div class="control-links">
                <div class="left">
                    <?php
                    $prev_post = get_adjacent_post(false, '', false);
                    if(!empty($prev_post)) {
                        echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">Back to : ' . $prev_post->post_title . '</a>'; }
                    ?>
                </div>
                <div class="right">
                    <?php
                    $prev_post = get_adjacent_post(false, '', true);
                    if(!empty($prev_post)) {
                    echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">Read next : ' . $prev_post->post_title . '</a>'; }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer() ?>
</body>