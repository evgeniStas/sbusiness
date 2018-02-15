<?php
/**
 * Created by PhpStorm.
 * User: evgeni
 * Date: 06.02.18
 * Time: 16:54
 */
$id_page = 51;
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
        <title><?php echo bloginfo('name'); ?></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="left-menu">
            <a href="#home">
                <div class="item">
                    <div class="line active"></div>
                </div>
            </a>
            <a href="#about">
                <div class="item">
                    <div class="line"></div>
                </div>
            </a>
            <a href="#price">
                <div class="item">
                    <div class="line"></div>
                </div>
            </a>
            <a href="#news">
                <div class="item">
                    <div class="line"></div>
                </div>
            </a>
            <a href="#questions">
                <div class="item">
                    <div class="line"></div>
                </div>
            </a>
            <a href="#location">
                <div class="item">
                    <div class="line"></div>
                </div>
            </a>
        </div>
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
                <div style="height: 1000px;" class="menu hidden">
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
        <div id="home" class="section">
            <div class="container">
                <div class="maintitle">
                    <h1><?php  the_field("title", $id_page); ?></h1>
                    <div class="subtitle"><?php  the_field("subtitle", $id_page); ?></div>
                    <div class="icon">
                        <a href="#about"><span class="icon2-Arrow_down_ic"></span></a>
                    </div>
                </div>
                <div class="cover">
                    <div style="background-image: url('<?php echo get_template_directory_uri();?>/img/header_image_02.png')" class="img"></div>
                </div>
            </div>
        </div>
        <div id="about" class="section">
            <div class="container">
                <div class="box">
                    <div class="about-title">
                        <h1><?php  the_field("about_us_text", $id_page); ?></h1>
                        <div class="subtitle"><?php  the_field("about_us_subtitle", $id_page); ?></div>
                    </div>
                    <div class="text">
                        <?php  the_field("about_us_full_text", $id_page); ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="price" class="section">
            <div class="container">
                <div class="classic-title">
                    <h1><?php  the_field("price_text", $id_page); ?></h1>
                    <div class="subtitle"><?php  the_field("price_subtitle", $id_page); ?></div>
                </div>
                <div class="block">

                    <?php
                    global $post;
                    $tmp_post = $post;
                    $args = array(  'post_type'=> 'price', 'order' => 'ASC');
                    $prices = get_posts( $args );
                    wp_reset_postdata();

                    foreach( $prices as $item ) {
                        setup_postdata($item);
                        ?>
                        <div class="item">
                            <div class="card">
                                <div class="title"><?php echo $item->post_title; ?></div>
                                <div class="desc">
                                    <ul>
                                        <?php echo $item->post_content; ?>
                                    </ul>
                                </div>
                                <div class="controll">
                                    <div class="button"><?php  the_field("book_it_now", $id_page); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $post = $tmp_post;
                    }
                    ?>
                </div>

            </div>
        </div>
        <div id="news" class="section">
            <div class="container">
                <div class="classic-title">
                    <h1><?php  the_field("news_text", $id_page); ?></h1>
                    <div class="subtitle"><?php  the_field("news_subtitle", $id_page); ?></div>
                </div>
                <div class="block">
                    <div class="rowleft">
                        <?php
                        $args = array(  'post_type'=> 'news', 'order' => 'ASC', 'posts_per_page' => 2, 'offset'=> 0);
                        $news = get_posts( $args );
                        wp_reset_postdata();
                        $i = 0;
                        foreach( $news as $item ) {
                            setup_postdata($item);
                            ?>
                            <div <?php if($i == 0){echo "class='blue'";}?>>
                                <div class="content">
                                    <div class="title"><?php echo $item->post_title; ?></div>
                                    <div class="description"><?php echo $item->post_content; ?></div>
                                    <div class="controls">
                                        <div class="date"><?php  the_field("date_text", $id_page); ?> <?php echo date('d.m.Y', strtotime($item->post_date));?></div>
                                        <div class="link"><a href="<?php  the_permalink($item);?>"><span class="more"><?php  the_field("read_more_text", $id_page); ?></span> <span class="icon2-Arrow-right"></span></a></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="rowleft">
                        <?php
                        $args = array(  'post_type'=> 'news', 'order' => 'ASC', 'posts_per_page' => 2, 'offset'=> 2);
                        $news = get_posts( $args );
                        wp_reset_postdata();
                        $i = 0;
                        foreach( $news as $item ) {
                            setup_postdata($item);
                            if($i == 0){
                                $img = get_field('photo', $item->ID)["sizes"]["thindex"];
                                ?>
                                <div>
                                    <div>
                                        <?php if($img){?>
                                        <div class="image">
                                            <div class="photo">
                                                <img src="<?php echo $img;?>"/>
                                            </div>
                                        </div>
                                    <?php }?>
                                        <div class="content-image">
                                            <div class="con">
                                                <div class="title"><?php echo $item->post_title; ?></div>
                                                <div class="description"><?php echo $item->post_content; ?></div>
                                                <div class="controls">
                                                    <div class="date"><?php  the_field("date_text", $id_page); ?> <?php echo date('d.m.Y', strtotime($item->post_date));?></div>
                                                    <div class="link"><a href="<?php  the_permalink($item);?>"><span class="more"><?php  the_field("read_more_text", $id_page); ?></span> <span class="icon2-Arrow-right"></span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }else {
                                ?>
                                <div class="dark">
                                    <div class="content">
                                        <div class="title"><?php echo $item->post_title; ?></div>
                                        <div class="description"><?php echo $item->post_content; ?></div>
                                        <div class="controls">
                                            <div class="date"><?php  the_field("date_text", $id_page); ?> <?php echo date('d.m.Y', strtotime($item->post_date));?></div>
                                            <div class="link"><a href="<?php  the_permalink($item);?>"><span class="more"><?php  the_field("read_more_text", $id_page); ?></span> <span class="icon2-Arrow-right"></span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="rowthree">
                        <?php
                        $args = array(  'post_type'=> 'news', 'order' => 'ASC', 'posts_per_page' => 2, 'offset'=> 4);
                        $news = get_posts( $args );
                        wp_reset_postdata();
                        $i = 0;
                        foreach( $news as $item ) {
                            setup_postdata($item);
                            if($i == 0){
                                ?>
                                <div class="blue">
                                    <div class="content">
                                        <div class="title"><?php echo $item->post_title; ?></div>
                                        <div class="description">
                                            <?php echo $item->post_content; ?>
                                        </div>
                                        <div class="controls">
                                            <div class="date"><?php  the_field("date_text", $id_page); ?> <?php echo date('d.m.Y', strtotime($item->post_date));?></div>
                                            <div class="link"><a href="<?php  the_permalink($item);?>"><span class="more"><?php  the_field("read_more_text", $id_page); ?></span> <span class="icon2-Arrow-right"></span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }else{
                                $img = get_field('photo', $item->ID)["sizes"]["thindex"];
                                ?>
                                <div>
                                    <div class="dark-image">
                                        <div class="con">
                                            <div class="title"><?php echo $item->post_title; ?></div>
                                            <div class="description">
                                                <?php echo $item->post_content; ?>
                                            </div>
                                            <div class="controls">
                                                <div class="date"><?php  the_field("date_text", $id_page); ?> <?php echo date('d.m.Y', strtotime($item->post_date));?></div>
                                                <div class="link"><a href="<?php  the_permalink($item);?>"><span class="more"><?php  the_field("read_more_text", $id_page); ?></span><span class="icon2-Arrow-right"></span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($img){?>
                                        <div class="image">
                                            <div class="photo">
                                                <img src="<?php echo $img;?>"/>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                                <?php
                            }
                            $i++;
                        }
                            ?>
                    </div>
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
            </div>
        </div>
        <div id="location" class="section">
            <div>
                <div class="container">
                    <div class="classic-title">
                        <h1><?php  the_field("location_text", $id_page); ?></h1>
                    </div>
                    <div class="adress">
                        <div class="ad"><?php  the_field("location", $id_page); ?></div>
                        <div class="ph"><?php  the_field("contact", $id_page); ?>
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
                </div>
                <div style="background-image: url(https://maps.googleapis.com/maps/api/staticmap?center=<?php  the_field("map", $id_page); ?>&zoom=13&size=600x300&maptype=roadmap&key=AIzaSyARrAHOVdmc2lNZF45lNB89qMKIFZBwLe8);" class="map">

                </div>
            </div>
        </div>
        <?php wp_footer() ?>
    </body>

</html>
