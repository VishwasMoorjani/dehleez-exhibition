<?php include('header.php'); ?>

<style>
    #calendar {
      max-width: 1200px;
      margin: 40px auto;
    }
    
    #calendar a{
        color:#000;
        fill:#000;
    }
    
    #calendar table tr td{
        padding:0px;
    }
    
    .fc .fc-bg-event {
        opacity:1 !important;
    }
    
    .fc .fc-bg-event .fc-event-title{
        margin-top:40px;
        color:#fff;
    }
    
    .fc-day-other {
        opacity: 0;
    }
    
    
.bg-gradient-primary {
  background-image: linear-gradient(195deg, #EC407A 0%, #D81B60 100%) !important;
}

.bg-gradient-secondary {
  background-image: linear-gradient(195deg, #747b8a 0%, #495361 100%) !important;
}

.bg-gradient-success {
  background-image: linear-gradient(195deg, #66BB6A 0%, #43A047 100%) !important;
}

.bg-gradient-info {
  background-image: linear-gradient(195deg, #49a3f1 0%, #1A73E8 100%) !important;
}

.bg-gradient-warning {
  background-image: linear-gradient(195deg, #FFA726 0%, #FB8C00 100%) !important;
}

.bg-gradient-danger {
  background-image: linear-gradient(195deg, #EF5350 0%, #E53935 100%) !important;
}

.bg-gradient-light {
  background-image: linear-gradient(195deg, #EBEFF4 0%, #CED4DA 100%) !important;
}

.bg-gradient-dark {
  background-image: linear-gradient(195deg, #42424a 0%, #191919 100%) !important;
}

.bg-gradient-faded-primary {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(233, 30, 99, 0.6) 0, #c1134e 100%) !important;
}

.bg-gradient-faded-secondary {
  background-image: radial-gradient(370px circle at 80% 50%, #747b8a, #626780 100%) !important;
}

.bg-gradient-faded-success {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(76, 175, 80, 0.6) 0, #3d8b40 100%) !important;
}

.bg-gradient-faded-info {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(26, 115, 232, 0.6) 0, #135cbc 100%) !important;
}

.bg-gradient-faded-warning {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(251, 140, 0, 0.6) 0, #c87000 100%) !important;
}

.bg-gradient-faded-danger {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(244, 67, 53, 0.6) 0, #e91d0d 100%) !important;
}

.bg-gradient-faded-light {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(240, 242, 245, 0.6) 0, #d1d7e1 100%) !important;
}

.bg-gradient-faded-dark {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(52, 71, 103, 0.6) 0, #233045 100%) !important;
}

.bg-gradient-faded-white {
  background-image: radial-gradient(370px circle at 80% 50%, rgba(255, 255, 255, 0.6) 0, #e6e6e6 100%) !important;
}

.bg-gradient-faded-primary-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(233, 30, 99, 0.3) 0, #e91e63 100%) !important;
}

.bg-gradient-faded-secondary-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, #747b8a 0, #7b809a 100%) !important;
}

.bg-gradient-faded-success-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(76, 175, 80, 0.3) 0, #4CAF50 100%) !important;
}

.bg-gradient-faded-info-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(26, 115, 232, 0.3) 0, #1A73E8 100%) !important;
}

.bg-gradient-faded-warning-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(251, 140, 0, 0.3) 0, #fb8c00 100%) !important;
}

.bg-gradient-faded-danger-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(244, 67, 53, 0.3) 0, #F44335 100%) !important;
}

.bg-gradient-faded-light-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(240, 242, 245, 0.3) 0, #f0f2f5 100%) !important;
}

.bg-gradient-faded-dark-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(52, 71, 103, 0.3) 0, #344767 100%) !important;
}

.bg-gradient-faded-white-vertical {
  background-image: radial-gradient(200px circle at 50% 70%, rgba(255, 255, 255, 0.3) 0, #fff 100%) !important;
}

</style>

<!--<link rel="stylesheet" href="<?= base_url('assets/front/css/customcalender.css'); ?>" type="text/css">-->

<!-- heading -->
<section class="inner-pages text-center">
  <div class="container">
    <div class="white_text div_zindex">
      <h1 class="page_title">Exhibition Calender</h1>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<div class="container-fluid py-4">
  <div class="row">
    
    <section id="account">
      <div class="container">
        <div class="row g-0">
          <div class="col-xl-3">
            <div class="myaawwinr">
              <h3>My Profile</h3>
              <ul class="hhhshs list-unstyled">
                        <li><a href="<?=base_url('user/myaccount');?>">My Account</a></li>
                        <li><a href="<?=base_url('user/editprofile');?>">Edit Profile</a></li>
                        <li><a href="<?=base_url('upcoming');?>">Upcoming Exhibition</a></li>                        
                        <li><a href="<?= base_url('user/order_history/' . $account['id']) ?>">My Orders</a></li>
                        <li><a href="<?= base_url('user/wallet') ?>">My Wallet</a></li>
                        <li><a href="<?= base_url('user/transcation') ?>">My Transcation</a></li>
                        <li><a href="<?= base_url('user/calender') ?>">Exhibition Calender</a></li>
                        <!-- <li><a href="<?= base_url('user/wishlist'); ?>">Wishlist</a></li> -->
                        <li><a href="<?= base_url('user/changepassword') ?>">Change Password</a></li>
                        <li><a href="<?= base_url('user/logout') ?>">Log Out</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-9">
            <div class="card card-calendar">
              <div class="card-body p-3">
                <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
  
</div>
</main>

<?php include('footer.php'); ?>
<!--<script src="<?=base_url('assets/front/js/fullcalendar.min.js');?>"></script>-->

<!--<script>-->
<!--  var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {-->
<!--    contentHeight: 'auto',-->
<!--    initialView: "dayGridMonth",-->
<!--    headerToolbar: {-->
<!--      start: 'title', -->
<!--      center: '',-->
<!--      end: 'today prev,next' -->
<!--    },-->
    <!--// selectable: true,-->
    <!--// editable: true,-->
<!--    initialDate: '<?= date("Y-m-d"); ?>',-->
<!--    events: [-->
<!--      <?php //foreach ($exhibitions as $exhibition) { ?> {-->
<!--          title: '<?= $exhibition['name'] ?>',-->
<!--          start: '<?= date("Y-m-d", strtotime($exhibition['start_date'])) ?>',-->
<!--          end: '<?= date("Y-m-d", strtotime($exhibition['end_date'])) ?>',-->
          <?php
        //   $date1 = new DateTime($exhibition['start_date']);
        //   $date2 = new DateTime($exhibition['end_date']);
        //   $date3 = new DateTime();
        //   if ($date2 < $date3) {
        //     $status = "danger";
        //   } elseif ($date1 > $date3) {
        //     $status = "info";
        //   } else {
        //     $status = "success";
        //   }
          ?>
        <!--  className: 'bg-gradient-<?= $status ?>'-->
        <!--},-->
<!--      <?php //} ?>-->


      <!--// {-->
      <!--//   title: 'All day conference',-->
      <!--//   start: '2020-11-29',-->
      <!--//   end: '2020-11-29',-->
      <!--//   className: 'bg-gradient-success'-->
      <!--// },-->

      <!--// {-->
      <!--//   title: 'Meeting with Mary',-->
      <!--//   start: '2020-12-01',-->
      <!--//   end: '2020-12-01',-->
      <!--//   className: 'bg-gradient-info'-->
      <!--// },-->

      <!--// {-->
      <!--//   title: 'Black Friday',-->
      <!--//   start: '2020-12-23',-->
      <!--//   end: '2020-12-23',-->
      <!--//   className: 'bg-gradient-info'-->
      <!--// },-->

      <!--// {-->
      <!--//   title: 'Cyber Week',-->
      <!--//   start: '2020-12-02',-->
      <!--//   end: '2020-12-02',-->
      <!--//   className: 'bg-gradient-warning'-->
      <!--// },-->

<!--    ],-->
<!--    views: {-->
<!--      month: {-->
<!--        titleFormat: {-->
<!--          month: "long",-->
<!--          year: "numeric"-->
<!--        }-->
<!--      },-->
<!--      agendaWeek: {-->
<!--        titleFormat: {-->
<!--          month: "long",-->
<!--          year: "numeric",-->
<!--          day: "numeric"-->
<!--        }-->
<!--      },-->
<!--      agendaDay: {-->
<!--        titleFormat: {-->
<!--          month: "short",-->
<!--          year: "numeric",-->
<!--          day: "numeric"-->
<!--        }-->
<!--      }-->
<!--    },-->
<!--  });-->

<!--  calendar.render();-->

<!--  var ctx1 = document.getElementById("chart-line-1").getContext("2d");-->
<!--</script>-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: "UTC",
    firstDay: "1",
    initialView: "multiMonthFourMonth",
    multiMonthMaxColumns: 1,
     views: {
    multiMonthFourMonth: {
      type: 'multiMonth',
      duration: { months: 3 }
    }
  },
    initialDate: '<?= date("Y-m-d"); ?>',
    events: [
        <?php foreach ($exhibitions as $exhibition) { ?> {
            title: '<?= $exhibition['name'] ?>',
            start: '<?= date("Y-m-d", strtotime($exhibition['start_date'])) ?>',
            end: '<?= date("Y-m-d", strtotime($exhibition['end_date'] . ' +1 day')) ?>',
          <?php
          $date1 = new DateTime($exhibition['start_date']);
          $date2 = new DateTime($exhibition['end_date']);
          $date3 = new DateTime();
          if ($date2 < $date3) {
            $status = "danger";
          } elseif ($date1 > $date3) {
            $status = "success";
          } else {
            $status = "info";
          }
          ?>
         className: 'bg-gradient-<?= $status ?>'
        //  display: 'background'
         
        },
      <?php } ?>

    ],
  });

  calendar.render();
});

</script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>