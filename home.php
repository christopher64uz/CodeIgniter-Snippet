<?php

$icon_lock = array(
  'class' => 'icon-lock'

);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LT</title>

    <!-- Assets -->
    <link rel="stylesheet" href="<?= base_url(); ?>/html/assets/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/html/assets/css/style.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">  
      var base_url = '<?=base_url();?>';
   </script>
</head>
<body>
<!-- Fixed navbar -->
    <nav class="navbar navbar-localtable navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-text" aria-expanded="false" aria-controls="navbar-text">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>/html/assets/images/logo-box.png" alt="LT" height="45px" id="logo_red" /></a>
        </div>
        <div id="navbar-text" class="collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url(); ?>biz"><span class="block help_label">Overview</span></a></li>
            <li><a href="<?= base_url(); ?>biz/calendar"><span class="block help_label">Calendar</span></a></li>
            <li><a href="<?= base_url(); ?>biz/staff"><span class="block help_label">Staff</span></a></li>
            <li><a href="<?= base_url(); ?>biz/venue"><span class="block help_label">Venue</span></a></li>
            <li><a href="<?= base_url(); ?>biz/customer"><span class="block help_label">Customer</span></a></li>
            <li><a href="<?= base_url(); ?>biz/message"><span class="block help_label">Message</span></a></li>
            <li><a href="<?= base_url(); ?>biz/reports"><span class="block help_label">Report</span></a></li>
            <li><a href="<?= base_url(); ?>biz/settings"><span class="block help_label">Settings</span></a></li>
            <li><a href="<?= base_url(); ?>auth/logout"><span class="block help_label">Log Out</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url(); ?>biz" class="help_link"><i class="fa fa-newspaper-o"></i><span class="block help_label">Overview</span></a></li>
            <li><a href="<?= base_url(); ?>biz/calendar" class="help_link"><i class="fa fa-calendar"></i><span class="block help_label">Calendar</span></a></li>
            <li><a href="<?= base_url(); ?>biz/staff" class="help_link"><i class="fa fa-users"></i><span class="block help_label">Staff</span></a></li>
            <li><a href="<?= base_url(); ?>biz/venue" class="help_link"><i class="fa fa-building-o"></i><span class="block help_label">Venue</span></a></li>
            <li><a href="<?= base_url(); ?>biz/customer" class="help_link"><i class="fa fa-heartbeat"></i><span class="block help_label">Customer</span></a></li>
            <li><a href="<?= base_url(); ?>biz/message" class="help_link"><i class="fa fa-comments-o"></i><span class="block help_label">Message</span></a></li>
            <li><a href="<?= base_url(); ?>biz/reports" class="help_link"><i class="fa fa-bar-chart-o"></i><span class="block help_label">Report</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="help_link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus"></i><span class="block help_label">Add</span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url(); ?>biz/calendar/new/<?= gmdate('U',time()+date("Z"));?>/<?= gmdate('U',time()+date("Z"));?>">Add New Event</a></li>
                <li><a href="<?= base_url(); ?>biz/staff/new">Add New Staff</a></li>
                <li><a href="<?= base_url(); ?>biz/venue/new">Add New Venue</a></li>
                <li><a href="<?= base_url(); ?>biz/message/new">Add New Message</a></li>
              </ul>
            </li>
            <li><a href="<?= base_url(); ?>biz/settings" class="help_link"><i class="fa fa-cog"></i><span class="block help_label">Settings</span></a></li>
            <li><a href="#" target="_new" class="help_link"><i class="fa fa-life-ring"></i><span class="block help_label">Help</span></a></li>
            <li class="dropdown"><a href="#" class="help_link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i><span class="block help_label"><?= $logged_in_firstname; ?></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url(); ?>biz/settings/user">My Profile</a></li>
                <li><a href="<?= base_url(); ?>biz/settings/user#change_password">Change Password</a></li>
                <li><a href="<?= base_url(); ?>biz/settings/user#email_notifications">Email Notifications</a></li>
                <li><a href="<?= base_url(); ?>dashboard/schedule">My Schedule</a></li>
                <!-- <li><a href="<?= base_url(); ?>biz/settings/changes">Changes <span class="badge red"><?php if($no_changes_logged > 0):?><?=$no_changes_logged;?><?php else:?><?php endif;?></span></a></li> -->
                <li class="divider"></li>
                <li class="dropdown-header">Happy <?= date('l'); ?>!</li>
                <li><a href="<?= base_url(); ?>auth/logout">Sign Out <i class="fa fa-sign-out font-small"></i></a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid" style="min-height: 100%; padding-bottom: 10px;">
        <?php if($this->session->flashdata('success'))
                      {
                          echo "<div class='row m-b-n'>";
                          echo "<div class='col-md-6 col-md-offset-3'>";
                          echo "<div class='alert alert-success text-md text-center'>";
                          echo $this->session->flashdata('success');
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                      }
        ?>
        <?php if($this->session->flashdata('errors'))
                      {
                          echo "<div class='row m-b-n'>";
                          echo "<div class='col-md-6 col-md-offset-3'>";
                          echo "<div class='alert alert-error text-md text-center'>";
                          echo $this->session->flashdata('errors');
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                      }
        ?>

        <div class="row m-t">
          <div class="col-xs-6">
            <h2><?=$company_name; ?></h2>
          </div>
          <div class="col-xs-6 text-right">
            <h2 class="font-light"><?= date('l\, F jS'); ?></h2>
          </div>
        </div>

        <div class="row m-t">
          <div class="col-lg-6">
          <h5 class="b-vertical p-vertical text-uc">Today's Events</h5>
             <?php if($todays_events): ?>
                  <?php if(is_array($todays_events)): ?>
                    <?php foreach($todays_events as $today_event): ?>
                    <div class="col-lg-12 b-b">
                      <p class="h4">
                        <span class="dot-status <?= $today_event->className; ?>"></span>
                        <a href="#" class="double_click" id="<?= $today_event->unique_id; ?>" onclick="showTodayChevron(<?= $today_event->unique_id; ?>)"><span class="text-header"><b><?= $today_event->event_name; ?></b></span></a>
                        <a id="today_event<?= $today_event->unique_id; ?>" class="hide" href="#" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" data-content='<ul class="popover-menu"><li><a href="<?=base_url();?>biz/calendar/edit/<?= $today_event->unique_id; ?>">Edit Event</a></li><li><a href="<?=base_url();?>biz/reports/standard/6/<?= $today_event->unique_id; ?>" target="_new">View Roster</a></li></ul>'><b><i class="fa fa-chevron-down text-header"></i></b></a>
                        <br />
                        <span class="font-thin" style="padding-left: 15px;"><?= $today_event->venue_name; ?></span>
                        <br />
                        <span class="font-thin text-muted" style="padding-left: 15px;"><?= gmdate('D n\/j g\:i a',$today_event->event_start_unix); ?> - <?= gmdate('g\:i a',$today_event->event_end_unix); ?></span>
                      </p>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php else: ?>
                    You don't have an event today. To add an event simply:
                    <ol>
                      <li>Click <b>Calendar</b> on the top menu</li>
                      <li>Click <b>Add Event</b> button</li>
                      <li>Fill out the required information</li>
                      <li>Click <b>Save</b></li>
                    </ol>
                  <?php endif; ?>
          </div>
          <div class="col-lg-6">
          <h5 class="b-vertical p-vertical text-uc">Upcoming Events</h5>
            <?php if($upcoming_events): ?>
                  <?php if(is_array($upcoming_events)): ?>
                    <?php foreach($upcoming_events as $up_event): ?>
                    <div class="col-lg-12 b-b">
                      <p class="h4">
                        <span class="dot-status <?= $up_event->className; ?>"></span>
                        <a href="#" class="double_click" id="<?= $up_event->unique_id; ?>" onclick="showUpComingChevron(<?= $up_event->unique_id; ?>)"><span class="text-header"><b><?= $up_event->event_name; ?></b></span></a>
                        <a id="upcoming_event<?= $up_event->unique_id; ?>" class="hide" href="#" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" data-content='<ul class="popover-menu"><li><a href="<?=base_url();?>biz/calendar/edit/<?= $up_event->unique_id; ?>">Edit Event</a></li><li><a href="<?=base_url();?>biz/reports/standard/6/<?= $up_event->unique_id; ?>" target="_new">View Roster</a></li></ul>'><b> <i class="fa fa-chevron-down text-header"></i></b></a>
                        <br />
                        <span class="font-thin" style="padding-left: 15px;"><?= $up_event->venue_name; ?></span>
                        <br />
                        <span class="font-thin text-muted" style="padding-left: 15px;"><?= gmdate('D n\/j g\:i a',$up_event->event_start_unix); ?> - <?= gmdate('g\:i a',$up_event->event_end_unix); ?></span>
                      </p>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php else: ?>
                    Currently, you don't have an upcoming event. Add a new event from the calendar section.
                    <ol>
                      <li>Click <b>Calendar</b> on the top menu</li>
                      <li>Click <b>Add Event</b> button</li>
                      <li>Fill out the required information</li>
                      <li>Click <b>Save</b></li>
                    </ol>
                  <?php endif; ?>
          </div>
        </div>

    </div> <!-- end container -->
    <footer class="footer subfoot hidden-sm hidden-xs">
      <div class="container-fluid">
        <div class="col-lg-12 n-p">
          <hr class="hr n-m">
          <ul class="pull-right nav navbar-nav">
            <li>
              <a href="">©2015 Chris Uz, CU</a>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li>
              <a href="#" target="_new">Help & Support</a>
            </li>
            <li>
              <a href="https://localhost/lt/privacypolicy.pdf" target="_new">Privacy Policy</a>
            </li>
            <li>
              <a href="https://localhost/lt/tos.pdf" target="_new">Terms of Use</a>
            </li>
            <li>
              <a href="https://localhost/lt/tos.pdf" target="_new">Service Agreement</a>
            </li>
            <li>
              <a href="#" tabindex="0" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" data-content='<ul class="footer-popover-menu"><li><span class="dot-status red"></span> Shifts have yet to be entered</li><hr class="standard-list-item-separator"><li><span class="dot-status orange"></span> Shifts are entered but staff has not responded</li><hr class="standard-list-item-separator"><li><span class="dot-status blue"></span> Shifts are entered and at least a staff member has responded</li><hr class="standard-list-item-separator"><li><span class="dot-status green"></span> Event is fully staffed</li></ul>'>Color Key</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="<?= base_url(); ?>html/assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>html/assets/js/biz.app.js"></script>
  <!-- GA -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-43600919-1', 'auto');
    ga('send', 'pageview');

  </script>
</body>
</html>