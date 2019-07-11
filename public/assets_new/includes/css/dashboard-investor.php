<?php
$_currentuser=get_current_user_ID();
global $wpdb;

$paymenttable = $wpdb->prefix . 'user_payments';
$paymenttablequery = "SELECT *, (SELECT SUM(amount) FROM $paymenttable where userID = ".get_current_user_id().") AS totalfund FROM $paymenttable where userID = ".get_current_user_id();
$fundedInvestors = $wpdb->get_results($paymenttablequery, OBJECT);

$emailistquery="SELECT gybi_cartpauj_pm_messages.*, gybi_message_taxonomy.name, gybi_message_taxonomy.colorcode from gybi_cartpauj_pm_messages 
LEFT JOIN gybi_message_taxonomy
ON gybi_cartpauj_pm_messages.message_category = gybi_message_taxonomy.id 
WHERE gybi_cartpauj_pm_messages.to_user={$_currentuser} AND (gybi_cartpauj_pm_messages.message_category=2 OR gybi_cartpauj_pm_messages.parent_id=0 )
LIMIT 10";




$emaillist=$wpdb->get_results($emailistquery,OBJECT);
$get_pms=0;
$querycount=$wpdb->prepare("SELECT id FROM gybi_cartpauj_pm_messages WHERE (to_user = %d AND parent_id = 0 AND to_del <> 1 AND message_read = 0 AND last_sender <> %d) AND (message_category=2 AND parent_id=0 ) OR (from_user = %d AND parent_id = 0 AND from_del <> 1 AND message_read = 0 AND last_sender <> %d)", $_currentuser, $_currentuser, $_currentuser, $_currentuser);
$messagerows = $wpdb->get_results($querycount);
if(count($emaillist) > 0)$get_pms=count($emaillist);
?>

<div class="row">
  <div class="col-md-3 col-sm-6">
    <div class="dashboard-tile detail tile-red">
      <div class="content" style="padding-right:100px;"> <a href="<?php echo home_url('/investor-profile') ?>">Keep Update Your Business Profile</a><br />
        <br />
        <br />
      </div>
      <div class="icon"><i class="fa fa-file-text"></i> </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="dashboard-tile detail tile-turquoise">
      <div class="content" style="padding-right:100px;"> <a href="<?php echo home_url('/projects-invested') ?>">Check Invested Project Statuses</a><br />
        <br />
        <br />
      </div>
      <div class="icon"><i class="fa fa-flag"></i> </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="dashboard-tile detail tile-blue">
      <div class="content" style="padding-right:100px;"> <a href="<?php echo home_url('/messages') ?>">You have <?php echo $get_pms; ?> unread messages in your Inbox.</a> <br />
        <br />
      </div>
      <div class="icon"><i class="fa fa fa-envelope"></i> </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="dashboard-tile detail tile-purple">
      <div class="content" style="padding-right:100px;">
        <p class="text-left "  style="font-size:30px;">$<span class="timer" data-to="<?php echo $fundedInvestors[0]->totalfund; ?>" data-speed="2500"></span></p>
        <a href="<?php echo home_url('/projects-invested') ?>">Total Fund Spent so far</a> </div>
      <div class="icon"><i class="fa fa-bar-chart-o"></i> </div>
    </div>
  </div>
</div>


<div class="row"><div class="col-lg-6 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Projects Invested</h4>          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>

                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats" style="min-height:200px;">  
                <?php
				global $wpdb;
				$table_name = $wpdb->prefix . 'user_payments';
				$querystr = "SELECT DISTINCT projectID FROM $table_name where userID = ".get_current_user_id();
				$projectsinvested = $wpdb->get_results($querystr, OBJECT);
				if(count($projectsinvested) > 0):
				?>
                                    
                                    
                                       <table class="table">
                                           <thead>
                                               <tr>
                                                   <th>Project</th>
                                                   <th>Progress</th>
                                                   <th>Last Updated Date</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                  <?php
				 foreach($projectsinvested as $project):
				 $post=get_post($project->projectID);
				 
	$projectstatuslist = new WP_Query( array(
		'post_type' => 'project-status',
		'posts_per_page' => -1,
		'orderby'=>'date',
		'order'=>'DESC',
		'meta_query'=>array(array('key' => 'project_status_project','value' => $project->projectID,'compare' => 'LIKE')),
		'post_status' => array(
			'publish',
			'pending',
		)
	));
				 
				 ?> <tr>
                                                   <th ><a title="View Project Status" href="<?php echo home_url('/project-status-list?projectID='.$project->projectID) ?>"><?php echo get_the_title($postID); ?></a></th>
                                                   <td> <div class="progress progress-sm">
                                                           <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php  echo get_field('percentage_completed',$projectstatuslist->posts[0]->ID); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php  echo get_field('percentage_completed',$projectstatuslist->posts[0]->ID); ?>%">
                                                           </div>
                                                       </div></td>
                                                   <td>
                                                   <?php echo date("M d h:i A", strtotime($projectstatuslist->posts[0]->post_date)); ?>
                                                   </td>
                                               </tr>
                                               <?php endforeach; ?>
                                           </tbody>
                                        </table>
                                        <?php else: ?>
                                   <div class="alert alert-warning alert-dismissable" style="margin-top:70px;">You haven't Invested in any projects.</div>     
                                        <?php endif ?>
                                    </div>
                                </div>        <div class="panel-footer text-center"> <a href="<?php echo home_url('/projects-invested') ?>">View All Projects Invested</a> </div>

                            </div>
                        </div><div class="col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Latest Messages</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body">
          <div class="r3_notification db_box" style="max-height:200px; min-height:200px;">
            <?php 
if(count($emaillist)==0):
?>
            <div class="alert alert-warning alert-dismissable" > There are no messages in your Inbox</div>
            <?php endif; ?>
            <ul class="list-unstyled notification-widget" style="height:200px;">
              <?php 
			    $i = 1; 
			    foreach($emaillist as $emaill): 
				$row_class = (++$i % 2) ? 'status-available' : 'status-away';
				um_fetch_user($emaill->from_user);
				?>
              <li class="unread <?php echo $row_class; ?>"> <a href="<?php echo get_permalink(314) ?>?pmaction=viewmessage&id=<?php echo $emaill->id; ?>">
                <div class="user-img"> <?php echo get_avatar( um_user('ID'), 50); ?> </div>
                <div> <span class="name"> <strong><?php echo wp_trim_words($emaill->message_title,5); ?></strong> </span> <span class="desc small"> <?php echo wp_trim_words($emaill->message_contents,10); ?> </span>  </div>
                </a> <span class="time small"><?php echo date("M d h:i A", strtotime($emaill->date)); ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="panel-footer text-center"> <a href="<?php echo home_url('/messages') ?>">View All Messages</a> </div>
      </div>
    </div></div>
    <div class="row">
    <div class="col-md-9">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Projects you may intrested</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body" style="height:250px;">
          <?php
$currentusercountry=get_field('country', $currentproject->ID);
		$args = array(
		'orderby'       =>  'post_date',
		'order'         =>  'ASC',
		'post_type' => 'project',
		'posts_per_page' =>3,
		'tax_query'=>array(array('taxonomy' => 'wp_cc_tax_country','field'=>'term_id','value' => $currentusercountry->term_id,'operator' => 'LIKE'))
		);

	$projects = new WP_query($args);
	?>
          <?php if(!$projects->have_posts()): ?>
          <div class="alert alert-warning alert-dismissable" style="margin-top:70px;"> No data found</div>
          <?php endif; ?>
          <?php 
  				$i = 1; 
				
			while ( $projects->have_posts() ) : $projects->the_post();
$author_id = $post->post_author;
	um_fetch_user($author_id);
	$row_class = (++$i % 2) ? 'bg-default' : 'bg-info';
	
	?>
    <div class="col-md-4">
            <div class="project-item">
              <div class="col-sm-12 project-image"> <a href="<?php echo get_permalink() ?>" title="<?php the_title_attribute( 'echo=0' ) ?>" rel="bookmark">
                <?php if(get_field('project_logo')!=""){ ?>
                            <img src="<?php the_field('project_logo') ?>"  alt="<?php echo get_the_title(); ?>"/>
                            <?php } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/sample-company-logo.png"   alt="<?php echo get_the_title(); ?>"/>
                            <?php } ?>
                </a> </div>
              <div class="col-sm-12 project-info-dashboard">
                <h5 > <a href="<?php echo get_permalink() ?>" title="<?php the_title_attribute( 'echo=0' ) ?>" rel="bookmark"> <?php echo the_title(); ?> </a></h5>
                <p class="uprofile-title"><?php echo the_field('city');?> <?php echo the_field('state');?>, <?php echo get_field('country')->name;?></p>
              
              </div>
        <div style="margin-left:10px;"><?php echo do_shortcode('[yasr_visitor_votes size="small"]'); ?> 
            </div> </div>
          </div>
          
          <?php endwhile; ?>
        </div>
        <div class="panel-footer text-center"> <a href="<?php echo home_url("/entrepreneurs-projects") ?>">View All Projects</a> </div>
      </div>
    </div>
     <div class="col-lg-3 col-md-6">
                            <div class="panel facebook-box">
                                <div class="panel-body">
                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000"  style="height:320px">
                                        <span class="tile-title pull-right">Latest News</span>
                                        <i class="fa fa-rss"></i>
                                         <?php 
		$querynews = new WP_Query( array( 'post_type' => 'blog', 'cat' => $category->term_id,'posts_per_page' => 2,'orderby' => 'date','order' => 'DESC') );
		$newsposts = $querynews->get_posts();
		 foreach($newsposts as $newspost) { 
		  ?>
                                        <div><h2 class="no-m"><a href="<?php echo get_permalink($newspost->ID); ?>"><?php echo get_the_title($newspost->ID); ?></a></h2><span class="tile-date"><?php echo get_the_date("M d h:i A",$newspost->ID); ?></span></div>
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    <script>
    jQuery(document).ready(function() {
		app.timer();
       app.perfectScroller();
	   
	   jQuery(".live-tile").liveTile();
	   
    });
    </script>