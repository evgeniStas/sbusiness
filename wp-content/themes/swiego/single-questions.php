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
<div id="questions" class="section">
    <div class="container">
        <div class="classic-title">
            <h1><?php  the_field("questions_text", $id_page); ?></h1>
            <div class="subtitle"><?php  the_field("questions_subtitle_text", $id_page); ?></div>
        </div>
        <div class="block">
            <div class="questions">

                <?php
                global $post;
                $tmp_post = $post;
                $args = array(  'post_type'=> 'questions', 'order' => 'ASC');
                $prices = get_posts( $args );
                wp_reset_postdata();

                foreach( $prices as $item ) {
                    setup_postdata($item);
                    ?>
                    <div class="question">
                        <div class="qtitle">
                            <div class="icon">[+]</div>
                            <div class="title"><?php echo $item->post_title; ?></div>
                            <div class="arr"><span class="icon2-Arrow-right"></span></div>
                            <div class="clear"></div>
                        </div>
                        <div class="desc hidden">
                            <?php echo $item->post_content; ?>
                        </div>
                    </div>
                    <?php
                    $post = $tmp_post;
                }
                ?>
            </div>
        </div>
        <div class="control-links controlQuestions">
            <div class="left">
                <a href="<?php echo get_home_url();?>"><- <?php  the_field("b_home_page", $id_page); ?></a>
            </div>
            <div class="right">
            </div>
        </div>
    </div>
</div>
<?php wp_footer() ?>
</body>