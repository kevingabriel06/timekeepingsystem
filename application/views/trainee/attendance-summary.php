<!-- Content -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
				<aside class="sidebar sidebar-user">
					<div class="card ctm-border-radius shadow-sm">
						<div class="card-body py-4">
							<div class="row">
								<div class="col-md-12 mr-auto text-left">
									<div class="custom-search input-group">
										<div class="custom-breadcrumb">
											<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
												<li class="breadcrumb-item d-inline-block"><a href="<?php echo site_url('trainee/dashboard'); ?>" class="text-dark">Home</a></li>
												<li class="breadcrumb-item d-inline-block active">Attendance Summary</li>
											</ol>
											<h4 class="text-dark">Atttendance Summary</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card ctm-border-radius shadow-sm">
						<div class="card-body">
							<a href="javascript:void(0)" class="btn ctm-border-radius text-white btn-block btn-theme button-1" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Download Logs</a>
						</div>
					</div>
				</aside>
			</div>

			<!-- Your HTML -->
			<div class="col-xl-9 col-lg-8 col-md-12">
				<div class="card ctm-border-radius shadow-sm">
					<div class="card-body">
						<div id="calendar_attendance"></div>
					</div>
				</div>
			</div>

			<!-- FullCalendar v6 CSS -->
			<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />

			<!-- FullCalendar v6 JS -->
			<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

			<style>
				/* Purple header buttons */
				#calendar_attendance .fc-button {
					background-color: #6f42c1;
					border: none;
					color: white;
					font-weight: bold;
					transition: background-color 0.3s;
				}


				#calendar_attendance .fc-button {
					text-transform: uppercase;
				}
			</style>

			<!-- Modal -->
			<div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="attendanceModalLabel">Attendance Details</h5>
						</div>
						<div class="modal-body" id="attendanceModalBody">
							<!-- Clock in/out details will be inserted here -->
						</div>
					</div>
				</div>
			</div>

			<script>
				document.addEventListener('DOMContentLoaded', function() {
					const calendarEl = document.getElementById('calendar_attendance');

					const rawEvents = <?php
										$events = [];

										foreach ($timelogs as $log) {
											if (!empty($log->LogInTime)) {
												$start = str_replace(' ', 'T', $log->LogInTime);
												$end = !empty($log->LogOutTime) ? str_replace(' ', 'T', $log->LogOutTime) : null;

												$events[] = [
													'start' => $start,
													'end' => $end,
													'classNames' => ['duration-block'],
													'extendedProps' => [
														'clockIn' => $log->LogInTime,
														'clockOut' => $log->LogOutTime,
														'status' => $log->Status ?? 'Present',
														'overtimeHours' => $log->OvertimeHours ?? 0
													]
												];
											}
										}

										echo json_encode($events, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
										?>;

					function formatTime(dateStr) {
						const date = new Date(dateStr);
						let hours = date.getHours();
						const minutes = date.getMinutes();
						const seconds = date.getSeconds();
						const ampm = hours >= 12 ? 'PM' : 'AM';
						hours = hours % 12 || 12;
						const pad = n => n.toString().padStart(2, '0');
						return `${hours}:${pad(minutes)}:${pad(seconds)} ${ampm}`;
					}

					const clockEventsByDate = {};
					rawEvents.forEach(ev => {
						if (ev.classNames.includes('duration-block')) {
							const dateKey = ev.start.split('T')[0];
							if (!clockEventsByDate[dateKey]) clockEventsByDate[dateKey] = [];

							if (ev.extendedProps.clockIn) {
								clockEventsByDate[dateKey].push({
									start: ev.extendedProps.clockIn.replace(' ', 'T'),
									classNames: ['clock-in'],
									formattedTime: formatTime(ev.extendedProps.clockIn),
								});
							}
							if (ev.extendedProps.clockOut) {
								clockEventsByDate[dateKey].push({
									start: ev.extendedProps.clockOut.replace(' ', 'T'),
									classNames: ['clock-out'],
									formattedTime: formatTime(ev.extendedProps.clockOut),
								});
							}

							// Store overtime and status for summary display
							clockEventsByDate[dateKey].status = ev.extendedProps.status;
							clockEventsByDate[dateKey].overtimeHours = ev.extendedProps.overtimeHours;
						}
					});

					const totalHoursEvents = [];
					for (const date in clockEventsByDate) {
						const events = clockEventsByDate[date];
						events.sort((a, b) => new Date(a.start) - new Date(b.start));
						let totalSeconds = 0;

						for (let i = 0; i < events.length; i += 2) {
							const inEvent = events[i];
							const outEvent = events[i + 1];
							if (
								inEvent && outEvent &&
								inEvent.classNames.includes('clock-in') &&
								outEvent.classNames.includes('clock-out')
							) {
								totalSeconds += (new Date(outEvent.start) - new Date(inEvent.start)) / 1000;
							}
						}

						const hours = Math.floor(totalSeconds / 3600);
						const minutes = Math.floor((totalSeconds % 3600) / 60);
						const seconds = Math.floor(totalSeconds % 60);

						totalHoursEvents.push({
							title: `Total: ${hours}h ${minutes}m ${seconds}s`,
							start: date,
							allDay: true,
							classNames: ['total-hours'],
							extendedProps: {
								detailEvents: events,
								status: clockEventsByDate[date].status,
								overtimeHours: clockEventsByDate[date].overtimeHours
							}
						});
					}

					const allEvents = [...rawEvents, ...totalHoursEvents];

					const calendar = new FullCalendar.Calendar(calendarEl, {
						headerToolbar: {
							left: 'prev,next today',
							center: 'title',
							right: 'dayGridMonth,timeGridWeek,timeGridDay,listYear'
						},
						initialView: 'dayGridMonth',
						editable: false,
						events: allEvents,
						eventDidMount: function(info) {
							const viewType = info.view.type;

							if (info.event.classNames.includes('total-hours')) {
								info.el.style.backgroundColor = '#ffc107';
								info.el.style.color = '#856404';
								info.el.style.borderRadius = '0.3rem';
								info.el.style.padding = '4px 8px';
								info.el.style.fontWeight = 'bold';
								info.el.style.fontSize = '0.85em';
								info.el.style.textAlign = 'center';
								info.el.style.cursor = 'pointer';
								info.el.style.position = 'relative';

								const overtime = info.event.extendedProps.overtimeHours ?? 0;

								// Add red dot if there's overtime
								if (parseFloat(overtime) > 0) {
									const dot = document.createElement('span');
									dot.style.position = 'absolute';
									dot.style.top = '-1px';
									dot.style.right = '-1px';
									dot.style.width = '10px';
									dot.style.height = '10px';
									dot.style.backgroundColor = 'red';
									dot.style.borderRadius = '50%';
									dot.title = `Overtime: ${overtime}h`;

									info.el.appendChild(dot);
								}
							}

							if (info.event.classNames.includes('duration-block')) {
								if (viewType === 'dayGridMonth' || viewType === 'listYear') {
									info.el.style.display = 'none';
								} else {
									info.el.style.backgroundColor = '#d1e7dd';
									info.el.style.borderColor = '#0f5132';
									info.el.style.color = '#856404';
									info.el.style.borderRadius = '4px';
								}
							}
						},
						eventClick: function(info) {
							const detailEvents = info.event.extendedProps.detailEvents;
							const status = info.event.extendedProps.status ?? 'N/A';
							const overtime = info.event.extendedProps.overtimeHours ?? 0;

							if (detailEvents && detailEvents.length > 0) {
								const status = info.event.extendedProps.status || 'N/A';
								const overtime = info.event.extendedProps.overtimeHours || 0;

								let detailHTML = `<strong>${info.event.startStr}</strong><br>`;

								if (parseFloat(overtime) > 0) {
									detailHTML += `<h6 class="mb-1" style="font-size: 0.8rem;">Status: ${status}</h6>`;
									detailHTML += `<span class="badge bg-danger mb-2">Overtime: ${overtime}h</span>`;
								}

								let totalSeconds = 0;
								for (let i = 0; i < detailEvents.length; i += 2) {
									const inEvent = detailEvents[i];
									const outEvent = detailEvents[i + 1];
									if (
										inEvent && outEvent &&
										inEvent.classNames.includes('clock-in') &&
										outEvent.classNames.includes('clock-out')
									) {
										totalSeconds += (new Date(outEvent.start) - new Date(inEvent.start)) / 1000;
									}
								}

								const hours = Math.floor(totalSeconds / 3600);
								const minutes = Math.floor((totalSeconds % 3600) / 60);
								const seconds = Math.floor(totalSeconds % 60);

								detailHTML += `<p class="mt-2"><strong>Total Time:</strong> ${hours}h ${minutes}m ${seconds}s</p>`;

								detailHTML += `<ul class="list-unstyled">`;
								detailEvents.forEach(ev => {
									const isClockIn = ev.classNames.includes('clock-in');
									const badgeClass = isClockIn ? 'bg-success' : 'bg-danger';
									const typeLabel = isClockIn ? 'Clock In' : 'Clock Out';
									detailHTML += `
			<li>
				<span class="badge ${badgeClass} me-2">${typeLabel}</span>
				<span>${ev.formattedTime}</span>
			</li>`;
								});
								detailHTML += `</ul>`;

								document.getElementById('attendanceModalBody').innerHTML = detailHTML;
								const modal = new bootstrap.Modal(document.getElementById('attendanceModal'));
								modal.show();
							}

						}
					});

					calendar.render();
				});
			</script>










		</div>
	</div>
</div>
<!--/Content-->