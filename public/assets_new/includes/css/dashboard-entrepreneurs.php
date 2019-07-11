<?php

$_currentuser=get_current_user_ID();

global $wpdb;

//Get the Current User Project
    $userprojectID=0;
    $query = array('posts_per_page' => '-1','author' => $current_user->ID,'post_type'=> 'project','post_status' => 'any');
    $getauthorproject = new WP_Query($query);
	$temp=array();
	if ($getauthorproject->have_posts() ) :
	while ( $getauthorproject->have_posts() ) : $getauthorproject->the_post();
    $temp[] = get_the_ID() ;
    endwhile;
	endif;
	if(count($temp)!=0):
	$userprojectID=$temp[0];
	endif;

if($userprojectID!=0):

$currentproject=get_post($userprojectID);


$paymenttable = $wpdb->prefix . 'user_payments';
$paymenttablequery = "SELECT *, (SELECT SUM(amount) FROM $paymenttable where projectID = ".$userprojectID.") AS totalfund FROM $paymenttable where projectID = ".$userprojectID;
$fundedInvestors = $wpdb->get_results($paymenttablequery, OBJECT);

$graphtablequery = "SELECT SUM(amount) as amount, timeCreated FROM $paymenttable where projectID = ".$userprojectID." GROUP BY timeCreated LIMIT 7";
$fundedgraph= $wpdb->get_results($graphtablequery, OBJECT);

$jsondata = array();
foreach($fundedgraph as $result){
	  $date = strtotime($result->timeCreated) * 1000;
	  $jsondata[]=array($date,$result->amount);
}


$emailistquery="SELECT gybi_cartpauj_pm_messages.*, gybi_message_taxonomy.name, gybi_message_taxonomy.colorcode from gybi_cartpauj_pm_messages 
LEFT JOIN gybi_message_taxonomy
ON gybi_cartpauj_pm_messages.message_category = gybi_message_taxonomy.id 
WHERE gybi_cartpauj_pm_messages.to_user={$_currentuser} 
LIMIT 10";
$emaillist=$wpdb->get_results($emailistquery,OBJECT);
$get_pms=0;
$messagerows = $wpdb->get_results($wpdb->prepare("SELECT id FROM gybi_cartpauj_pm_messages WHERE (to_user = %d AND parent_id = 0 AND to_del <> 1 AND message_read = 0 AND last_sender <> %d) OR (from_user = %d AND parent_id = 0 AND from_del <> 1 AND message_read = 0 AND last_sender <> %d)", $_currentuser, $_currentuser, $_currentuser, $_currentuser));
if(count($emaillist) > 0)$get_pms=count($emaillist);


endif;

?>
<?php
					$dashboardcheckquery = array('posts_per_page' => '-1','author' => $_currentuser,'post_type'=> 'project');
					$dashboardcheck = new WP_Query($dashboardcheckquery);?>

<div class="dashboard-section">
  <?php if (!$dashboardcheck->have_posts() ) :
					$url = home_url('/update-project');
					?>
  <div class="alert alert-danger fade in dashboard-alert" id="message">
    <p> Your project profile is not yet created/approved. Please do it now by clicking <a href="<?php echo $url; ?>" class="btn btn-danger">here</a> OR <a class="btn btn-success" href="<?php echo home_url('/admin-notifications') ?>">Contact Administrator</a>.</p>
  </div>
  <div class="dashboard-section-overlay"></div>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <div class="dashboard-tile detail tile-red">
        <div class="content" style="padding-right:100px;"> <a href="<?php echo home_url('/business-details') ?>">Update Your Business Details to get more investors</a> </div>
        <div class="icon"><i class="fa fa-file-text"></i> </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="dashboard-tile detail tile-turquoise">
        <div class="content" style="padding-right:100px;"> <a href="<?php echo home_url('/project-status-list') ?>">Keep Investors Up-to-date on Project Status</a><br />
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
          <a href="<?php echo home_url('/funds-list') ?>">Total Fund Raised so far</a> </div>
        <div class="icon"><i class="fa fa-bar-chart-o"></i> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Last 7 days Fund Trending</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body">
          <div id="sales-chart" style="height: 250px;"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Investors in your locality</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body">
          <div class="map" id="map" style="height: 250px;"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Latest Messages</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body">
          <div class="r3_notification db_box" style="max-height:300px; min-height:300px;">
            <?php 
if(count($emaillist)==0):
?>
            <div class="alert alert-warning alert-dismissable" > There are no messages in your Inbox</div>
            <?php endif; ?>
            <ul class="list-unstyled notification-widget">
              <?php 
			    $i = 1; 
			    foreach($emaillist as $emaill): 
				$row_class = (++$i % 2) ? 'status-available' : 'status-away';
				um_fetch_user($emaill->from_user);
				?>
              <li class="unread <?php echo $row_class; ?>"> <a href="<?php echo get_permalink(314) ?>?pmaction=viewmessage&id=<?php echo $emaill->id; ?>">
                <div class="user-img"> <?php echo get_avatar( um_user('ID'), 50); ?> </div>
                <div> <span class="name"> <strong><?php echo $emaill->message_title; ?></strong> </span> <span class="desc small"> <?php echo wp_trim_words($emaill->message_contents,10); ?> </span> </div>
                </a> <span class="time small"><?php echo date("M d h:i A", strtotime($emaill->date)); ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="panel-footer text-center"> <a href="<?php echo home_url('/messages') ?>">View All Messages</a> </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Supporters Matched with your profile</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body" style="height:320px;">
          <?php
$currentusercountry=get_field('country', $currentproject->ID);
		$args = array(
		'orderby'       =>  'post_date',
		'order'         =>  'ASC',
		'post_type' => 'supporter',
		'posts_per_page' => -1,
		'tax_query'=>array(array('taxonomy' => 'wp_cc_tax_country','field'=>'term_id','value' => $currentusercountry->term_id,'operator' => 'LIKE'))
		);

	$supporters = new WP_query($args);
	?>
          <?php if(!$supporters->have_posts()): ?>
          <div class="alert alert-warning alert-dismissable" style="margin-top:70px;"> No data found</div>
          <?php endif; ?>
          <?php 
  				$i = 1; 
				
			while ( $supporters->have_posts() ) : $supporters->the_post();
$author_id = $post->post_author;
	um_fetch_user($author_id);
	$row_class = (++$i % 2) ? 'bg-default' : 'bg-info';
	
	?>
          <div class="row profile-widget-dashboard">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="<?php //echo $row_class; ?> clearfix profile-widget">
                <div class="col-md-3">
                  <?php	 echo get_avatar( $author_id, 75);  ?>
                </div>
                <div class="col-md-9"> <a href="<?php echo get_permalink() ?>" title="<?php the_title_attribute( 'echo=0' ) ?>" rel="bookmark"> <?php echo the_author_meta( 'user_nicename' , $author_id ); ?> </a>
                  <p class="uprofile-title">United States</p>
                  <div class="profile-rating pull-right"> <?php echo do_shortcode('[yasr_visitor_votes size="small"]'); ?> </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <div class="panel-footer text-center"> <a href="<?php echo home_url("/supporter") ?>">View All Supporters</a> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Investors Matched with your profile</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body investors-widget" style="min-height:150px;">
          <?php
$currentusercountry=get_field('country', $currentproject->ID);
		$args = array(
		'orderby'       =>  'post_date',
		'order'         =>  'ASC',
		'post_type' => 'investor',
		'posts_per_page' => -1,
		'meta_query'=>array(array('key' => 'country_of_interest','value' => $currentusercountry->term_id,'compare' => 'LIKE'))
		);

	$investors = new WP_query($args);
	?>
          <?php if(!$investors->have_posts()): ?>
          <div class="alert alert-warning alert-dismissable" style="margin-top:70px;"> No data found</div>
          <?php endif; ?>
          <?php while ( $investors->have_posts() ) : $investors->the_post();
$author_id = $post->post_author;
	um_fetch_user($author_id);	
	?>
          <div class="col-md-4 ">
            <div class="profile-item">
              <div class="col-sm-5"> <a href="<?php echo get_permalink() ?>" title="<?php the_title_attribute( 'echo=0' ) ?>" rel="bookmark">
                <?php
				  echo get_avatar( $author_id, 100); 
				  ?>
                </a> </div>
              <div class="col-sm-7">
                <h5 style="margin-top:0px;"> <a href="<?php echo get_permalink() ?>" title="<?php the_title_attribute( 'echo=0' ) ?>" rel="bookmark"> <?php echo the_author_meta( 'user_nicename' , $author_id ); ?> </a></h5>
                <p class="uprofile-title">United States</p>
                <p class="pull-right"> <?php echo do_shortcode('[yasr_visitor_votes size="small"]'); ?> </p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <div class="panel-footer text-center"> <a href="<?php echo home_url("/investor") ?>">View All Investors</a> </div>
      </div>
    </div>
  </div>
  
  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Your Project Updates</h3>
          <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
        </div>
        <div class="panel-body dashboard-timeline-widget" style="min-height:150px;">
        <div class="container project-status-timeline dashboard-timeline">
      <div class="timeline-container top-circle">
              <section class="timeline">
              
                <?php 
	global $current_user;
    get_currentuserinfo();
    $projeststatusuery = array('posts_per_page' => '-1','author' => $current_user->ID,'post_type'=> 'project','post_status' => 'any');
    $projeststatuslist = new WP_Query($projeststatusuery);
			
	$query = new WP_Query( array(
		'post_type' => 'project-status',
		'posts_per_page' => -1,
		'author' => $user_id,
		'orderby'=>'date',
		'order'=>'DESC',
		'post_status' => array(
			'publish',
			'pending',
		)
	)
	);
	?>
              
                   <?php  while($query->have_posts()): $query->the_post(); ?>    
                <div class="timeline-block">
                  <div class="timeline-point warning text-center">
                    <i class="fa fa-map-marker fs-32" ></i>
                  </div>
                  <!-- timeline-point -->
                  <div class="timeline-content">
                    <div class="share full-width">
                      <div class="card-header clearfix">
                        <h5><?php echo the_title(); ?></h5>
                      </div>
                      <div class="card-description"><?php echo wp_trim_words(get_the_content(),10); ?>
                      </div>
                    </div>
                    <div class="event-date">
                      <span class="fs-12 hint-text"><?php echo get_the_date("M d h:i A"); ?></span>
                    </div>
                  </div>
                  <!-- timeline-content -->
                </div>
                 <?php endwhile; ?>
              </section>
            </div>
      
      
    </div>
        </div>
        <div class="panel-footer text-center"> <a href="<?php echo home_url("/project-status-list") ?>">View All Updates</a> </div>
      </div>
    </div>
  </div>
  
  
</div>
<script>
    jQuery(document).ready(function() {
        app.map();
		app.timer();
       app.perfectScroller();
    });
    </script>
<script>
(function($)
{

sales_chart =
  {
    data:
    {
      d1: []
    },

    plot: null,

    options:
    {
      grid:
      {
        autoHighlight: false,
        backgroundColor: null,
        color: '#c6f4eb',
        borderWidth: 0,
        borderColor: "transparent",
        clickable: true,
        hoverable: true
      },
      series: {
        lines: {
          show: true,
          fill: false,
          lineWidth: 2,
          steps: false
        },
        points: {
          show:true,
          radius: 3,
          lineWidth: 2,
          fill: true,
          fillColor: "#000"
        }
      },
      xaxis: {
		  mode: "time",
    timeformat: "%d/%m"	  },
      yaxis: {
        tickSize: 3000,
        tickColor: '#F1F2F7'
      },
      legend: { show:false },
      shadowSize: 0,
      tooltip: true,
      tooltipOpts: {
        content: "%s : %y.3",
        shifts: {
          x: -30,
          y: -50
        },
        defaultTheme: false
      }
    },

    placeholder: "#sales-chart",

    init: function()
    {
      this.options.colors = ["#3598db"];
      this.options.grid.backgroundColor = null;

      var that = this;

      if (this.plot == null)
      {
        this.data.d1 = <?php echo json_encode($jsondata); ?>;

      }
        //var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];
      this.plot = $.plot(
        $(this.placeholder),
        [{
          label: "Data 1",
          data: this.data.d1,
          lines: { fill: 0.00 },
          points: { fillColor: "#fff" }
        }], this.options);
    }
  };


  function showTooltip(x, y, contents) {
    $('<div class="chart-tooltip">$' + contents + '</div>').css( {
      position: 'absolute',
      display: 'none',
      top: y + 5,
      left: x + 5,
      opacity: 0.80
    }).appendTo("body").fadeIn(200);
  }


  $('#sales-chart').bind("plothover", function (event, pos, item) {
    $("#x").text(pos.x.toFixed(2));
    $("#y").text(pos.y.toFixed(2));

    if (item) {
      if (previousPoint != item.dataIndex) {
        previousPoint = item.dataIndex;

        $(".chart-tooltip").remove();
        var x = item.datapoint[0].toFixed(2),
          y = item.datapoint[1].toFixed(2);

        showTooltip(item.pageX, item.pageY, y);
      }
    }
    else {
      $(".chart-tooltip").remove();
      previousPoint = null;
    }
  });


   sales_chart.init();


})(jQuery);
		
		</script>
</div>
