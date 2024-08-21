<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>

<div class="container-fluid py-4">
  <div class="row">
    <!-- <div class="col-12 ms-auto">
      <div class="d-flex mb-4">
        <div class="pe-4 mt-1 position-relative ms-auto">
          <p class="text-secondary text-sm mb-2">Team members:</p>
          <div class="d-flex align-items-center justify-content-center">
            <div class="avatar-group">
              <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" title="Jessica Rowland">
                <img alt="Image placeholder" src="../../assets/img/team-1.jpg" class>
              </a>
              <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" title="Audrey Love">
                <img alt="Image placeholder" src="../../assets/img/team-2.jpg" class="rounded-circle">
              </a>
              <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" title="Michael Lewis">
                <img alt="Image placeholder" src="../../assets/img/team-3.jpg" class="rounded-circle">
              </a>
              <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" title="Lucia Linda">
                <img alt="Image placeholder" src="../../assets/img/team-4.jpg" class="rounded-circle">
              </a>
              <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" title="Ronald Miller">
                <img alt="Image placeholder" src="../../assets/img/team-5.jpg" class="rounded-circle">
              </a>
            </div>
          </div>
          <hr class="vertical dark mt-0">
        </div>
        <div class="ps-4">
          <button class="btn btn-outline-dark btn-icon-only mb-0 mt-3" data-bs-toggle="modal" data-target="#new-board-modal">
            <i class="material-icons text-sm font-weight-bold">
              add
            </i>
          </button>
        </div>
      </div>
    </div> -->
    <div class="col-xl-12">
      <div class="card card-calendar">
        <div class="card-body p-3">
          <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
        </div>
      </div>
    </div>
    <!-- <div class="col-xl-3">
      <div class="row">
        <div class="col-xl-12 col-md-6 mt-xl-0 mt-4">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <h6 class="mb-0">Next events</h6>
            </div>
            <div class="card-body border-radius-lg p-3">
              <div class="d-flex">
                <div class="icon icon-shape bg-gradient-dark shadow text-center">
                  <i class="material-icons opacity-10 pt-1">attach_money</i>
                </div>
                <div class="ms-3">
                  <div class="numbers">
                    <h6 class="mb-1 text-dark text-sm">Cyber Week</h6>
                    <span class="text-sm">27 March 2021, at 12:30 PM</span>
                  </div>
                </div>
              </div>
              <div class="d-flex mt-4">
                <div class="icon icon-shape bg-gradient-dark shadow text-center">
                  <i class="material-icons opacity-10 pt-1">notifications</i>
                </div>
                <div class="ms-3">
                  <div class="numbers">
                    <h6 class="mb-1 text-dark text-sm">Meeting with Marry</h6>
                    <span class="text-sm">24 March 2021, at 10:00 PM</span>
                  </div>
                </div>
              </div>
              <div class="d-flex mt-4">
                <div class="icon icon-shape bg-gradient-dark shadow text-center">
                  <i class="material-icons opacity-10 pt-1">auto_stories</i>
                </div>
                <div class="ms-3">
                  <div class="numbers">
                    <h6 class="mb-1 text-dark text-sm">Book Deposit Hall</h6>
                    <span class="text-sm">25 March 2021, at 9:30 AM</span>
                  </div>
                </div>
              </div>
              <div class="d-flex mt-4">
                <div class="icon icon-shape bg-gradient-dark shadow text-center">
                  <i class="material-icons opacity-10 pt-1">local_shipping</i>
                </div>
                <div class="ms-3">
                  <div class="numbers">
                    <h6 class="mb-1 text-dark text-sm">Shipment Deal UK</h6>
                    <span class="text-sm">25 March 2021, at 2:00 PM</span>
                  </div>
                </div>
              </div>
              <div class="d-flex mt-4">
                <div class="icon icon-shape bg-gradient-dark shadow text-center">
                  <i class="material-icons opacity-10 pt-1">palette</i>
                </div>
                <div class="ms-3">
                  <div class="numbers">
                    <h6 class="mb-1 text-dark text-sm">Verify Dashboard Color Palette</h6>
                    <span class="text-sm">26 March 2021, at 9:00 AM</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-md-6 mt-4">
          <div class="card bg-gradient-dark">
            <div class="card-header bg-transparent p-3 pb-0">
              <div class="row">
                <div class="col-7">
                  <h6 class="text-white mb-0">Productivity</h6>
                  <p class="text-sm text-white">
                    <i class="material-icons text-success text-sm">
                      arrow_upward
                    </i>
                    <span class="font-weight-bold">4% more</span> in 2021
                  </p>
                </div>
                <div class="col-5 text-end">
                  <div class="dropdown me-3">
                    <a class="cursor-pointer" href="javascript:;" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                      <i class="material-icons text-white text-sm">
                        settings
                      </i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end ms-n5 px-2 py-3" aria-labelledby="dropdownTable" data-popper-placement="bottom-start">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="chart">
                <canvas id="chart-line-1" class="chart-canvas" height="100"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <!-- <footer class="footer py-4  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>,
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
            for a better web.
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
                Us</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer> -->
</div>
</main>

<?php $this->load->view('staff/footer'); ?>
<script>
  var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
    contentHeight: 'auto',
    initialView: "dayGridMonth",
    headerToolbar: {
      start: 'title', // will normally be on the left. if RTL, will be on the right
      center: '',
      end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
    },
    selectable: true,
    editable: true,
    initialDate: '<?= date("Y-m-d"); ?>',
    events: [
      <?php foreach ($exhibitions as $exhibition) { ?> {
          title: '<?= $exhibition['name'] ?>',
          start: '<?= date("Y-m-d", strtotime($exhibition['start_date'])) ?>',
          end: '<?= date("Y-m-d", strtotime($exhibition['end_date'])) ?>',
          <?php
          $date1 = new DateTime($exhibition['start_date']);
          $date2 = new DateTime($exhibition['end_date']);
          $date3 = new DateTime();
          if ($date2 < $date3) {
            $status = "danger";
          } elseif ($date1 > $date3) {
            $status = "info";
          } else {
            $status = "success";
          }
          ?>
          className : 'bg-gradient-<?=$status?>'
        },
      <?php } ?>


      // {
      //   title: 'All day conference',
      //   start: '2020-11-29',
      //   end: '2020-11-29',
      //   className: 'bg-gradient-success'
      // },

      // {
      //   title: 'Meeting with Mary',
      //   start: '2020-12-01',
      //   end: '2020-12-01',
      //   className: 'bg-gradient-info'
      // },

      // {
      //   title: 'Black Friday',
      //   start: '2020-12-23',
      //   end: '2020-12-23',
      //   className: 'bg-gradient-info'
      // },

      // {
      //   title: 'Cyber Week',
      //   start: '2020-12-02',
      //   end: '2020-12-02',
      //   className: 'bg-gradient-warning'
      // },

    ],
    views: {
      month: {
        titleFormat: {
          month: "long",
          year: "numeric"
        }
      },
      agendaWeek: {
        titleFormat: {
          month: "long",
          year: "numeric",
          day: "numeric"
        }
      },
      agendaDay: {
        titleFormat: {
          month: "short",
          year: "numeric",
          day: "numeric"
        }
      }
    },
  });

  calendar.render();

  var ctx1 = document.getElementById("chart-line-1").getContext("2d");
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>