<?php include view("home", "header"); ?> 

<?php include "nav_details.php"; ?>




<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "izq.php"; ?> 
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">

        <div class="well text-center">
            <h1>
                <?php _t("Expense"); ?>: 
                <?php expenses_numberf($id); ?>    
            </h1>
        </div>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        //https://fullcalendar.io/demos
        ?>

        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>



        <script>

            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });

        </script>


        
        <div class="p-5">
  <h2 class="mb-4">Enlightment Tracker</h2>
  <div class="card">
    <div class="card-body p-0">
      <div id="calendar"></div>
    </div>
  </div>
</div>

<!-- calendar modal -->
<div id="modal-view-event" class="modal modal-top fade calendar-modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span></h4>
					<div class="event-body"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="add-event">
        <div class="modal-body">
        <h4>Add Event Detail</h4>        
          <div class="form-group">
            <label>Event name</label>
            <input type="text" class="form-control" name="ename">
          </div>
          <div class="form-group">
            <label>Event Date</label>
            <input type='text' class="datetimepicker form-control" name="edate">
          </div>        
          <div class="form-group">
            <label>Event Description</label>
            <textarea class="form-control" name="edesc"></textarea>
          </div>
          <div class="form-group">
            <label>Event Color</label>
            <select class="form-control" name="ecolor">
              <option value="fc-bg-default">fc-bg-default</option>
              <option value="fc-bg-blue">fc-bg-blue</option>
              <option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
              <option value="fc-bg-pinkred">fc-bg-pinkred</option>
              <option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
            </select>
          </div>
          <div class="form-group">
            <label>Event Icon</label>
            <select class="form-control" name="eicon">
              <option value="circle">circle</option>
              <option value="cog">cog</option>
              <option value="group">group</option>
              <option value="suitcase">suitcase</option>
              <option value="calendar">calendar</option>
            </select>
          </div>        
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>  

        <h1>Cal</h1>

        <table class="table table-bordered">
            <tr>
                <?php
                for ($i = 1; $i < 30; $i++) {

                    if ($i % 7 == 0) {
                        echo '<td>' . $i . '</td></tr></tr>';
                    } else {
                        echo '<td>' . $i . '</td>';
                    }
                }
                ?>
            </tr>
        </table>





    </div>

</div>







<?php include view("home", "footer"); ?>